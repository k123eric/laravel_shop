<?php

namespace App\Http\Controllers;

use App\Commodity;
use Illuminate\Http\Request;

class CommodityController extends Controller
{

    public function admin_show()
    {
        return view('/admin/commodity_list')->with('commodities',Commodity::all());
    }

    public function admin_update(Commodity $commodity)
    {
        return view('/admin/update_commodity')->with('commodity',$commodity);
    }


    public function commodity_show_all()
    {
        return view('/customer/shopping_page')->with('commodities',Commodity::all());
    }

    public  function commodity_show_one(Commodity $commodity)
    {
        return view('/customer/commodity')->with('commodity',$commodity);
    }

    public function store(Request $request,Commodity $commodity)
    {
        $validated = $request->validate([
            'name' => 'required|max:16|min:1|unique:commodities',
            'price' => 'required|numeric|min:1|max:999999',
            'amount' => 'required|numeric|min:1|max:999',
            'introduction' => 'required|max:255',
            'image_url' => 'required|max:255|url'
        ]);

        $commodity = new Commodity([
            'name' => $request->name,
            'price' => $request->price,
            'amount' => $request->amount,
            'introduction' => $request->introduction,
            'image_url' => $request->image_url,
        ]);
//
        $commodity -> save();
        return redirect(url('admin/commodity'))->with('status', '商品新增成功!');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:20|min:1',
            'price' => 'required|numeric|min:1|max:999999',
            'amount' => 'required|numeric|min:1|max:999',
            'introduction' => 'required|max:255',
            'image_url' => 'required|max:255|url'
        ]);

        $name = $request->old('name');
        $price = $request->old('price');
        $amount = $request->old('amount');
        $introduction = $request->old('introduction');
        $image_url = $request->old('image_url');

        Commodity::where('id',$request->id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'amount' => $request->amount,
            'introduction' => $request->introduction,
            'image_url' => $request->image_url,
        ]);
        return redirect(url('admin/commodity'))->with('status', '商品修改成功!');
    }

    public function destroy(Commodity $commodity)
    {
        $commodity->delete();
        return response()->json([
            'msg' => '成功刪除商品!'
        ]);
    }
}
