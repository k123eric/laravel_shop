@extends('layouts.app')

@section('title', '商品詳細')

@section('content')
    <div class="row" style="width: 1918px; padding:0 20px 0 210px">
        <button id="ShoppingCart" onclick="open_cart()"><img src="https://webstockreview.net/images/shopping-cart-icon-png-1.png" style="width: 32px"></button>
            <div class="card" style="width: 17rem; margin: 30px 14px 0 14px;border: 0;background: 0">
                <img src="{{$commodity->image_url}}" class="card-img-top" alt="無法顯示圖片" style="margin: auto">
            </div>
            <div class="card-body" style="margin-top: 30px">
                <div style="margin-top: 3%">
                    <h5 class="card-title">{{$commodity->name}}</h5>
                    <p class="card-text" >價格:{{$commodity->price}}</p>
                    <p class="card-text" style="margin-top: 1%">商品剩餘數量:{{$commodity->amount}}</p>
                    @if(!$commodity->amount == 0)
                        <div class="input-group mb-3" style="width: 15%;margin-top: 2%">
                            <input id="amount" type="text" class="form-control" value="1" onkeyup="value=value.replace(/[^(\d)]/g,'')">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary" type="button" onclick="checkNum({{$commodity->id}},{{$commodity->amount}})">放入購物車</button>
                            </div>
                        </div>
                    @else
                        <span class="badge badge-dark" style="margin-top: 3%">商品已售完</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row" style="width: 1918px; padding:0 20px 0 210px">
        <div class="card" style="width: 90%">
            <div class="card-header">
                商品介紹
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0" style="word-break: break-all;">
                    <p>{{$commodity->introduction}}</p>
                </blockquote>
            </div>
        </div>
    </div>
@endsection

<script>
    function new_commodity(commodity_id,amount){
        window.location = '/customer/cart/add/'+commodity_id+'/'+amount;
    }

    function checkNum(commodity_id,amount){
        let input = $('#amount');
        let Num = input[0].value;
        if(Num < 0 || Num > amount || isNaN(Num)){
            sweetAlert("輸入數值需在 1 ~ "+amount+" 之間");
            input.value = "1";
        }else{
            new_commodity(commodity_id,Num);
        }
    }
</script>
