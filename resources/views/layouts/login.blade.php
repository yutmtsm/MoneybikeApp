<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>
        
        <!-- asset(‘ファイルパス’)は、publicディレクトリのパスを返す関数 -->
        <!-- Scripts -->
         {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
        <script src="{{ secure_asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/common.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/top.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            {{-- ナビゲーションバー --}}
            <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'MoneyBike') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="callapse navbar-collapse" id="navbarSupportedContent">
                        @if (Route::has('login'))
                            <ul class="header-right navbar-nav ml-auto">
                                @auth
                                <li><a href="#">{{ __('messages.nav_mypage') }}</a></li>
                                <li><a href="#">{{ __('messages.nav_moneyaccount') }}</a></li>
                                <li><a href="#">{{ __('messages.nav_spotsearch') }}</a></li>
                                <li><a href="{{ route('logout') }}"　onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('messages.nav_logout') }}</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                                </form>
                                @else
                                <li><a href="#">{{ __('messages.nav_home') }}</a></li>
                                <li><a href="#">{{ __('messages.nav_about') }}</a></li>
                                <li><a href="#">{{ __('messages.nav_searvice') }}</a></li>
                                @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">{{ __('messages.nav_register') }}</a></li>
                                @endif
                                <li><a href="{{ route('login') }}">{{ __('messages.nav_login') }}</a></li>
                                @endauth
                            </ul>
                        @endif
                        
                    </div>
                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>
            <footer>
                {{-- ナビゲーションバー --}}
            <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'MoneyBike') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="callapse navbar-collapse" id="navbarSupportedContent">
                        @if (Route::has('login'))
                            <ul class="header-right navbar-nav ml-auto">
                                @auth
                                <li><a href="{{ action('Admin\MoneybikeController@mypage') }}">{{ __('messages.nav_mypage') }}</a></li>
                                <li><a href="#">{{ __('messages.nav_moneyaccount') }}</a></li>
                                <li><a href="#">{{ __('messages.nav_spotsearch') }}</a></li>
                                <li><a href="{{ route('logout') }}"　onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('messages.nav_logout') }}</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                                </form>
                                @else
                                <li><a href="{{ action('Admin\MoneybikeController@create') }}">{{ __('messages.nav_home') }}</a></li>
                                <li><a href="#">{{ __('messages.nav_about') }}</a></li>
                                <li><a href="#">{{ __('messages.nav_searvice') }}</a></li>
                                @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">{{ __('messages.nav_register') }}</a></li>
                                @endif
                                <li><a href="{{ route('login') }}">{{ __('messages.nav_login') }}</a></li>
                                @endauth
                            </ul>
                        @endif
                        
                    </div>
                </div>
            </nav>
            </footer>
        </div>
    </body>
</html>