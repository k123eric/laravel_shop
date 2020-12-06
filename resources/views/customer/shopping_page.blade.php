@extends('layouts.app')

@section('title', '商店頁面')

@section('content')
    <div class="row" style="width: 1918px; padding:0 20px 0 210px">
        @foreach($commodities as $commodity)
            <div class="card" style="width: 17rem; margin: 30px 14px 0 14px">
                <img src="{{$commodity->image_url}}" class="card-img-top" alt="無法顯示圖片">
                <div class="card-body">
                    <h5 class="card-title">{{$commodity->name}}</h5>
                    <p class="card-text">價格:{{$commodity->price}}</p>
                    <a href="{{route('customer.commodity',['id'=>$commodity->id])}}" class="btn btn-primary">{{__('查看商品詳細')}}</a>`
                </div>
            </div>
        @endforeach
        <button id="ShoppingCart" onclick="open_cart()"><img src="https://webstockreview.net/images/shopping-cart-icon-png-1.png" style="width: 32px"></button>
    </div>
@endsection
