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

    public function store(Request $request)
    {
        $commodity_id = $request->input('commodity_id');
        $buy_amount = $request->input('buy_amount');
        $commodity = Commodity::where('id',$commodity_id)->first();

        $old_order_detail = Session::has('order_detail') ? Session::get('order_detail') : null;
        $order_detail = new OrderDetail;
        $order_detail->name = $commodity-> name ;
        $order_detail->price = $commodity->price;
        $order_detail->buy_amount = $buy_amount;
        $order_detail->image_url = $commodity->image_url;

        if(!empty($old_order_detail)){
            foreach ($old_order_detail as $buy_commodity){
                if($order_detail->name == $buy_commodity->name){
                    if($buy_commodity->buy_amount + $buy_amount > $commodity->amount){
                        return response()->json([
                            'msg' => '購買數量大於商品數量!'
                        ]);
                    }
                    $buy_commodity->buy_amount += $buy_amount;
                    $request->session()->put('order_detail', $old_order_detail);
                    return response()->json([
                        'msg' => '成功添加至購物車!'
                    ]);
                }
            }
        }

        $request->session()->put('order_detail', $old_order_detail);
        $request->session()->push('order_detail', $order_detail);
        return response()->json([
            'msg' => '成功添加至購物車!'
        ]);    }

    function destroy(Request $request)
    {
        $count_item = 0;
        $old_order_detail = Session::has('order_detail') ? Session::get('order_detail') : null;

        $commodity_name = $request->input('commodity_name');
        foreach ($old_order_detail as $commodity){
            if($commodity->name == $commodity_name){
                if (count($old_order_detail) == 1) {
                    Session::forget('order_detail');
                    return response()->json([
                        'msg' => '成功刪除商品!'
                    ]);
                }
                unset($old_order_detail[$count_item]);
                session()->put('order_detail', $old_order_detail);
                return response()->json([
                    'msg' => '成功刪除商品!'
                ]);
            }
            $count_item ++;
        }
        return response()->json([
            'msg' => '未知原因導致刪除失敗!'
        ]);
    }
}
