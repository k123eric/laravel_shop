<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Resources\CommodityResource;
use App\Http\Resources\CommodityResourceCollection;
use App\Commodity;
use Illuminate\Http\Request;

class CommodityController extends Controller
{
    public function index()
    {

    }

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
        $request->validate([
            'name' => 'required|max:16|min:2',
            'price' => 'required',
            'amount' => 'required',
        ]);
//
        $commodity = new Commodity([
            'name' => $request->name,
            'price' => $request->price,
            'amount' => $request->amount,
            'introduction' => $request->introduction,
            'image_url' => $request->image_url,
        ]);
//
        $commodity -> save();
        return redirect(url('admin/commodity'));

//        $commodity = Commodity::create($request->all());
//        return new CommodityResource($commodity);
    }

    public function update(Request $request)
    {
        $new_commodity = new Commodity([
            'name' => $request->name,
            'price' => $request->price,
            'amount' => $request->amount,
            'introduction' => $request->introduction,
            'image_url' => $request->image_url,
        ]);

//        $new_commodity->name = $request->name;
//        $new_commodity->price = $request->price;
//        $new_commodity->amount = $request->amount;
//        $new_commodity->introduction = $request->introduction;
//        $new_commodity->image_url = $request->image_url;
        Commodity::where('id',$request->commodity_id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'amount' => $request->amount,
            'introduction' => $request->introduction,
            'image_url' => $request->image_url,
        ]);
        return redirect('admin/commodity');

//        $commodity->update($request->all());
//        return new CommodityResource($commodity);
    }

    public function destroy(Commodity $commodity)
    {
        $commodity->delete();
        return redirect('admin/commodity');
    }
}
