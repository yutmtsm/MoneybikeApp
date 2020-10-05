<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=yes">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>
        
        <!-- asset(‘ファイルパス’)は、publicディレクトリのパスを返す関数 -->
        <!-- Scripts -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>-->
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>-->
        <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>-->
        <!--下のapp.jsで読み込んでいる為上３つはいらない-->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src='https://api.tiles.mapbox.com/mapbox.js/v2.0.0/mapbox.js'></script>
        <link href='https://api.tiles.mapbox.com/mapbox.js/v2.0.0/mapbox.css' rel='stylesheet' />
        <script src="{{ asset('js/ktsn.lf.canvas.js') }}" defer></script>
         {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
        <script src="{{ asset('js/app.js') }}" defer></script>
        
        <!--スライダー関連-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/css/swiper.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js"></script>

        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/infinite-scroll.pkgd.min.js') }}"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/common.css') }}" rel="stylesheet">
        <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
        <link href="{{ asset('css/' . $__env->yieldContent('css') ) }}" rel="stylesheet">
        
        <!-- Font Awesome -->
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            {{-- ナビゲーションバー --}}
            
            <nav class="navbar navbar-expand-lg navbar-light bg-dark">
                <a class="navbar-brand" href="{{ url('/') }}"><img src="https://yutmtsm.s3.ap-northeast-1.amazonaws.com/UoFaPWcB4lzTlRVQWzQBCqwcMWwZ8IAljmGSXDeW.gif"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse w-100" id="navbarNav">
                    @if (Route::has('login'))
                    <ul class="navbar-nav">
                        @auth
                        <li class="nav-item active bg-dark">
                            <a class="nav-link nav-link text-light" href="{{ url('mypage/') }}">{{ __('messages.nav_mypage') }} <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item bg-dark">
                            <a class="nav-link nav-link text-light" href="{{ url('mypage/myfollowers') }}">{{ __('messages.nav_myfollower') }}</a>
                        </li>
                        <li class="nav-item bg-dark">
                            <a class="nav-link nav-link text-light" href="{{ url('mypage/posts') }}">{{ __('messages.nav_mypost') }}</a>
                        </li>
                        <li class="nav-item bg-dark">
                            <a class="nav-link nav-link text-light" href="{{ url('mypage/money') }}">{{ __('messages.nav_moneyaccount') }}</a>
                        </li>
                        <li class="nav-item bg-dark">
                            <a class="nav-link nav-link text-light" href="{{ url('mypage/spot_search') }}">{{ __('messages.nav_spotsearch') }}</a>
                        </li>
                        <li class="nav-item bg-dark">
                            <a class="nav-link nav-link text-light" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('messages.nav_logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            </form>
                                
                        </li>
                        @else
                        <li class="nav-item bg-dark">
                            <a class="nav-link nav-link text-light" href="{{ url('/') }}">{{ __('messages.nav_home') }}</a>
                        </li>
                        <li class="nav-item bg-dark">
                            <a class="nav-link nav-link text-light" href="#service-wrapper">{{ __('messages.nav_searvice') }}</a>
                        </li>
                        <li class="nav-item bg-dark">
                            <a class="nav-link nav-link text-light" href="#about-wrapper">{{ __('messages.nav_about') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item bg-dark">
                            <a class="nav-link nav-link text-light" href="{{ route('register') }}">{{ __('messages.nav_register') }}</a>
                        </li>
                        @endif
                        <li class="nav-item bg-dark">
                            <a class="nav-link nav-link text-light" href="{{ route('login') }}">{{ __('messages.nav_login') }}</a>
                        </li>
                        @endauth
                    </ul>
                    @endif
                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>
            <footer>
                {{-- ナビゲーションバー --}}
            
            <nav class="navbar navbar-expand-lg navbar-light bg-dark">
                <a class="navbar-brand" href="{{ url('/') }}"><img src="https://yutmtsm.s3.ap-northeast-1.amazonaws.com/UoFaPWcB4lzTlRVQWzQBCqwcMWwZ8IAljmGSXDeW.gif"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse w-100" id="navbarNav">
                    @if (Route::has('login'))
                    <ul class="navbar-nav">
                        @auth
                        <li class="nav-item active bg-dark">
                            <a class="nav-link nav-link text-light" href="{{ url('mypage/') }}">{{ __('messages.nav_mypage') }} <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item bg-dark">
                            <a class="nav-link nav-link text-light" href="{{ url('mypage/myfollowers') }}">{{ __('messages.nav_myfollower') }}</a>
                        </li>
                        <li class="nav-item bg-dark">
                            <a class="nav-link nav-link text-light" href="{{ url('mypage/posts') }}">{{ __('messages.nav_mypost') }}</a>
                        </li>
                        <li class="nav-item bg-dark">
                            <a class="nav-link nav-link text-light" href="{{ url('mypage/money') }}">{{ __('messages.nav_moneyaccount') }}</a>
                        </li>
                        <li class="nav-item bg-dark">
                            <a class="nav-link nav-link text-light" href="{{ url('mypage/spot_search') }}">{{ __('messages.nav_spotsearch') }}</a>
                        </li>
                        <li class="nav-item bg-dark">
                            <a class="nav-link nav-link text-light" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('messages.nav_logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            </form>
                                
                        </li>
                        @else
                        <li class="nav-item bg-dark">
                            <a class="nav-link nav-link text-light" href="#top-wrapper">{{ __('messages.nav_home') }}</a>
                        </li>
                        <li class="nav-item bg-dark">
                            <a class="nav-link nav-link text-light" href="#service-wrapper">{{ __('messages.nav_searvice') }}</a>
                        </li>
                        <li class="nav-item bg-dark">
                            <a class="nav-link nav-link text-light" href="#about-wrapper">{{ __('messages.nav_about') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item bg-dark">
                            <a class="nav-link nav-link text-light" href="{{ route('register') }}">{{ __('messages.nav_register') }}</a>
                        </li>
                        @endif
                        <li class="nav-item bg-dark">
                            <a class="nav-link nav-link text-light" href="{{ route('login') }}">{{ __('messages.nav_login') }}</a>
                        </li>
                        @endauth
                    </ul>
                    @endif
                </div>
            </nav>
            
            </footer>
        </div>
    </body>
</html>