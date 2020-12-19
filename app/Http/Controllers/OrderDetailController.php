<?php

namespace App\Http\Controllers;

use App\Commodity;
use App\OrderDetail;
use Illuminate\Http\Request;
use Session;


class OrderDetailController extends Controller
{
    public function show_cart(){
        if (!Session::has('order_detail')) {
            return view('customer/cart');
        }
        $old_order_detail = Session::get('order_detail');
        return view('customer/cart')->with('commodities',$old_order_detail);
    }

    public function store(Request $request,$commodity_id,$amount)
    {
        $commodity = Commodity::where('id',$commodity_id)->first();

        $old_order_detail = Session::has('order_detail') ? Session::get('order_detail') : null;
        $order_detail = new OrderDetail;
        $order_detail->name = $commodity-> name ;
        $order_detail->price = $commodity->price;
        $order_detail->buy_amount = $amount;
        $order_detail->save();

        if(!empty($old_order_detail)){
            foreach ($old_order_detail as $buy_commodity){
                if($order_detail->name == $buy_commodity->name){
                    if($buy_commodity->buy_amount + $amount > $commodity->amount){
                        return redirect('customer/commodity/'.$commodity_id)->with('fail','購買數量大於商品數量!');
                    }
                    $buy_commodity->buy_amount += $amount;
                    $request->session()->put('order_detail', $old_order_detail);
                    return redirect('customer/commodity/'.$commodity_id)->with('success','成功添加至購物車!');
                }
            }
        }

        $request->session()->put('order_detail', $old_order_detail);
        $request->session()->push('order_detail', $order_detail);
        return redirect('customer/commodity/'.$commodity_id)->with('success','成功添加至購物車!');
    }

    function destroy($commodity_id)
    {
        $count_item = 0;
        $old_order_detail = Session::has('order_detail') ? Session::get('order_detail') : null;

        foreach ($old_order_detail as $commodity){
            if($commodity_id == $commodity->id){
                if (count($old_order_detail) == 1) {
                    Session::forget('order_detail');
                    return redirect('customer/cart')->with('success','刪除成功!');
                }
                unset($old_order_detail[$count_item]);
                session()->put('order_detail', $old_order_detail);
                return redirect('customer/cart')->with('success','刪除成功!');

            }
            $count_item ++;
        }

        return redirect('customer/cart')->with('fail','未知原因導致刪除失敗!');
    }
}
