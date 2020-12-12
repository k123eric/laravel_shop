@extends('layouts.app')

@section('title', '新增商品')

@section('content')
    <div class="container" style="padding-top:2px">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h2>新增商品</h2>
            </div>
            <div class="panel-body">
{{--                <form method="POST" action="admin/commodity/store" class="form-horizontal" enctype="multipart/form-data" role="form">--}}
{{--                    {{ csrf_field() }}--}}
{{--                    <fieldset>--}}
{{--                        <div class="form-group">--}}
{{--                            <label class="col-md-3 control-label" for="name">名稱</label>--}}
{{--                            <div class="col-md-9">--}}
{{--                                <input id="name" name="name" type="text" placeholder="商品名稱" class="form-control input-md" required="">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group">--}}
{{--                            <label class="col-md-3 control-label" for="textarea">介紹</label>--}}
{{--                            <div class="col-md-9">--}}
{{--                                <textarea class="form-control" id="textarea" name="introduction"></textarea>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group">--}}
{{--                            <label class="col-md-3 control-label" for="price">數量</label>--}}
{{--                            <div class="col-md-9">--}}
{{--                                <input id="amount" name="amount" type="text" placeholder="商品數量" class="form-control input-md" required="">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group">--}}
{{--                            <label class="col-md-3 control-label" for="price">價格</label>--}}
{{--                            <div class="col-md-9">--}}
{{--                                <input id="price" name="price" type="text" placeholder="商品價格" class="form-control input-md" required="">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group">--}}
{{--                            <label class="col-md-3 control-label" for="image_url">圖片URL</label>--}}
{{--                            <div class="col-md-9">--}}
{{--                                <input id="image_url" name="image_url" type="text" placeholder="商品圖片URL" class="form-control input-md">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group">--}}
{{--                            <label class="col-md-3 control-label" for="submit"></label>--}}
{{--                            <div class="col-md-9">--}}
{{--                                <button id="submit" name="submit" class="btn btn-primary">提交</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </fieldset>--}}
{{--                </form>--}}
                {{Form::open(['url'=>'/admin/commodity/store', 'method'=>'post'])}}
                {{Form::label('title', '商品名稱')}}<br>
                {{Form::text('name')}}<br>
                {{Form::label('商品價格')}}<br>
                {{Form::text('price')}}<br>
                {{Form::label('商品數量')}}<br>
                {{Form::text('amount')}}<br>
                {{Form::label('商品圖片網址')}}<br>
                {{Form::text('image_url')}}<br>
                {{Form::label('商品介紹')}}<br>
                {{Form::textarea('introduction')}}<br>
                {{Form::submit('確認送出')}}
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
