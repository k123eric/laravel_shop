@extends('layouts.app')

@section('title', '管理頁面')

@section('content')
    <div class="container" style="padding-top:40px;padding-bottom: 400px">
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('admin.new_commodity')}}"><button class="btn btn-success">新增商品</button></a>
            </div>
        </div>


        <div style="padding-top: 20px">tips:滑鼠置於商品名稱上顯示圖片</div>
        <div class="row">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <ul class="list-group list-group-horizontal" style="text-align:center">
                <li class="list-group-item" style="width: 80px">編號</li>
                <li class="list-group-item" style="width: 420px">商品名稱</li>
                <li class="list-group-item" style="width: 200px">商品價格</li>
                <li class="list-group-item" style="width: 200px">商品數量</li>
                <li class="list-group-item" style="width: 240px">操作</li>
            </ul>
            @foreach($commodities as $commodity)
                <ul class="list-group list-group-horizontal" id="{{$commodity->id}}" style="text-align:center;line-height:54px;">
                    <div class="card" id="img_card" style="max-width: 20rem;max-height: 20rem;position:absolute;margin-left: 400px; z-index:999;display:none"><img src="{{$commodity->image_url}}" class="img-fluid" alt="無法顯示圖片"></div>
                    <li class="list-group-item" style="width: 80px">{{$commodity->id}}</li>
                    <li class="list-group-item" id="commodity_name" style="width: 420px">{{$commodity->name}}</li>
                    <li class="list-group-item" style="width: 200px">{{$commodity->price}}</li>
                    <li class="list-group-item" style="width: 200px">{{$commodity->amount}}</li>
                    <li class="list-group-item" style="width: 120px">
                        <button type="button" class="btn btn-primary" id="{{$commodity->id}}">修改</button>
                    </li>
                    <li class="list-group-item" style="width: 120px">
                        <button type="button" class="btn btn-danger" id='{{$commodity->id}}'>刪除</button>
                    </li>
                </ul>
            @endforeach
        </div>
    </div>
    <script>
        $(document).ready(function(){
        })

        $('.list-group').find('#commodity_name').hover(function(){
            let img_card = $(this).parent().find('#img_card');
            img_card.css('display','');
        }, function(){
            let img_card = $(this).parent().find('#img_card');
            img_card.css('display','none');
        });

        $('.btn-primary').click(function(){
            let id = $(this).attr('id');
            window.location = "commodity/update/"+id;
        })

        $('.btn-danger').click(function(){
            let id = $(this).attr('id');
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
                            url: "commodity/delete/"+id,
                            type: 'get',
                            dataType: "JSON",
                            success: function (data) {
                                swal(data.msg);
                                $('ul#'+id).remove();
                            },
                            error: function () {
                                swal("因未知原因刪除失敗!")
                            }
                        });
                }
            });
        });
    </script>
@endsection

