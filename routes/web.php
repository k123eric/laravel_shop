<?php
use Illuminate\Support\Facades\Route;

use App\Commodity;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin','as'=>'admin.'], function(){
    Route::get('/commodity', 'CommodityController@admin_show')->name('commodity_management');   //商品管理頁面
    Route::get('/commodity/new', 'CommodityController@commodity_new')->name('new_commodity');   //商品新增頁面
//    Route::post('/store', 'CommodityController@store');
//    Route::get('/commodity/delete/{commodity}','CommodityController@destroy');
});

Route::group(['prefix'=>'customer','as'=>'customer.'], function(){
    Route::get('/shop', 'CommodityController@commodity_show_all')->name('shop');    //商品頁面
    Route::get('/commodity/{commodity}', 'CommodityController@commodity_show_one')->name('commodity');
    Route::get('/cart', 'OrderDetailController@show_cart')->name('cart');
    Route::get('/cart/add/{commodity}/{amount}', 'OrderDetailController@store');
    Route::get('/cart/delete/{order_detail}', 'OrderDetailController@destroy');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
