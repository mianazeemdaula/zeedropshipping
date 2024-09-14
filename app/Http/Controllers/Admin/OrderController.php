<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::orderBy('id','desc')->paginate();
        return view('admin.orders.index', compact('orders'));
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
        $orders = $query->get();
        return view('admin.orders.index', compact('orders'));
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

    public function showStatusOrders(string $status)
    {
        $orders = Order::query();
        if($status === 'intransit'){
            $orders->whereIn('status', ['shipped', 'delivered']);
        }else {
            $orders->where('status', $status);
        }
        $orders = $orders->orderBy('id','desc')->paginate();
        return view('admin.orders.index', compact('orders'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required'
        ]);
        $search = $request->search;
        $orders = Order::where('id', $request->search)
        ->orWhere('order_number', 'like', '%'.$search.'%')
        ->orWhere('customer_name', 'like', '%'.$search.'%')
        ->orWhere('customer_email', 'like', '%'.$search.'%')
        ->orWhere('customer_phone', 'like', '%'.$search.'%')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function export(Request $request)
    {
        $ids = $request->export_ids;
        return (new \App\Exports\OrderExport(explode(",",$ids)))->download('orders.xlsx');
    }
}
