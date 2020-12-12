@extends('layouts.app')

@section('title', '管理頁面')

@section('content')
    <div class="container" style="padding-top:40px">
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('admin.new_commodity')}}"><button class="btn btn-success">新增商品</button></a>
            </div>
        </div>

        <div style="padding-top: 20px">tips:滑鼠置於商品名稱上顯示圖片</div>
        <div class="row">
            <ul class="list-group list-group-horizontal" style="text-align:center">
                <li class="list-group-item" style="width: 80px">編號</li>
                <li class="list-group-item" style="width: 420px">商品名稱</li>
                <li class="list-group-item" style="width: 230px">商品價格</li>
                <li class="list-group-item" style="width: 230px">商品數量</li>
                <li class="list-group-item" style="width: 180px">操作</li>
            </ul>
            @foreach($commodities as $commodity)
                <ul class="list-group list-group-horizontal" style="text-align:center">
                    <div class="card" id="img_card" style="width: 18rem;position:absolute;margin-left: 400px; z-index:999;display:none"><img src="{{$commodity->image_url}}" class="img-fluid" alt="無法顯示圖片"></div>
                    <li class="list-group-item" id="{{$commodity->id}}" style="width: 80px">{{$commodity->id}}</li>
                    <li class="list-group-item" id="commodity_name" style="width: 420px">{{$commodity->name}}</li>
                    <li class="list-group-item" style="width: 230px">{{$commodity->price}}</li>
                    <li class="list-group-item" style="width: 230px">{{$commodity->amount}}</li>
                    <li class="list-group-item" style="width: 90px">
                        <a href="/admin/commodity/update/{{$commodity->id}}"
                           class="text-red-500 delete-confirm font-medium ml-2">修改</a>
                    </li>
                    <li class="list-group-item" style="width: 90px">
                        <a href="/admin/commodity/delete/{{$commodity->id}}"
                           class="text-red-500 delete-confirm font-medium ml-2">刪除</a>
                    </li>
                </ul>
            @endforeach
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('.list-group').find('#commodity_name').hover(function(){
                let img_card = $(this).parent().find('#img_card');
                img_card.css('display','');
            }, function(){
                let img_card = $(this).parent().find('#img_card');
                img_card.css('display','none');
            });
        });
    </script>
@endsection

