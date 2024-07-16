<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/login', 'App\Http\Controllers\Api\AuthController@login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/categories', 'App\Http\Controllers\Api\CategoryController@index');
    Route::get('/products', 'App\Http\Controllers\Api\ProductController@index');
    Route::get('/products/featured', 'App\Http\Controllers\Api\ProductController@featured');
});