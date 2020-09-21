@extends('layouts.common.common')
@section('css', 'post.css')

@section('title', '投稿内容')

@section('content')
<div class="container">
    <h1>投稿内容</h1>
    <div class="row" style="width: 100%;">
        <div class="col-md-6 mx-auto" >
            <!-- タイトル -->
            <div class="post-info d-flex">
               <div class="col-md-8 d-flex no-gutters">
                   <a class="other-link" href="{{ action('MoneybikeController@otherpage', ['id' => $post->user_id]) }}">
                       @if(isset($post->image_icon))
                       <img class="post-icon" src="/storage/image/post/{{ $post->image_icon }}">
                        @else
                        <img class="post-icon" src="/storage/image/noimage.png">
                        @endif
                    </a>
                   <div class="post-top">
                         <div class="form-inline">
                             <a class="other-link" href="{{ action('MoneybikeController@otherpage', ['id' => $post->user_id]) }}">
                                 <div class="post-name" style="margin-right: 10px;">{{ $post->user_name }}</div>
                            </a>
                           <div class="post-date">{{ $post->created_at }}</div>
                        </div>
                        <div class="post-title">
                            <h2>『{{ $post->title }}』</h2>
                        </div>
                   </div>
               </div>
               <div class="col-md-4 text-right">
                   @if($user->id == $post->user_id)
                   <a href="{{ action('Admin\PostController@edit', ['id' => $post->id]) }}">編集</a>
                   <a href="{{ action('Admin\PostController@delete', ['id' => $post->id]) }}">削除</a>
                   @endif
               </div>
           </div>
            <!-- コメント -->
            <div class="post-content">
                <label class="post-comment"></label>
                <p style="color: white;">{{ $post->comment }}</p>
            </div>
            <!-- スポット -->
            <div class="form-group">
                <label class="control-label">スポット</label>
                <!--<input type="text" class="form-control" name="spot" value="{{ old('spot') }}">-->
                <p style="color: white;">{{ $post->spot }}</p>
            </div>
            <!-- 使用金 -->
            <div class="d-flex align-items-center">
                <div class="form-group">
                    <label class="control-label">施設費</label>
                    <!--<input type="text" class="form-control" name="addmission_fee" value="{{ old('addmission_fee') }}">-->
                    <p style="color: white;">{{ $post->addmission_fee }}</p>
                </div>
                <div class="form-group" style="margin-left: 100px;">
                    <label class="control-label">購入金</label>
                    <!--<input type="text" class="form-control" name="purchase_cost" value="{{ old('purchase_cost') }}">-->
                    <p style="color: white;">{{ $post->purchase_cost }}</p>
                </div>
            </div>
            <!-- 画像 -->
            <div class="form-group">
                @if(isset($post->image_path))
                <img src="/storage/image/post/{{ $post->image_path }}">
                @else
                <img width="100%" height="300px" style="margin-bottom: 5px;" src="/storage/image/noimage.png">
                @endif
            </div>
        </div>
    </div>
    
    
</div>
@endsection
