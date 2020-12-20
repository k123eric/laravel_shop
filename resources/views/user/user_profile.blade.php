@extends('layouts.app')

@section('title', '個人資料')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item" style="width: 12rem;">
                        <div class="card" style="margin-top: 20px;border-style:none">
                            <img src="{{Auth::user()->image_url}}" class="card-img-top" style="width: 8rem;height: 8rem;border-radius: 50%;" alt="...">
                            <div class="card-body">
                                <p class="card-text">{{Auth::user()->name}}</p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item" style="width: 36rem">
                        <div style="margin-top: 10%">
                            <p>身分:{{Auth::user()->identity}}</p>
                            <p>個人信箱:{{Auth::user()->email}}</p>
                        </div>
                    </li>
                </ul>
                <ul class="list-group list-group-horizontal-sm">

                </ul>
            </div>
        </div>
    </div>
@endsection
