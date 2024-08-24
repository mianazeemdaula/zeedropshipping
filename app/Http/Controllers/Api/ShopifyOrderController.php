<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Carbon\Carbon;
class ShopifyOrderController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required',
                'orders' => 'required|array',
                'orders.*.details.*' => 'required|array',
            ]);
            $orders = $request->orders;
            foreach ($orders as $order) {
                $orderModel = new Order();
                $orderModel->user_id = $request->user_id;
                $orderModel->order_number = $order['id'];
                $orderModel->payment_method_id = 1;
                $orderModel->status = 'open';
                $orderModel->customer_name = $order['customer_name'];
                $orderModel->customer_phone = $order['customer_phone'];
                $orderModel->customer_email = $order['customer_email'];
                $orderModel->extra_note = $order['extra_note'];
                $orderModel->order_date = Carbon::parse($order['order_date']);
                $orderModel->shipping_address = $order['shipping_address'];
                $orderModel->billing_address = $order['billing_address'];
                $orderModel->zip = $order['zip'];
                $orderModel->city = $order['city'];
                $orderModel->total = $order['total'];
                $orderModel->tax = $order['tax'];
                $orderModel->provider = 'shopify';
                $orderModel->save();
                
                foreach ($order['details'] as $detail) {
                    $product =  Product::where('sku','SKU-240811-02')->first();
                    $orderDetail = new OrderDetail();
                    $orderDetail->order_id = $orderModel->id;
                    $orderDetail->product_id = $product->id;
                    $orderDetail->qty = $detail['quantity'];
                    $orderDetail->price = $detail['price'];
                    $orderDetail->save();
                }
            }
            return response()->json(['message' => 'Orders created successfully'], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}