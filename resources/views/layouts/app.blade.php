<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/button.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand navbar-dark bg-dark">
                <a class="navbar-brand" href="{{ url('/customer/shop') }}">購物網</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ url('/customer/shop') }}">Home</a>
                        </li>
                        <li class="nav-item dropdown" style="position:fixed;margin-left: 1620px">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" aria-expanded="false">
                                @if(Auth::check())
                                    {{Auth::user()->name}}
                                    @else
                                    {{__('未登入')}}
                                @endif
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                @if(Auth::check())
                                    <li><a class="dropdown-item" href="#">個人資料</a></li>
                                    <li><a class="dropdown-item" href="#">購物車</a></li>
                                    <li><a class="dropdown-item" href="#">購買紀錄</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    @if(Auth::user()->identity=='admin')
                                        <li><a class="dropdown-item" href="{{route('admin.commodity_management')}}">商品管理</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                    @endif
                                    <li><a class="dropdown-item" href="{{route('logout')}}">登出</a></li>
                                    @else
                                    <li><a class="dropdown-item" href="{{ url('/login')}}">登入</a></li>
                                    <li><a class="dropdown-item" href="{{ url('/register')}}">註冊</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <button onclick="topFunction()" id="myBtn" title="回到頂部"><img src="https://image.flaticon.com/icons/png/512/59/59043.png" style="width: 32px"></button>


        <script>
            $('document').ready(function(){
                set_dropdown_list();
            });

            window.onscroll = scrollFunction;

            function scrollFunction() {
                if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                    document.getElementById("myBtn").style.display = "block";
                } else {
                    document.getElementById("myBtn").style.display = "none";
                }
            }

            function topFunction() {
                $("html, body").animate({scrollTop: 0}, 500); // For Chrome, Firefox, IE and Opera
            }

            function open_cart() {
                window.location.href="{{route('customer.cart')}}";
            }

            function set_dropdown_list(){

                let dropdown_menu = $('.dropdown-menu');
                let dropdown_link = $('#navbarDropdownMenuLink');

                dropdown_link.on("mousedown",function(){
                    if((dropdown_menu.css("display") === "block")) {
                        dropdown_menu.fadeOut();
                    }else{
                        dropdown_menu.fadeIn();
                    }
                });

                dropdown_menu.hover(function(){
                },function(){
                    dropdown_menu.fadeOut();
                });
            }
        </script>
    </div>
</body>
</html>
