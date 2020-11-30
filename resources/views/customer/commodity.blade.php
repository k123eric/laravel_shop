@extends('layouts.app')

@section('顧客', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="row" style="width: 1918px; padding:0 20px 0 210px">
        <button id="ShoppingCart"><img src="https://webstockreview.net/images/shopping-cart-icon-png-1.png" style="width: 32px"></button>
            <div class="card" style="width: 17rem; margin: 30px 14px 0 14px">
                <img src="https://webstockreview.net/images/shopping-cart-icon-png-1.png" class="card-img-top" alt="...">
            </div>
        <div class="card-body" style="margin-top: 30px">
            <h5 class="card-title">{{$commodity->name}}</h5>
            <p class="card-text">價格:{{$commodity->price}}</p>
        </div>
        <div>
            <h1>{{$commodity->introduction}}</h1>
        </div>
    </div>
@endsection
