<?php

namespace App\Http\Controllers\Dispatcher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\OrdersImport;
use App\Models\Order;
use App\Models\Product;
use App\Helper\CSVHelper;
use App\Models\PaymentMethod;
use App\Models\Shipper;
use App\Helper\Helper;
use Carbon\Carbon;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::whereIn('status',['packed','open','shipped'])->orderBy('id','desc')->paginate();
        return view('dispatcher.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) 
    {
        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        $startDate = Carbon::parse($request->start_date)->format('Y-m-d')." 00:00:00";
        $endDate = Carbon::parse($request->end_date)->format('Y-m-d')." 23:59:59";
        $query = Order::query();
        if($request->has('sku') && strlen($request->sku) > 1){
            // get all orders where order details have the product with sku
            $pro = Product::where('sku', $request->sku)->first();
            if($pro){
                $query = $query->whereHas('details',function($q) use($pro) {
                    $q->where('product_id', $pro->id);
                })->whereBetween('created_at', [$startDate, $endDate]);
            }
        }else {
;            $query = $query->whereBetween('created_at', [$startDate, $endDate]);
        }
        $orders = $query->whereIn('status',['packed','open','shipped'])->get();
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $sku = $request->sku;
        return view('dispatcher.orders.index', compact('orders', 'start_date', 'end_date','sku'));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::findOrFail($id);
        return view('dispatcher.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::findOrFail($id);
        $paymentMethods = PaymentMethod::all();
        $shippers = Shipper::all();
        return view('dispatcher.orders.edit', compact('order', 'paymentMethods','shippers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'status' => 'required',
                'reason' => 'sometimes|max:150|string|min:5',
                // 'payment_method_id' => 'required',
            ]);
            $order = Order::findOrFail($id);
            if($request->status === 'cancelled'){
                $order->status = 'cancelled';
                $order->canceled_date = now();
                $order->cancel_reason = $request->reason;
                $order->cancel_by = auth()->user()->id;
            }else if($request->status === 'packed'){
                $order->status = 'packed';
                $order->packed_date = now();
                $order->packed_user_id = auth()->user()->id;
                foreach($order->details as $detail){
                    $product = $detail->product;
                    $product->stock = $product->stock - $detail->qty;
                    $product->save();
                }
            }else if($request->status === 'shipped'){
                // Send order to digiDokan
                $shipper = Shipper::find(1);
                $digi = new \App\Services\DigiDokan();
                $digiGatewayId = $request->digi_gateway_id;
                $response = $digi->getCities([
                    'shipment_type' => $request->shipment_type,
                    'gateway_id' => $digiGatewayId,
                    'courier_bulk' => 1
                ]);
                $cities = collect($response->Overnight);
                // find city
                $city = $cities->where('city_name', $order->city)->first();
                if(!$city){
                    return redirect()->back()->with('error', 'Order city not found');
                }
                $city_id = $city->city_id ?? 1;
                
                $res =  $digi->bookShipment([
                    'source' => 'zee_dropshipping',
                    'seller_number' => Helper::parseDigiPhone(json_decode($shipper->config)->phone),
                    'buyer_number' => Helper::parseDigiPhone($order->customer_phone),
                    'buyer_name' => $order->customer_name,
                    'buyer_address' => empty($order->shipping_address) ? 'Lahore' : $order->billing_address,
                    'buyer_city' => $city_id,
                    'piece' => $order->details()->count(),
                    'amount' => intval($order->total),
                    'special_instruction' => $order->extra_note,
                    'product_name' => $order->details()->first()->product->name,
                    'store_url' => $order->user->vendor->store_url,
                    'business_name' => $order->user->vendor->business_name,
                    'origin' => 'Lahore',
                    'gateway_id' => $digiGatewayId,
                    'shipper_address' => $order->user->vendor->address,
                    'shipper_name' => $order->user->vendor->business_name,
                    'shipper_phone' => Helper::parseDigiPhone($order->user->vendor->phone),
                    'shipment_type' => $request->shipment_type,
                    'external_reference_no' => $order->order_number,
                    'weight' => $order->weight > 0 ? $order->weight / 1000 : 0.1,
                    'other_product' => $order->details()->count() > 1,
                    'pickup_id' => intval($request->pickup_addresses),
                ]);
                $order->shipper_id = $shipper->id;
                $trackData = [];
                $trackData['tracking_no'] = $res->tracking_no;
                $trackData['invoice_url'] = $res->slip_link;
                $trackData['order_no'] = $res->order_no;
                $trackData['gateway_id'] = $digiGatewayId;
                $order->track_data = $trackData;
                $order->shipped_date = now()->toDateString();
                $order->shipping_cost = $res->delivery_charges;
                $order->shipped_user_id = auth()->user()->id;
                $order->status = 'shipped';
            }
            $order->save();
            return redirect()->route('dispatcher.orders.index')->with('success', 'Order updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showStatusOrder($status){
        $orders = Order::query();
        if(in_array($status,['open','canceled','disptached'])){
            $orders->whereIn('status', [$status]);
        }else if( $status == 'intransit'){
            $orders->whereNotIn('status',['open','canceled','disptached','completed']);
        }
        $orders = $orders->get();
        return view('dispatcher.orders.index', compact('orders')); 
    }


    public function printLabel(Request $request)
    {
        try {
            $digi = new \App\Services\DigiDokan();
            $ordersdata = Order::whereNotNull('track_data')
            ->whereIn('id',$request->order_ids)->get()->pluck('track_data')->toArray();
            $trackings = collect($ordersdata)->pluck('tracking_no')->toArray();
            $orders = collect($ordersdata)->pluck('order_no')->toArray();
            $response = $digi->downloadLoadSheet([
                'orders' => $orders,
                'tracking_numbers' => $trackings,
                'phone' => \App\Helper\Helper::parseDigiPhone(env('DIGIDOKAAN_PHONE')),
                'gateway_id' => 3
            ]);
            return response()->json($response->pdf_link);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function printStcok(Request $request){
        $request->validate([
            'order_ids' => 'required|array',
        ]);

        $orders = Order::whereIn('id', $request->order_ids)->get();
        // select all orders and get the product ids
        $productIds = $orders->map(function($order){
            return $order->details->map(function($detail){
                return $detail->product_id;
            });
        })->flatten()->unique();
        $products = Product::whereIn('id', $productIds)->get();
        $rows = [];
        $headings = ['Id','Image','SKU', 'Product Name', 'Quantity'];
        foreach($products as $product){
            $quantity = 0;
            foreach($orders as $order){
                $quantity += $order->details->where('product_id', $product->id)->count('qty');
            }
            // assosicate array of rows
            $rows[] = ['id' => $product->id, 'image' => $product->image, 'sku' => $product->sku, 'name' => $product->name, 'quantity' => $quantity];
        }
        return response()->json(['headings' => $headings, 'rows' => $rows]);
    }
}
