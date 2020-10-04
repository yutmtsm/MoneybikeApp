@extends('layouts.common.common')
@section('css', 'top.css')

@section('title', 'Moneybike')

@section('content')
<div id="top-wrapper">
    <div class="container">
        <div class="top-comment">
            <div class="inner-container">
                <img src="https://yutmtsm.s3.ap-northeast-1.amazonaws.com/UoFaPWcB4lzTlRVQWzQBCqwcMWwZ8IAljmGSXDeW.gif" class="mt-5">
                <p class="text-light">ツーリングの目的地とお金の使途や他ユーザーの実際のバイク維持費を調べられます。<br>
                以下からスポットの使途金を調べる</p>
                <div id="map_search" style="padding-bottom: 30px;">
                    <form action="{{ action('MoneybikeController@search') }}" class="form-search d-flex" method="get" >
                        <input class="form-control col-md-9" type="search" placeholder="例：東京都、愛知県、空白で全表示" aria-label="Search"　name="cond_title">
                        <button class="btn btn-outline-success col-md-3" type="submit">スポット検索</button>
                     </form>
                </div><!-- /map_search -->   
            </div>
        </div><!--top-comment-->
    </div>
</div><!--top-wrapper-->
<div id="service-wrapper" class="mt-5">
    <div class="container">
        <a href="#timeline"><div  class="mainVisual"></div></a>
        <h2 class="heading text-center">バイクのお金周りに関するアプリ</h2>
    	<div class="projects row pt-4">
        	<div class="projectsItem col-md-4"><img src="{{ asset('/images/top1.jpg') }}"><p>ツーリングスポットの検索＆使途金</p></div>
        	<div class="projectsItem col-md-4"><img src="{{ asset('/images/top2.jpg') }}"><p>他ユーザーの維持費情報</p></div>
        	<div class="projectsItem col-md-4"><img src="{{ asset('/images/top3.jpg') }}"><p>マイバイクのお金管理</p></div>
        </div>
    </div>
</div><!--ervice-wrapper-->
<div id="about-wrapper" class="mt-5">
    <div class="container">
        <a href="#timeline"><div  class="mainVisual"></div></a>
        <h2 class="heading text-center">ログインして記事の投稿やバイク関連のお金管理</h2>
    	<div class="projects row pt-4">
        	<div class="projectsItem col-md-4"><img src="{{ asset('/images/top1.jpg') }}"><p>行った場所・使ったお金を投稿</p></div>
        	<div class="projectsItem col-md-4"><img src="{{ asset('/images/top2.jpg') }}"><p>使ったお金が一目でわかる</p></div>
        	<div class="projectsItem col-md-4"><img src="{{ asset('/images/top3.jpg') }}"><p></p></div>
        </div>
    </div>
</div><!--about-wrapper-->
<div class="signup-wrapper">
    <div class="container">
        <div class="heading">
            <h3>気になったら新規登録して、<br>
            おすすめのツーリングスポットの共有お願いします。</h3>
        </div>
        <a href="{{ route('register') }}" class="btn btn-primary signup">新規登録する</a>
    </div>
</div><!--message-wrapper-->

@endsection
