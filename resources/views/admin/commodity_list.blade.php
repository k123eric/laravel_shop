@extends('layouts.app')

@section('title', '管理頁面')

@section('content')
    <div class="container" style="padding-top:40px">
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('admin.new_commodity')}}"><button class="btn btn-success">新增商品</button></a>
            </div>
        </div>

        <div class="row">
            @foreach($commodities as $value)
                <div class="card" style="width: 17rem; margin: 30px 6px 0 6px">
                    <img src="{{$value->image_url}}" class="card-img-top" alt="無法顯示圖片">
                    <div class="card-body">
                        <h5 class="card-title">{{$value->name}}</h5>
                        <p class="card-text">價格:{{$value->price}}</p>
                        <a style="float:right" href="/admin/commodity/delete/{{$value->id}}"
                           class="text-red-500 delete-confirm font-medium ml-2">刪除</a>
                        <a style="float:right" href="/admin/commodity/update/"
                           class="text-red-500 delete-confirm font-medium ml-2">修改</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

