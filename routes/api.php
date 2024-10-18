<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', 'App\Http\Controllers\Api\AuthController@login');
Route::get('/dashboard', 'App\Http\Controllers\Api\AuthController@dashboard')->middleware('auth:sanctum');
Route::post('/shopify/orders', 'App\Http\Controllers\Api\ShopifyOrderController@store');

Route::get('digidokan/pickup/{id}', function($id){
    $digidokan = new \App\Services\DigiDokan();
    return $digidokan->getPickupAddress($id);
});

Route::post('dropshipper-pending-payment-info', function(Request $request){
    $vendor = \App\Models\Vendor::where('ds_number', $request->id)->first();
    if(!$vendor){
        return response()->json([
            'message' => 'Dropshipper not found'
        ], 404);
    }
    $dropshipper = \App\Models\User::find($vendor->user_id);
    $pendingPayment = $dropshipper->vendorRevenue()->where('status', 'earned')->sum('amount');
    $pendingOrderIds = $dropshipper->vendorRevenue()->where('status', 'earned')->pluck('order_id');
    $bankInfo = $dropshipper->activeBankAccount;
    return response()->json([
        'pending_payment' => $pendingPayment,
        'pending_order_ids' => $pendingOrderIds,
        'bank_info' => $bankInfo
    ]);
});

