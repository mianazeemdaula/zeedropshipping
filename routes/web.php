<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureVendorProfileExist;
Route::get('/', function () {
    return view('guest.index');
});

// auth routes
Route::get('/signup', 'App\Http\Controllers\AuthController@signup');
Route::post('/signup', 'App\Http\Controllers\AuthController@postSignup');
Route::get('/login', 'App\Http\Controllers\AuthController@login')->name('login');
Route::post('/login', 'App\Http\Controllers\AuthController@postLogin');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard','App\Http\Controllers\AuthController@dashboard' )->name('dashboard');
    // logout route
    Route::post('/logout', 'App\Http\Controllers\AuthController@logout')->withoutMiddleware(EnsureProfileActive::class);
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
            Route::resource('bank-account', 'BankAccountController');
            Route::resource('bank-transactions', 'BankTransactionController');  
            Route::resource('revenue', 'RevenueController');  
            Route::resource('profile', 'ProfileController')->withoutMiddleware(EnsureProfileActive::class);        
            Route::get('/orders-import', 'App\Http\Controllers\Vendor\OrderController@import');
            Route::get('/orders-status/{status}', 'App\Http\Controllers\Vendor\OrderController@showStatusOrder');
            Route::post('/orders-import', 'App\Http\Controllers\Vendor\OrderController@importStore');
        });
    });

    Route::namespace('App\Http\Controllers\Dispatcher')->group(function() {
        Route::group(['prefix' => 'dispatcher','as' => 'dispatcher.'], function() {
            Route::resource('orders', 'OrderController');
            Route::post('/print-orders-label', 'OrderController@printLabel')->name('print.order.label');
            Route::post('/print-orders-stock', 'OrderController@printStcok')->name('print.order.stock');
        });
    });
});


Route::get('/test-api', function(){
    $order =  \App\Models\Order::find(1);
    
    return \App\Models\Shipper::find(1)->config;
    $digi = new App\Services\DigiDokan();
    $ordersdata = \App\Models\Order::get()->pluck('track_data')->toArray();
    $trackings = collect($ordersdata)->pluck('tracking_no')->toArray();
    $orders = collect($ordersdata)->pluck('order_no')->toArray();
    $response = $digi->downloadLoadSheet([
        'orders' => $orders,
        'tracking_numbers' => $trackings,
        'phone' => App\Helper\Helper::parseDigiPhone(env('DIGIDOKAAN_PHONE')),
        'gateway_id' => 3
    ]);
    return redirect()->to($response->pdf_link);
});