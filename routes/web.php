<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/shopify', function () {
    return view('auth.shopify_auth');
})->middleware(['verify.shopify'])->name('home');

// auth routes
Route::get('/signup', 'App\Http\Controllers\AuthController@signup');
Route::post('/signup', 'App\Http\Controllers\AuthController@postSignup');
Route::get('/login', 'App\Http\Controllers\AuthController@login')->name('login');
Route::post('/login', 'App\Http\Controllers\AuthController@postLogin');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard','App\Http\Controllers\AuthController@dashboard' )->name('dashboard');
    // logout route
    Route::post('/logout', 'App\Http\Controllers\AuthController@logout');
    Route::namespace('App\Http\Controllers\Admin')->group(function () {
        Route::group(['prefix' => 'admin','as' => 'admin.'], function() {
            Route::resource('categories', 'CategoryController');
            Route::resource('products', 'ProductController');
            Route::resource('users', 'UserController');
            Route::resource('shippers', 'ShipperController');
        });
    });

    Route::namespace('App\Http\Controllers\Vendor')->group(function() {
        Route::group(['prefix' => 'vendor','as' => 'vendor.'], function() {
            Route::resource('orders', 'OrderController');        
            Route::get('/orders-import', 'App\Http\Controllers\Vendor\OrderController@import');
            Route::post('/orders-import', 'App\Http\Controllers\Vendor\OrderController@importStore');
        });
    });

    Route::namespace('App\Http\Controllers\Dispatcher')->group(function() {
        Route::group(['prefix' => 'dispatcher','as' => 'dispatcher.'], function() {
            Route::resource('orders', 'OrderController');
        });
    });
});


Route::get('/test-api', function(){
    $digi = new App\Services\DigiDokan();
    $response = $digi->getCities([
        'shipment_type' => 2,
        'gateway_id' => 5,
        'courier_bulk' => 1
    ]);
    return ($response);
});