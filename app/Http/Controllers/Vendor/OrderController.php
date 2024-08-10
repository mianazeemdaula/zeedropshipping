<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\OrdersImport;
use App\Models\Order;
use App\Helper\CSVHelper;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::where('use_id', auth()->id())->latest()->paginate();
        return view('vendor.orders.index', compact('orders'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
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
            $rows =  CSVHelper::readCSV('orders/orders.xlsx');
            $orders =  CSVHelper::namedKeys($rows, 0);
            // return $orders;
            $orderNumers = [];
            foreach($orders as $key => $order){
                $orderNumers[] = $order['Name'];
                if(!isset($orderNumers[$order['Name']]  )){
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
            }
        }
        // (new OrdersImport())->import('orders/orders.xlsx');

        return redirect()->route('vendor.orders.index')->with('success', 'Orders imported successfully');
    }
}
