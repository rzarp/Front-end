<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => '/'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/shop', 'HomeController@shop');
    Route::get('/contact', 'HomeController@contact');
    Route::get('/faq', 'HomeController@faq');
    Route::get('/shop_single', 'HomeController@shop_single');
    Route::get('/cart', 'HomeController@cart');
    Route::get('/checkout', 'HomeController@checkout');
    Route::get('/invoice', 'HomeController@invoice');
});

Route::group(['prefix' => 'login'], function () {
    Route::get('/', 'Auth\AuthController@login')->name('login');
    Route::post('/', 'Auth\AuthController@authenticate');
    Route::post('/logout', 'Auth\AuthController@logout')->name('logout');
});

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', 'DashboardController@index');
    });
    
    Route::group(['prefix' => 'products'], function () {
        Route::get('/', 'ProductController@index');
    });
});

Route::group(['prefix' => 'datatables'], function () {
    Route::post('/products', 'DatatableController@products');
});

