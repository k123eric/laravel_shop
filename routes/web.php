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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin','as'=>'admin'], function(){
//    Route::get('/shop_management', function () {
//        return view('admin/commodity_list');
//    });
    Route::get('/commodity_management', 'CommodityController@admin_show');

});
//Route::get('/commodity_management', 'CommodityController@index');

Route::group(['prefix'=>'customer','as'=>'customer'], function(){
//    Route::get('/shop', function () {
//        return view('customer/shopping_page');
//    });
    Route::get('/shop', 'CommodityController@commodity_show_all');
    Route::get('/commodity/{commodity}', 'CommodityController@commodity_show_one');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
