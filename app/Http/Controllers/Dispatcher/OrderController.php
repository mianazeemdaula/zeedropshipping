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

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::whereIn('status',['packed'])->paginate();
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
        $order = Order::where('user_id', auth()->id())->findOrFail($id);
        return view('dispatcher.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::where('user_id', auth()->id())->findOrFail($id);
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

        $order = Order::where('user_id', auth()->id())->findOrFail($id);
        if($request->status === 'shipped'){
            // Send order to digiDokan
            $digi = new \App\Services\DigiDokan();
            $response = $digi->getCities([
                'shipment_type' => 1,
                'gateway_id' => 5,
                'courier_bulk' => 1
            ]);
            $cities = collect($response->Overnight);
            // find city
            $city = $cities->where('city_name', $order->city)->first();
            $city_id = $city->city_id ?? 1;
            $res =  $digi->bookShipment([
               'seller_number' => env('DIGIDOKAAN_PHONE'),
               'buyer_number' => $order->customer_phone,
               'buyer_name' => $order->customer_name,
               'buyer_address' => $order->shipping_address,
               'buyer_city' => $city_id,
               'piece' => 1,
               'amount' => intval($order->total),
               'special_instruction' => $order->extra_note,
               'product_name' => $order->details()->first()->product->name,
               'store_url' => $order->user->vendor->store_url,
               'business_name' => $order->user->vendor->business_name,
               'origin' => 'Lahore',
               'gateway_id' => 5,
               'shipper_address' => $order->user->vendor->address,
               'shipper_name' => $order->user->vendor->business_name,
               'shipper_phone' => $order->user->vendor->phone,
               'shipment_type' => 1,
               'external_reference_no' => $order->order_number,
               'weight' => 1,
               'other_product' => $order->details()->count() > 1,
               'pickup_id' => 5264
            ]);
            $order->shipper_id = 1;
            $order->tracking_number = '123456';
            $order->shipped_date = now()->toDateString();
        }
        $order->save();
        $order->update($request->all());
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
