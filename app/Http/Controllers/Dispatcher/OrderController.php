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
        //
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
        $request->validate([
            'status' => 'required',
            // 'payment_method_id' => 'required',
        ]);

        $order = Order::findOrFail($id);
        if($request->status === 'packed'){
            $order->status = 'packed';
            $order->packed_date = now();
            $order->packed_user_id = auth()->user()->id;
        }else if($request->status === 'shipped'){
            // Send order to digiDokan
            $shipper = Shipper::find(1);
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
               'buyer_address' => empty($order->shipping_address) ? 'Lahore' : $order->billing_address,
               'buyer_city' => $city_id,
               'piece' => $order->details()->count(),
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
            $order->shipper_id = $shipper->id;
            $order->tracking_number = $res->tracking_no;
            $order->tracking_invoice_url = $res->slip_link;
            $order->shipped_date = now()->toDateString();
            $order->shipping_cost = $res->delivery_charges;
            $order->shipped_user_id = auth()->user()->id;
            $order->status = 'shipped';
        }
        $order->save();
        return redirect()->route('dispatcher.orders.index')->with('success', 'Order updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
