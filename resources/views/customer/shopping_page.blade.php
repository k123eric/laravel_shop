@extends('layouts.app')

@section('顧客', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="row" style="width: 1918px; padding:0 20px 0 210px">
            <button id="ShoppingCart"><img src="https://webstockreview.net/images/shopping-cart-icon-png-1.png" style="width: 32px"></button>
        @foreach($commodities as $value)
            <div class="card" style="width: 17rem; margin: 30px 14px 0 14px">
                <img src="https://webstockreview.net/images/shopping-cart-icon-png-1.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$value->name}}</h5>
                    <p class="card-text">價格:{{$value->price}}</p>
                    <a href="/customer/commodity/{{$value->id}}" class="btn btn-primary">查看商品詳細</a>`
                </div>
            </div>
        @endforeach
    </div>
@endsection
