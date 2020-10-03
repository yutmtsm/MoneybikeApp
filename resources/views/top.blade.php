@extends('layouts.common.common')
@section('css', 'top.css')

@section('title', '新規投稿')

@section('content')
<div class="top-wrapper">
    <div class="container">
        <div class="top-comment">
            <div class="inner-container">
                <img src="https://www.nin-fan.net/tool/image/97s69.gif" class="mt-5">
                <p class="text-light">テキストテキストテキストテキストテキストテキストテキストテキスト<br>
                テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
                <div id="map_search" style="padding-bottom: 30px;">
                    <form class="form-search" method="get" >
                        <div class="input-group">
                            <input type="text" class="form-control input-medium search-query" placeholder="例：東京駅、渋谷駅" value="" >
                            <span class="input-group-btn">
                            <input alt="検索" type="submit" value="検索">
                            </span>
                        </div><!-- /input-group -->
                    </form>
                </div><!-- /map_search -->   
            </div>
        </div><!--top-comment-->
    </div>
</div>


@endsection
