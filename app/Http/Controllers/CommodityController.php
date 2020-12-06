<?php

namespace App\Http\Controllers;

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

    public function commodity_new(){
        return view('/admin/new_commodity');
    }

    public function commodity_show_all()
    {
        return view('customer/shopping_page')->with('commodities',Commodity::all());
    }

    public  function commodity_show_one(Commodity $commodity)
    {
        return view('/customer/commodity')->with('commodity',$commodity);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:16|min:2',
            'price' => 'required',
            'amount' => 'required',
        ]);

        $commodity = Commodity::create($request->all());
        return new CommodityResource($commodity);
    }

    public function update(Commodity $commodity, Request $request):CommodityResource
    {
        $commodity->update($request->all());
        return new CommodityResource($commodity);
    }

    public function destroy(Commodity $commodity)
    {
        $commodity->delete();
        return redirect('admin/commodity_management');
    }
}
