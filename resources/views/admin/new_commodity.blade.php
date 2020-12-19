@extends('layouts.app')

@section('title', '新增商品')

@section('content')
    <div class="container" style="padding-top:2px">
        <div class="panel panel-info" >
            <div class="panel-heading">
                <h2>新增商品</h2>
            </div>
            <div class="panel-body">
                <form method="POST" action="{{ route('admin.store') }}" class="form-horizontal" enctype="multipart/form-data" role="form">
                    {{ csrf_field() }}
                    <fieldset>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="name">名稱</label>
                            <div class="col-md-9">
                                <input id="name" name="name" type="text" placeholder="商品名稱" class="form-control input-md @error('name') is-invalid @enderror" value="{{old('name')}}" required>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="amount">數量</label>
                            <div class="col-md-9">
                                <input id="amount" name="amount" type="text" placeholder="商品數量" class="form-control input-md @error('amount') is-invalid @enderror" value="{{old('amount')}}" required>
                                @error('amount')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="price">價格</label>
                            <div class="col-md-9">
                                <input id="price" name="price" type="text" placeholder="商品價格" class="form-control input-md @error('price') is-invalid @enderror" value="{{old('price')}}" required>
                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="image_url">圖片URL</label>
                            <div class="col-md-9">
                                <input id="image_url" name="image_url" type="text" placeholder="商品圖片URL" class="form-control input-md @error('image_url') is-invalid @enderror" value="{{old('image_url')}}" required>
                                @error('image_url')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="textarea">介紹</label>
                            <div class="col-md-9">
                                <textarea class="form-control @error('introduction') is-invalid @enderror" id="textarea" name="introduction" required>{{old('introduction')}}</textarea>
                                @error('introduction')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="col-md-3 control-label" for="textarea">效果預覽</label>
                            <div class="col-md-9">
                                <div class="card" style="width: 17rem;">
                                    <img src="" class="card-img-top" alt="無法顯示圖片" id="image_preview" style="height:16rem">
                                    <div class="card-body">
                                        <h5 class="card-title" id="name_preview"></h5>
                                        價格:<p class="card-text" id="price_preview"></p>
                                        <a class="btn btn-primary">{{__('查看商品詳細')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="submit"></label>
                            <div class="col-md-9">
                                <button name="submit" class="btn btn-primary">提交</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <script>
        const loading_url = 'https://www.hungo.com.tw/img/loading/ajax-loader2.gif';

        $(document).ready(function(){
            let image_url = $('input[name="image_url"]').val();
            if(image_url === ""){
                $('#image_preview').attr('src', loading_url);
            }else{
                $('#image_preview').attr('src', image_url);
            }
        });
        $('input[name="name"]').keyup(function(){
            let name = $(this).val();
            let name_preview = $('#name_preview');

            name_preview.text(name);
        });
        $('input[name="price"]').keyup(function(){
            let price = $(this).val();
            let price_preview = $('#price_preview');

            price_preview.text(price);
        });
        $('input[name="image_url"]').keyup(function(){
            let image_url = $(this).val();
            let image_preview = $('#image_preview');

            if(image_url === ''){
                image_preview.attr('src',loading_url);
                return;
            }
            image_preview.attr('src',$(this).val());
        });
    </script>
@endsection
