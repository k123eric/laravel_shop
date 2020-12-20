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
            <tr>
                <td class="text-center text-muted" id="non_commodity" colspan="5" style="display: none">
                    現在購物車中沒有任何商品，馬上去購物吧！
                    <a href="{{ url('/customer/shop')}}" class="btn btn-outline-primary">商品區</a>
                </td>
            </tr>
            @if(isset($commodities))
                @foreach ($commodities as $commodity)
                    <tr class="text-center commodity" style="line-height:54px;">
                        <td id="commodity_name" style="padding-top: 20px">
                            {{$commodity->name}}
                            <div class="card" id="img_card" style="max-width: 20rem;max-height: 20rem;position:absolute;z-index:999;display:none;margin-top: 20px"><img src="{{$commodity->image_url}}" class="img-fluid" alt="無法顯示圖片"></div>
                        </td>
                        <td style="padding-top: 20px">{{$commodity->price}}</td>
                        <td style="padding-top: 20px">{{$commodity->buy_amount}}</td>
                        <td style="padding-top: 20px" id="price">{{$commodity->price*$commodity->buy_amount}}</td>
                        <td style="padding-top: 20px">
                            <button type="button" id="plus_button" style="border:none;background-color:transparent;"><img src="https://img.icons8.com/android/24/000000/plus.png"/></button>
                            <button type="button" id="minus_button" style="border:none;background-color:transparent;"><img src="https://img.icons8.com/android/24/000000/minus.png"/></button>
                            <button type="button" id="delete_button" class="btn btn-danger">刪除</button>
                        </td>
                    </tr>
                @endforeach
                <tr class="text-center" id="all_price_tr">
                    <td colspan="3" style="padding-top: 20px"><h5>總價</h5></td>
                    <td colspan="2" style="padding-top: 20px" id="all_price">1</td>
                </tr>
            @else
                <tr>
                    <td class="text-center text-muted" colspan="5">
                        現在購物車中沒有任何商品，馬上去購物吧！
                        <a href="{{ url('/customer/shop')}}" class="btn btn-outline-primary">商品區</a>
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
        <div>
            @if(isset($commodities))
                <a id="keep_shopping" href="{{ url('/customer/shop')}}">繼續購物</a>
                <button type="button" id="checkout_button" class="btn btn-primary" style="float:right;margin-top: 10px">前往結帳</button>
            @endif
            @if (session('success'))
                <div class="alert alert-success" style="margin-top: 30px">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('fail'))
                <div class="alert alert-danger" style="margin-top: 30px">
                    {{ session('fail') }}
                </div>
            @endif
        </div>
    </div>

    <script>
        $(document).ready(function(){
            count_price();
        });

        $('.commodity').find('#commodity_name').hover(function(){
            let img_card = $(this).parent().find('#img_card');
            img_card.css('display','');
        }, function(){
            let img_card = $(this).parent().find('#img_card');
            img_card.css('display','none');
        });

        $('#plus_button').on('click',function(){
            console.log('plus');
        });

        $('#minus_button').on('click',function(){
            console.log('minus');
        });

        $('.btn-danger').click(function(){
            let commodity_name = $(this).parent().parent().find('#commodity_name')[0].innerText;
            swal({
                text: "確定是否刪除此商品",
                icon: 'warning',
                dangerMode: true,
                buttons: {
                    cancel: {
                        text: "取消",
                        value: false,
                        visible: true,
                        className: "",
                        closeModal: true
                    },
                    confirm: {
                        text: "確認刪除",
                        value: true,
                        visible: true,
                        className: "delete_commodity",
                        closeModal: true
                    }
                },
            }).then((value)=>{
                if(value){
                    $.ajax(
                        {
                            url: '{{route('customer.cart_delete')}}',
                            type: 'get',
                            data:{
                                'commodity_name': commodity_name,
                            },
                            dataType: "JSON",
                            success: function (data) {
                                swal(data.msg);
                                set_tr_after_delete();
                                if($('.commodity').length === 0){
                                    clean_tr();
                                }
                            },
                            error: function () {
                                swal("因未知原因刪除失敗!")
                            }
                        });
                }
            });
        });

        function count_price(){
            let all_price = parseInt(0,10);
            let price = document.querySelectorAll("[id='price']");
            for(let i = 0;i<price.length;i++){
                all_price += parseInt(price[i].innerText,10);
            }
            $('#all_price').text(all_price);
        }

        function set_tr_after_delete(){
            let td_commodity_name = $('#commodity_name');
            let td_all_price = $('#all_price');
            let price = parseInt(td_commodity_name.parent().find('#price').text(),10);
            let all_price = td_all_price.text();
            all_price -= price;
            td_all_price.text(all_price);
            td_commodity_name.parent().remove();
        }

        function clean_tr(){
            $('#non_commodity').css('display','');
            $('#all_price_tr').remove();
            $('#keep_shopping').remove();
            $('#checkout_button').remove();
        }
    </script>
@endsection
