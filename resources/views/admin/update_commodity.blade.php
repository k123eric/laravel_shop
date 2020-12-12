@extends('layouts.app')

@section('title', '新增商品')

@section('content')
    <div class="container" style="padding-top:2px">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h2>更新商品</h2>
            </div>
            <div class="panel-body">
                {{Form::open(['url'=>'/admin/commodity/update/', 'method'=>'post'])}}
                {{Form::label('商品編號')}}<br>
                {{Form::text('commodity_id',$commodity->id)}}<br>
                {{Form::label('title', '商品名稱')}}<br>
                {{Form::text('name',$commodity->name)}}<br>
                {{Form::label('商品價格')}}<br>
                {{Form::text('price',$commodity->price)}}<br>
                {{Form::label('商品數量')}}<br>
                {{Form::text('amount',$commodity->amount)}}<br>
                {{Form::label('商品圖片網址')}}<br>
                {{Form::text('image_url',$commodity->image_url)}}<br>
                {{Form::label('商品介紹')}}<br>
                {{Form::textarea('introduction',$commodity->introduction)}}<br>
                {{Form::submit('確認送出')}}
                {{Form::close()}}
            </div>
        </div>
    </div>
    <script>
        window.onload = function() {
            set_id();
        };

        function set_id(){
            let id_input = document.getElementsByName("commodity_id");
            id_input[0].setAttribute('readonly','readonly');
        }
    </script>
@endsection
