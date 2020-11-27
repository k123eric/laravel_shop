@extends('layouts.app')

@section('商品列表', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div id=app>
        <example-component></example-component>
    </div>
    <div class="container" style="padding-top:70px">
        <div class="row">
            <div class="col-md-6">
                <a href="/admin/product/new"><button class="btn btn-success">新增商品</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                    <td>名稱</td>
                    <td>價格</td>
                    <td>描述</td>
                    <td>操作</td>
                    </thead>
                    <tbody>
                    <tr>
                        <td>名稱</td>
                        <td>價格</td>
                        <td>描述</td>
                        <td>操作</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

