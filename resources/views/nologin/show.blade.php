@extends('layouts.common.common')
@section('css', 'post.css')

@section('title', '投稿内容')

@section('content')
<div class="container">
    <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
        <li itemprop="itemListElement" itemscopeitemtype="https://schema.org/ListItem">
            <i class="fa fa-home text-dark" aria-hidden="true"></i>
            <a itemprop="item" href="{{ url('/') }}">
                <span itemprop="name">ホーム</span>
            </a>
            <meta itemprop="position" content="1" />
        </li>
        <li itemprop="itemListElement" itemscopeitemtype="https://schema.org/ListItem">
            <i class="fa fa-search text-dark" aria-hidden="true"></i>
            <a itemprop="item" href="{{ url('/search') }}">
                <span itemprop="name">検索結果</span>
            </a>
            <meta itemprop="position" content="1" />
        </li>
        <li class=" text-dark current-nav" itemprop="itemListElement" itemscopeitemtype="https://schema.org/ListItem">
            <i class="fa fa-file" aria-hidden="true"></i>
            <span itemprop="name">記事詳細</span>
            <meta itemprop="position" content="1" />
        </li>
    </ol>
    
    <div class="row" style="width: 100%;">
        <div class="col-md-12 mx-auto" >
            
            <div class="post-info d-flex">
                <!-- タイトル -->
                <div class="col-md-12 d-flex no-gutters">
                    <!--他のユーザーページへ-->
                       <img src="{{ $post_user->profile_image }}" class="rounded-circle" width="50" height="50">
                        <div class="ml-2 d-flex flex-column">
                            <a class="mb-0">{{ $post_user->name }}
                            @if($post_user->gender === "男性")<i class="fa fa-mars text-primary" aria-hidden="true"></i>
                            @elseif($post_user->gender === "女性")<i class="fa fa-venus text-danger" aria-hidden="true"></i>
                            @else <i class="fa fa-transgender text-success" aria-hidden="true"></i>
                            @endif
                            </a>
                            <a class="">{{ $post_user->screen_name }}</a>
                        </div>
                   <div class="post-top">
                       <div class="form-inline">
                           <a class="other-link" href="#">
                            </a>
                           <div class="post-date">{{ $post->created_at }}</div>
                        </div>
                        <div class="post-title">
                            <h3>『{{ $post->title }}』</h3>
                        </div>
                   </div>
                   <div class="d-flex align-items-center">
                       <!--記事に対してのいいね数-->
                       <i class="fa fa-heart text-danger"></i> 
                       <p class="mb-0 text-light">{{ count($post->favorites) }}</p>
                   </div>
               </div>
               
           </div>
            <!-- コメント -->
            <div class="post-content">
                <label class="post-comment"></label>
                <p style="color: white;">{{ $post->text }}</p>
            </div>
            
            <div class="d-flex">
                <div class="col-md-7">
                    <!-- スポット -->
                    <div class="form-group">
                        <div class="d-flex">
                            <div>
                                <label class="control-label">都道府県</label>
                                <p style="color: white;">　{{ $post->pref }}</p>
                            </div>
                            <div class="ml-5">
                                <label class="control-label">スポット名</label>
                                <p style="color: white;">　{{ $post->spot }}</p>
                            </div>
                        </div>
                    </div>
            
                    <!-- 使用金 -->
                    <div class="d-flex align-items-center">
                        <div class="form-group">
                            <label class="control-label">施設費</label>
                            <!--<input type="text" class="form-control" name="addmission_fee" value="{{ old('addmission_fee') }}">-->
                            <p style="color: white;">{{ number_format($post->addmission_fee) }}円</p>
                        </div>
                        <div class="form-group" style="margin-left: 100px;">
                            <label class="control-label">購入金</label>
                            <!--<input type="text" class="form-control" name="purchase_cost" value="{{ old('purchase_cost') }}">-->
                            <p style="color: white;">{{ number_format($post->purchase_cost) }}円</p>
                        </div>
                        <div class="form-group" style="margin-left: 100px;">
                            <label class="control-label">トータル</label>
                            <!--<input type="text" class="form-control" name="purchase_cost" value="{{ old('purchase_cost') }}">-->
                            <p style="color: white;">{{ number_format($total_cost) }}円</p>
                        </div>
                    </div>
                    
                    <!-- 画像 -->
                    <div class="form-group">
                        @if(isset($post->image_path))
                            <img width="300px" height="auto" src="{{$post->image_path}}">
                        @else
                            <img width="300px" height="auto" src="https://yutmtsm.s3.ap-northeast-1.amazonaws.com/z6L5P9QTOHolCDoQUx9s0bRY6LoeQfZgSho7StYu.png">
                        @endif
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <iframe style="border: 0;" 
                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDPv-uNVityorhO-YUuKfYxg7F5ab-NumM&q={{ $post->pref}}{{ $post->spot }}" 
                    width="300" height="300" frameborder="0" allowfullscreen="allowfullscreen">
                    </iframe>
                </div>
            </div>
        </div>
    
</div>
@endsection
