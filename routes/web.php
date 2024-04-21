<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')
        ->name('home');

    Route::get('/sales-purchases/chart-data', 'HomeController@salesPurchasesChart')
        ->name('sales-purchases.chart');

    Route::get('/current-month/chart-data', 'HomeController@currentMonthChart')
        ->name('current-month.chart');

    Route::get('/payment-flow/chart-data', 'HomeController@paymentChart')
        ->name('payment-flow.chart');

    Route::get('/products/expired', 'ProductController@expired')
        ->name('products.expired');

        Route::get('/products/productRep', 'ProductController@prorep')
        ->name('products.productRep');








       
    Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/expired', 'HomeController@expired')->name('expired');

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/expired', 'HomeController@expired')->name('expired');




    
});

