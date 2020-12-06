@extends('layouts.app')

@section('title', '購物車')

@section('content')
    <div class="container">
        <table class="table table-bordered mb-0">
            <thead>
            <tr class="text-center">
                <th>商品名稱</th>
                <th>單價</th>
                <th>數量</th>
                <th>價格</th>
                <th>編輯</th>
            </tr>
            </thead>
            <tbody>
                @forelse ($commodities as $product)
                    <tr class="text-center">
                        <td style="padding-top: 20px">{{$product->name}}</td>
                        <td style="padding-top: 20px">{{$product->price}}</td>
                        <td style="padding-top: 20px">{{$product->buy_amount}}</td>
                        <td style="padding-top: 20px" id="price">{{$product->price*$product->buy_amount}}</td>
                        <td style="padding-top: 20px"><a href="/customer/cart/delete/{{$product->id}}"
                               class="text-red-500 delete-confirm font-medium ml-2">刪除</a></td>
                    </tr>
                    @empty
                        <tr>
                            <td class="text-center text-muted" colspan="5">
                                現在購物車中沒有任何商品，馬上去購物吧！
                                <a href="{{ url('/customer/shop')}}" class="btn btn-outline-primary">商品區</a>
                            </td>
                        </tr>
                @endforelse
            <tr class="text-center">
                <td colspan="3" style="padding-top: 20px"><h5>總價</h5></td>
                <td colspan="2" style="padding-top: 20px" id="all_price"><h5></h5></td>
            </tr>
            </tbody>
        </table>
        <a href="{{ url('/customer/shop')}}">繼續購物</a>
        <button type="button" class="btn btn-primary" style="float:right;margin-top: 20px">前往結帳</button>
    </div>
@endsection

{{--@push('script')--}}
<script>
    window.onload = function(){
        count_price();
    }

    function count_price(){
        let all_price = parseInt(0,10);
        let price = document.querySelectorAll("[id='price']");
        for(let i = 0;i<price.length;i++){
            all_price += parseInt(price[i].innerText,10);
        }
        document.getElementById('all_price').innerText = all_price;
    }
</script>
