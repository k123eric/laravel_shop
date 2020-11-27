<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommodityResource;
use App\Http\Resources\CommodityResourceCollection;
use App\Commodity;
use Illuminate\Http\Request;

class CommodityController extends Controller
{
    public function index(): CommodityResourceCollection
    {
        return new CommodityResourceCollection(Commodity::paginate());
    }

    public function show(Commodity $commodity)
    {
        return new CommodityResource ($commodity);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:16|min:2',
            'category'  => '',
            'price'     => 'required',
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
        return response()->json();
    }
}
