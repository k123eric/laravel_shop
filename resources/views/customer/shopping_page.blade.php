@extends('layouts.app')

@section('title', '商店頁面')

@section('content')
    @if (session('status'))
        <div class="status">
            <div style="position: absolute;width:1918px;height:150%;background: #1b1e21;opacity: .3;z-index:1" >
            </div>
            <div class="card text-center" style=" width: 200px;height: 64px;position:fixed;top: 50%;left: 50%;margin: -32px 0 0 -100px;z-index:2">
                <div class="card-body">
                    <p class="card-text">{{ session('status') }}</p>
                </div>
            </div>
        </div>
    @endif
    <div class="row" style="width: 1918px; padding:0 20px 0 220px">
        @foreach($commodities as $commodity)
            <div class="card" style="width: 17rem; margin: 30px 14px 0 14px">
                <img src="{{$commodity->image_url}}" class="card-img-top" alt="無法顯示圖片" style="height:16rem">
                <div class="card-body">
                    <h5 class="card-title">{{$commodity->name}}</h5>
                    <p class="card-text">價格:{{$commodity->price}}</p>
                    <a href="{{route('customer.commodity',['id'=>$commodity->id])}}" class="btn btn-primary">{{__('查看商品詳細')}}</a>`
                </div>
            </div>
        @endforeach
        <button id="ShoppingCart" onclick="open_cart()"><img src="https://webstockreview.net/images/shopping-cart-icon-png-1.png" style="width: 32px"></button>
    </div>
    <script>
        $(document).ready(function(){
            if($('.status') !== 'undefined'){
                let timeoutID = window.setTimeout(( () => $('.status').remove() ), 1000);

                $('.status').hover(function(){
                    window.setTimeout(( () => $(this).remove() ), 500);
                });
            }
        });
    </script>
@endsection
