<?php
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

Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>'login','verify'=>true], function(){
    //商品管理頁面
    Route::get('/commodity', 'CommodityController@admin_show')->name('commodity_management');
    //商品新增頁面
    Route::get('/commodity/new', function (){
        return view('/admin/new_commodity');
    })->name('new_commodity');
    //商品管理頁面
    Route::get('/commodity/update/{commodity}', 'CommodityController@admin_update')->name('update_commodity');
    //新增商品
    Route::post('/commodity/store', 'CommodityController@store')->name('store');
    //修改商品
    Route::post('/commodity/update', 'CommodityController@update')->name('update');
    //刪除商品
//    Route::get('/commodity/delete/{commodity}','CommodityController@destroy')->name('delete');
    Route::get('/commodity/delete/{commodity}','CommodityController@destroy')->name('delete');
});

Route::group(['prefix'=>'customer','as'=>'customer.'], function(){
    //商品頁面
    Route::get('/shop', 'CommodityController@commodity_show_all')->name('shop');
    //展示單一商品頁面
    Route::get('/commodity/{commodity}', 'CommodityController@commodity_show_one')->name('commodity');
    //購物車頁面
    Route::get('/cart', 'OrderDetailController@show_cart')->name('cart');
    //將商品存進購物車
    Route::get('/cart/add', 'OrderDetailController@store')->name('add_to_cart');
    //刪除購物車內商品
    Route::get('/cart/delete', 'OrderDetailController@destroy')->name('cart_delete');

});
//登入頁面
Route::get('/login',function(){
    return view('/user/login');
});
//登入
Route::post('/login','UserController@login')->name('login');

//註冊頁面
Route::get('/register',function(){
    return view('/user/register');
});
//註冊
Route::post('/register','UserController@register')->name('register');
//登出
Route::get('/logout','UserController@logout')->name('logout');

//Auth::routes();
