@extends('layouts.app')

@section('商品列表', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container" style="padding-top:70px">
        <div class="row">
            <div class="col-md-6">
                <a href="/admin/commoditys/new"><button class="btn btn-success">新增商品</button></a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <td>名稱</td>
                        <td align="center">價格</td>
                        <td align="center">數量</td>
                        <td align="center">操作</td>
                    </thead>
                    <tbody>
                    @foreach($commodities as $value)
                        <tr>
                            <td>{{$value->name}}</td>
                            <td align="center">{{$value->price}}</td>
                            <td align="center">{{$value->amount}}</td>
                            <td align="center">
                                    <button type="button" class="btn btn-primary">修改</button>
                                    <button type="button" class="btn btn-danger">刪除</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

