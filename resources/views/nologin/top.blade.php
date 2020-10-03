@extends('layouts.common.common')
@section('css', 'top.css')

@section('title', '新規投稿')

@section('content')
<div id="top-wrapper">
    <div class="container">
        <div class="top-comment">
            <div class="inner-container">
                <img src="https://yutmtsm.s3.ap-northeast-1.amazonaws.com/UoFaPWcB4lzTlRVQWzQBCqwcMWwZ8IAljmGSXDeW.gif" class="mt-5">
                <p class="text-light">ツーリングの目的地とお金の使途や<br>
                他ユーザーの実際のバイク維持費を調べられます。<br>
                以下からスポットの使途金を調べる</p>
                <div id="map_search" style="padding-bottom: 30px;">
                    <form action="{{ action('MoneybikeController@search') }}" class="form-search" method="get" >
                        <div class="input-group">
                            <input type="text" class="form-control input-medium search-query" placeholder="例：東京都、愛知県" name="cond_title" value="{{ $cond_title }}" >
                            <span class="input-group-btn">
                            <input alt="検索" type="submit" value="&#xf002; 検索">
                            </span>
                        </div><!-- /input-group -->
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
        	<div class="projectsItem col-md-4"><a href="#purpose"><img src="{{ asset('/images/top1.jpeg') }}"><p>ツーリングスポットの検索＆使途金</p></a></div>
        	<div class="projectsItem col-md-4"><a href="#task"><img src="{{ asset('/images/top2.jpeg') }}"><p>他ユーザーの維持費情報</p></a></div>
        	<div class="projectsItem col-md-4"><a href="#market"><img src="{{ asset('/images/top1.jpeg') }}"><p>マイバイクのお金管理</p></a></div>
        </div>
    </div>
</div>


@endsection
