<?php

namespace App\Http\Controllers;

use App\Commodity;
use Illuminate\Http\Request;
use App\OrderDetail;


class OrderDetailController extends Controller
{
    public function show_cart(){
        return view('customer/cart')->with('commodities',OrderDetail::all());
    }

    public function store(Request $request,$commodity_id,$amount)
    {
        $commodity = Commodity::where('id',$commodity_id)->first();
        $order = new OrderDetail;
        $order->name = $commodity->name;
        $order->price = $commodity->price;
        $order->buy_amount = $amount;
        $order->save();
        return redirect('customer/commodity/'.$commodity_id);
    }

    public function destroy(OrderDetail $order_detail)
    {
        $order_detail->delete();
        return redirect('customer/cart');
    }
}
