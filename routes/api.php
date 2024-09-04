<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', 'App\Http\Controllers\Api\AuthController@login');

Route::post('/shopify/orders', 'App\Http\Controllers\Api\ShopifyOrderController@store');

Route::get('digidokan/pickup/{id}', function($id){
    $digidokan = new \App\Services\DigiDokan();
    return $digidokan->getPickupAddress($id);
});

Route::post('dropshipper-pending-payment-info', function(Request $request){
    $dropshipper = \App\Models\User::find($request->id);
    $pendingPayment = $dropshipper->vendorRevenue()->where('status', 'pending')->sum('amount');
    $pendingOrderIds = $dropshipper->vendorRevenue()->where('status', 'pending')->pluck('order_id');
    $bankInfo = $dropshipper->activeBankAccount;
    return response()->json([
        'pending_payment' => $pendingPayment,
        'pending_order_ids' => $pendingOrderIds,
        'bank_info' => $bankInfo
    ]);
});

