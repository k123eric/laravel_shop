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
                                <input id="name" name="name" type="text" placeholder="商品名稱" class="form-control input-md" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="amount">數量</label>
                            <div class="col-md-9">
                                <input id="amount" name="amount" type="text" placeholder="商品數量" class="form-control input-md" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="price">價格</label>
                            <div class="col-md-9">
                                <input id="price" name="price" type="text" placeholder="商品價格" class="form-control input-md" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="image_url">圖片URL</label>
                            <div class="col-md-9">
                                <input id="image_url" name="image_url" type="text" placeholder="商品圖片URL" class="form-control input-md" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="textarea">介紹</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="textarea" name="introduction" required></textarea>
                            </div>
                        </div>

                        <div>
                            <label class="col-md-3 control-label" for="textarea">圖片預覽</label>
                            <div class="col-md-9">
                                <img id="image_preview" src="" class="img-thumbnail" alt="無法顯示圖片">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="submit"></label>
                            <div class="col-md-9">
                                <button id="submit" name="submit" class="btn btn-primary">提交</button>
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
            $('#image_preview').attr('src', loading_url);
        });

        $('input[name="image_url"]').keyup(function(){
            let image_url = $(this).val();
            let image_preview = $('#image_preview');

            if(image_url === ''){
                image_preview.attr('src',loading_url);
            }

            image_preview.attr('src',$(this).val());
        });
    </script>
@endsection
