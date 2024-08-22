<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\OrdersImport;
use App\Models\Order;
use App\Models\Product;
use App\Helper\CSVHelper;
use App\Models\PaymentMethod;
use App\Models\Shipper;

use App\Helper\Helper;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $status = 'open';
        $orders = Order::where('user_id', auth()->id())->whereStatus($status)->latest()->paginate();
        return view('vendor.orders.index', compact('orders', 'status'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::where('user_id', auth()->id())->findOrFail($id);
        return view('vendor.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::where('user_id', auth()->id())->findOrFail($id);
        $paymentMethods = PaymentMethod::all();
        $shippers = Shipper::all();
        return view('vendor.orders.edit', compact('order', 'paymentMethods','shippers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required',
            // 'payment_method_id' => 'required',
        ]);

        $order = Order::where('user_id', auth()->id())->findOrFail($id);
        if($request->status === 'shipped'){
            // Send order to digiDokan
            $digi = new \App\Services\DigiDokan();
            $response = $digi->getCities([
                'shipment_type' => 1,
                'gateway_id' => 3,
                'courier_bulk' => 1
            ]);
            $cities = collect($response->Overnight);
            // find city
            $city = $cities->where('city_name', $order->city)->first();
            $city_id = $city->city_id ?? 1;
            $res =  $digi->bookShipment([
               'seller_number' => Helper::parseDigiPhone(env('DIGIDOKAAN_PHONE')),
               'buyer_number' => Helper::parseDigiPhone($order->customer_phone),
               'buyer_name' => $order->customer_name,
               'buyer_address' => $order->shipping_address ?? 'Lahore',
               'buyer_city' => $city_id,
               'piece' => 1,
               'amount' => intval($order->total),
               'special_instruction' => $order->extra_note,
               'product_name' => $order->details()->first()->product->name,
               'store_url' => $order->user->vendor->store_url,
               'business_name' => $order->user->vendor->business_name,
               'origin' => 'Lahore',
               'gateway_id' => 3,
               'shipper_address' => $order->user->vendor->address,
               'shipper_name' => $order->user->vendor->business_name,
               'shipper_phone' => Helper::parseDigiPhone($order->user->vendor->phone),
               'shipment_type' => 1,
               'external_reference_no' => $order->order_number,
               'weight' => 1,
               'other_product' => $order->details()->count() > 1,
               'pickup_id' => 5195
            ]);
        }
        // $order->save();
        // $order->update($request->all());
        return redirect()->route('vendor.orders.index')->with('success', 'Order updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    

    public function showStatusOrder(string $status)
    {
        $orders = Order::where('user_id', auth()->id())->where('status', $status)->latest()->paginate();
        return view('vendor.orders.index', compact('orders', 'status'));
    }


    public function import()
    {
        return view('vendor.orders.import');
    }

    public function importStore(Request $request)
    {
        $request->validate([
            'file' => 'required',
            'provider' =>  'required'
        ]);

        // upload file
        $file = $request->file('file');
        $file->storeAs('orders', 'orders.xlsx');

        if($request->provider === 'shopify'){
            $rows =  CSVHelper::readCSV('orders/orders.xlsx');;
            $orders =  CSVHelper::namedKeys($rows);
            $orderNumers = [];
            
            $orderModel = null;
            foreach($orders as $key => $order){
                $orderNumers[] = $order['Name'];
                // add order details to the order
                $product = Product::where('sku', $order['Lineitem sku'])->first();
                if(!$product){
                    continue;
                }
                if(isset($order['Financial Status']) && strlen($order['Financial Status']) > 0){
                    $orderModel =  Order::create([
                        'user_id' => auth()->id(),
                        'order_number' => $order['Name'],
                        'customer_name' => $order['Billing Name'],
                        'customer_email' => $order['Email'],
                        'customer_phone' => $order['Shipping Phone'],
                        'total' => $order['Total'],
                        'order_date' => now()->toDateString(),
                        'status' => 'open',
                        'extra_note' => $order['Notes'],
                        'shipping_address' => $order['Billing Street'],
                        'billing_address' => $order['Billing Address1'],
                        'zip' => intval(substr($order['Shipping Zip'], 1)),
                        'city' => $order['Shipping City'],
                        'payment_method_id' => 1,
                        'shipping_cost' => $order['Shipping'],
                        'tax' => $order['Taxes'],
                    ]);
                }
                if($product){
                    $orderModel->details()->create([
                        'product_id' => $product->id,
                        'qty' => $order['Lineitem quantity'],
                        'price' => $order['Lineitem price'],
                    ]);
                }
            }
        }
        // (new OrdersImport())->import('orders/orders.xlsx');

        return redirect()->route('vendor.orders.index')->with('success', "Orders ".count($orderNumers)." imported successfully");
    }
}
