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

