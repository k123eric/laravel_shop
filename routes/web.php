<?php

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

Route::get('/','CommodityController@commodity_show_all')->name('shop');

Route::group(['prefix'=>'admin','as'=>'admin.'], function(){
    Route::get('/commodity', 'CommodityController@admin_show')->name('commodity_management');   //商品管理頁面
    Route::get('/commodity/new', function (){
        return view('/admin/new_commodity');
    })->name('new_commodity');   //商品新增頁面
    Route::get('/commodity/update/{commodity}', 'CommodityController@admin_update')->name('update_commodity');
    Route::post('/commodity/store', 'CommodityController@store');
    Route::post('/commodity/update', 'CommodityController@update');
    Route::get('/commodity/delete/{commodity}','CommodityController@destroy');
});

Route::group(['prefix'=>'customer','as'=>'customer.'], function(){
    Route::get('/shop', 'CommodityController@commodity_show_all')->name('shop');    //商品頁面
    Route::get('/commodity/{commodity}', 'CommodityController@commodity_show_one')->name('commodity');
    Route::get('/cart', 'OrderDetailController@show_cart')->name('cart');
    Route::get('/cart/add/{commodity}/{amount}', 'OrderDetailController@store');
    Route::get('/cart/delete/{order_detail}', 'OrderDetailController@destroy');
});

Route::get('/login',function(){
    return view('/user/login');
});
Route::post('/login','UserController@login')->name('login');

Route::get('/register',function(){
    return view('/user/register');
});
Route::post('/register','UserController@register')->name('register');

Route::get('/logout','UserController@logout')->name('logout');

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
