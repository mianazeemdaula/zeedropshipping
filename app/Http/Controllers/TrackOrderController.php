<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Services\DigiDokan;

class TrackOrderController extends Controller
{
    public function index($id)
    {
        $order = Order::findOrfail($id);
        if(!$order->track_data){
            return back()->with('error', "No tracking data found");
        }
        $response = (new DigiDokan())->getTrackingRecord([
            'tracking_no' => $order->track_data['tracking_no'],
            'order_no' => $order->track_data['order_no'],
        ]);
        if($response->code !=  200){ 
            return back()->with('error', "Something went wrong");
        }
        return view('web.track-order', compact('response'));
    }
}
