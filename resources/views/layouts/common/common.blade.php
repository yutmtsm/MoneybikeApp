<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=yes">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        
        <!-- アドレスバー等のブラウザのUIを非表示 -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <!-- default（Safariと同じ） / black（黒） / black-translucent（ステータスバーをコンテンツに含める） -->
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <!-- ホーム画面に表示されるアプリ名 -->
        <meta name="apple-mobile-web-app-title" content="Moneybike">
        <!-- ホーム画面に表示されるアプリアイコン -->
        <link rel="apple-touch-icon" href="https://yutmtsm.s3-ap-northeast-1.amazonaws.com/bikes/9LIBAh8NtLNb2GmVpa2oNQtBGpvimNUx1zhK4hfQ.jpeg">

        <title>@yield('title')</title>
        
        <!-- asset(‘ファイルパス’)は、publicディレクトリのパスを返す関数 -->
        <!-- Scripts -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>-->
        <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>-->
        <!--下のapp.jsで読み込んでいる為上３つはいらない-->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src='https://api.tiles.mapbox.com/mapbox.js/v2.0.0/mapbox.js'></script>
        <link href='https://api.tiles.mapbox.com/mapbox.js/v2.0.0/mapbox.css' rel='stylesheet' />
        <!--<script src="{{ asset('js/ktsn.lf.canvas.js') }}" defer></script>-->
         {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!---->
        
        <!--<script src="{{ asset('js/jquery.min.js') }}"></script>-->
        <!--<script src="{{ asset('js/infinite-scroll.pkgd.min.js') }}"></script>-->

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
                @auth
                <a class="navbar-brand" href="{{ url('/mypage') }}"><img src="https://yutmtsm.s3.ap-northeast-1.amazonaws.com/UoFaPWcB4lzTlRVQWzQBCqwcMWwZ8IAljmGSXDeW.gif"></a>
                @else
                <a class="navbar-brand" href="{{ url('/') }}"><img src="https://yutmtsm.s3.ap-northeast-1.amazonaws.com/UoFaPWcB4lzTlRVQWzQBCqwcMWwZ8IAljmGSXDeW.gif"></a>
                @endauth
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
                        <li class="nav-item bg-dark">
                            <a class="nav-link nav-link text-light" href="#contact-wrapper">{{ __('messages.nav_contact') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item bg-dark">
                            <a class="nav-link nav-link text-light" href="{{ route('register') }}">{{ __('messages.nav_register') }}</a>
                        </li>
                        @endif
                        <li class="nav-item bg-dark">
                            <a class="nav-link nav-link text-light" id="login-show">{{ __('messages.nav_login') }}</div>
                            <!--<a class="nav-link nav-link text-light" href="{{ route('login') }}">{{ __('messages.nav_login') }}</a>-->
                        </li>
                        @endauth
                    </ul>
                    @endif
                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>
            <footer class="bg-dark">
                @auth
                <a class="navbar-brand" href="{{ url('/mypage') }}"><img src="https://yutmtsm.s3.ap-northeast-1.amazonaws.com/UoFaPWcB4lzTlRVQWzQBCqwcMWwZ8IAljmGSXDeW.gif"></a>
                @else
                <a class="navbar-brand" href="{{ url('/') }}"><img src="https://yutmtsm.s3.ap-northeast-1.amazonaws.com/UoFaPWcB4lzTlRVQWzQBCqwcMWwZ8IAljmGSXDeW.gif"></a>
                @endauth
            </footer>
        </div>
        
        <div class="login-modal-wrapper" id="login-modal">
            <div class="top-login-modal">
                <div class="close-modal">
                    <i class="fa fa-2x fa-times"></i>
                </div>
                <!--ここから-->
                <div class="row justify-content-center" style="margin-top: 30px;">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" style="color: black;">{{ __('messages.Login') }}</div>
            
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
            
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right" style="color: black;">{{ __('E-Mail Address') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right" style="color: black;">{{ __('Password') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            
                                                <label class="form-check-label" for="remember" style="color: black;">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary" style="color: black;">
                                                {{ __('Login') }}
                                            </button>
            
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--ここまで-->
            </div>
          </div>
        <script src="{{ asset('js/modal.js') }}"></script>
    </body>
</html>