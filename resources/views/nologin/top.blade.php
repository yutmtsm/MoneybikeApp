@extends('layouts.common.common')
@section('css', 'top.css')

@section('title', 'Moneybike')

@section('content')
@if (Session::has('success'))
    <div id="sample">
        <p class="">{{ Session::get('success') }}</p>
    </div>
@endif
<div id="top-wrapper">
    <div class="container">
        <div class="top-comment">
            <div class="inner-container ">
                <img src="https://yutmtsm.s3.ap-northeast-1.amazonaws.com/UoFaPWcB4lzTlRVQWzQBCqwcMWwZ8IAljmGSXDeW.gif" class="mt-5">
                <p class="text-light">ツーリングの目的地とお金の使途や他ユーザーの実際のバイク維持費を調べられます。<br>
                以下からスポットや使ったお金を調べる。</p>
                <div id="map_search" style="padding-bottom: 30px;">
                    <form action="{{ action('MoneybikeController@search') }}" class="form-search d-md-flex" method="get" >
                        <input class="form-control col-md-9" type="search" placeholder="例：東京都、愛知県、空で全表示" aria-label="Search"　name="cond_title">
                        <button class="btn btn-outline-success col-md-3" type="submit">スポット検索</button>
                     </form>
                </div><!-- /map_search -->   
            </div>
        </div><!--top-comment-->
    </div>
</div><!--top-wrapper-->

<div class="container">
    <div id="carouselExampleIndicators" class="carousel slide" data-interval=3000 data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div id="service-wrapper" class="mt-5">
                    <a href="#timeline"><div  class="mainVisual"></div></a>
                    <h2 class="heading text-center">バイクのお金周りに関するアプリ</h2>
                    <div class="projects row pt-4">
                    	<div class="projectsItem col-md-4"><img src="{{ asset('/images/top1.jpg') }}"><p>ツーリングスポットの検索</p></div>
                    	<div class="projectsItem col-md-4"><img src="{{ asset('/images/top2.jpg') }}"><p>スポットでのお金</p></div>
                    	<div class="projectsItem col-md-4"><img src="{{ asset('/images/top3.jpg') }}"><p>ユーザーの維持費情報</p></div>
                    </div>
                </div><!--service-wrapper-->
            </div>
            <div class="carousel-item">
                <div id="service-wrapper" class="mt-5">
                    <a href="#timeline"><div  class="mainVisual"></div></a>
                    <h2 class="heading text-center">ログインして記事の投稿やバイク関連のお金管理</h2>
                	<div class="projects row pt-4">
                    	<div class="projectsItem col-md-4"><img src="{{ asset('/images/top1.jpg') }}"><p>行った場所とお金を投稿</p></div>
                    	<div class="projectsItem col-md-4"><img src="{{ asset('/images/top2.jpg') }}"><p>使ったお金が一目でわかる</p></div>
                    	<div class="projectsItem col-md-4"><img src="{{ asset('/images/top2.jpg') }}"><p>ユーザーのバイク情報共有</p></div>
                    	<div class="projectsItem col-md-4"><img src=""><p></p></div>
                    </div>
                </div><!--service-wrapper-->
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<div class="signup-wrapper">
    <div class="container">
        <div class="heading">
            <h3>気になったら新規登録して、<br>
            おすすめのツーリングスポットの共有お願いします。</h3>
        </div>
        <a href="{{ route('register') }}" class="btn btn-primary signup">新規登録する</a>
    </div>
</div><!--message-wrapper-->

<div class="container">
    <div id="contact-wrapper">
        <h3 class="section-title mt-5">お問い合わせ</h3>
        @if (Session::has('success'))
        <div id="sample">
            <style>
                body{
                    background-color: black;
                }
            </style>
            <p>{{ Session::get('success') }}</p>
        </div>
        @endif
        <form action="{{ action('ContactController@send') }}" method="post" enctype="multipart/form-data">
            @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            @endif
            <!-- 名前 -->
            <div class="">
                <div class="form-group">
                    <label class="control-label">{{ __('messages.Name') }}</label>
                    <input type="text" class="form-control" name="contact_name" value="{{ old('contact_name') }}">
                    @if ($errors->has('contact_name'))
                    <p>{{$errors->first('contact_name')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label">{{ __('messages.E-Mail Address') }}</label>
                    <input type="text" class="form-control" name="contact_email" value="{{ old('contact_email') }}">
                    @if ($errors->has('contact_email'))
                    <p>{{$errors->first('contact_email')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label">問い合わせ項目</label>
                    <select name="contact_item" class="form-control mdoel-year">
                        <option value="">項目を選択してください</option>
                        <option value="機能について">機能について</option>
                        <option value="バグ報告">バグ報告</option>
                        <option value="その他">その他</option>
                    </select>
                    @if ($errors->has('contact_item'))
                    <p>{{$errors->first('contact_item')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label">{{ __('messages.contact_content') }}</label>
                    <textarea class="form-control" name="contact_message" value="{{ old('contact_message') }}" style="height: 150px;">{{ old('contact_content') }}</textarea>
                    @if ($errors->has('contact_message'))
                    <p>{{$errors->first('contact_message')}}</p>
                    @endif
                </div>
                {{ csrf_field() }}
                <input type="submit" class="btn-primary" value="送信">
            </div>
        </form>
        
    </div>
</div>

@endsection
