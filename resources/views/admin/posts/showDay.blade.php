@extends('layouts.common.common')
@section('css', 'post.css')

@section('title', '投稿一覧')

@section('content')
<div class="container">
    <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
        <li itemprop="itemListElement" itemscopeitemtype="https://schema.org/ListItem">
            <i class="fa fa-home text-dark" aria-hidden="true"></i>
            <a itemprop="item" href="{{ url('/mypage') }}">
                <span itemprop="name">ホーム</span>
            </a>
            <i class="fa fa-caret-right text-dark ml-2 mr-2" aria-hidden="true"></i>
            <meta itemprop="position" content="1" />
        </li>
        <li itemprop="itemListElement" itemscopeitemtype="https://schema.org/ListItem">
            <i class="fa fa-search text-dark" aria-hidden="true"></i>
            <a itemprop="item" href="{{ url('/mypage/spot_search') }}">
                <span itemprop="name">スポット検索</span>
            </a>
            <i class="fa fa-caret-right text-dark ml-2 mr-2" aria-hidden="true"></i>
            <meta itemprop="position" content="1" />
        </li>
        <li class=" text-dark current-nav" itemprop="itemListElement" itemscopeitemtype="https://schema.org/ListItem">
            <i class="fa fa-file" aria-hidden="true"></i>
            <span itemprop="name">{{ $date}} に投稿された記事</span>
            <meta itemprop="position" content="1" />
        </li>
    </ol>
    @foreach($posts as $post)
    <div class="row" style="width: 100%;">
        <div class="col-md-9 mx-auto" >
            <div class="post-info d-flex">
                <!-- タイトル -->
                <div class="col-md-12 d-flex no-gutters">
                    <!--他のユーザーページへ-->
                    <a class="other-link" href="#">
                       <img class="post-icon" src="{{ $login_user->profile_image }}">
                    </a>
                   <div class="post-top">
                       <div class="form-inline">
                           <a class="other-link" href="#">
                               <div class="post-name" style="margin-right: 10px;">{{ $post->user_name }}</div>
                            </a>
                           <div class="post-date">{{ $post->created_at }}</div>
                        </div>
                        <div class="post-title">
                            <h3>『{{ $post->title }}』</h3>
                        </div>
                   </div>
                   <div class="d-flex align-items-center">
                       <!--記事に対してのいいね-->
                       @if (!in_array(Auth::user()->id, array_column($post->favorites->toArray(), 'user_id'), TRUE))
                       <form method="POST" action="{{ url('favorites/') }}" class="mb-0">
                           @csrf
                           <input type="hidden" name="tweet_id" value="{{ $post->id }}">
                           <button type="submit" class="btn p-0 border-0 text-primary"><i class="far fa-heart fa-fw"></i></button>
                       </form>
                       @else
                       <form method="POST"action="{{ url('favorites/' .array_column($post->favorites->toArray(), 'id', 'user_id')[Auth::user()->id]) }}" class="mb-0">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn p-0 border-0 text-danger"><i class="fas fa-heart fa-fw text-light"></i></button>
                       </form>
                       @endif
                       <p class="mb-0 text-light">{{ count($post->favorites) }}</p>
                   </div>
                   <div class="col-md-4 text-right">
                       @if($login_user->id == $post->user_id)
                       <a class="btn btn-primary mr-1" href="{{ action('Admin\TweetsController@edit', ['id' => $post->id]) }}">編集</a>
                       <a class="btn btn-danger" href="{{ action('Admin\TweetsController@delete', ['id' => $post->id]) }}">削除</a>
                       @endif
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
                            <?php $total_cost = $post->addmission_fee + $post->purchase_cost ?>
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
                    <div class="col-md-6 comment-btn">
                    <!-- コメント表示モーダル -->
                        <button type="button" class="bike-detail-btn btn w-10 h-25" style="padding: 0;" data-toggle="modal" data-target="#exampleModal{{ $post->id }}">
                            <p class="text-right btn btn-primary">この投稿にコメント</p>
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" id="exampleModal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModal3Label">
                                        <div class="col-md-12 d-flex no-gutters text-secondary">
                                            <div>
                                                @if(isset($post->profile_image_path))
                                               <img class="post-icon" src="{{ $post->profile_image_path }}">
                                                @else
                                                <img class="post-icon" src="https://yutmtsm.s3.ap-northeast-1.amazonaws.com/z6L5P9QTOHolCDoQUx9s0bRY6LoeQfZgSho7StYu.png">
                                                @endif
                                                <div class="v_line_fix" style="margin:5px 0 5px 25px;width: 2px;height: 50px;background-color: brown;margin:"></div>
                                            </div>
                                           <div class="post-top">
                                                 <div class="form-inline">
                                                     <div class="post-name" style="margin-right: 10px;">{{ $post->user_name }}</div>
                                                   <div class="post-date">{{ $post->created_at }}</div>
                                                </div>
                                                <div class="post-title">
                                                    <h5>『{{ $post->title }}』</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 d-flex no-gutters text-secondary">
                                            <div>
                                                @if(isset($post->image_icon))
                                               <img class="post-icon" src="{{ $login_user->image_path }}">
                                                @else
                                                <img class="post-icon" src="https://yutmtsm.s3.ap-northeast-1.amazonaws.com/z6L5P9QTOHolCDoQUx9s0bRY6LoeQfZgSho7StYu.png">
                                                @endif
                                            </div>
                                            <form action="{{ action('Admin\CommentsController@store', ['tweet_id' => $post->id]) }}" method="post">
                                                <div class="form-group">
                                                    <textarea class="form-control" name="text" value="{{ old('text') }}" style="resize: none;width:450px;height:200px;" placeholder="思ったことや気になることなどを入力してください">{{ old('comment') }}</textarea>
                                                    {{ csrf_field() }}
                                                    <input type="submit" class="btn-primary add-btn" value="コメント">
                                                </div>
                                            </form>
                                        </div>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <div class="modal-body">
                                    
                                </div>
                                <div class="modal-footer">
                                    
                                </div>
                            </div>
                          </div>
                        </div>
                        
                    </div>
                    
                    <!-- Modalここまで -->
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
    @endforeach
</div>
@endsection
