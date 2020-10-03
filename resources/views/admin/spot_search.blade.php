@extends('layouts.common.common')
@section('css', 'mypage.css')

@section('title', 'スポット検索')

@section('content')
<div class="container">
    <h1>スポット検索</h1>
    <!-- スポット検索 -->
    <div class="row">
        <!-- スポット検索 -->
        <div class="col-md-8">
            <div class="item">
                <div class="content">
                    <div class="row">
                        <div class="col-md-8">
                            <form action="{{ action('Admin\MoneybikeController@search') }}" method="get">
                                <div class="form-group row">
                                    <div class="col-md-11">
                                        <input type="text" class="form-control ml-3" placeholder="スポットを入力" name="cond_title" value={{ $cond_title }}>
                                    </div>
                                    <div class="col-md-1">
                                        {{ csrf_field() }}
                                        <input type="submit" class="btn btn-primary" value="検索">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <div class="text-right">
                                <a class="new-post btn btn-primary" href="{{ action('Admin\TweetsController@create') }}">新規投稿</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    @foreach ($timelines as $timeline)
             
                        <div class="col-md-12 mb-3">
                            <div class="card">
                                <a href="{{ action('Other\MoneybikeController@mypage', ['id' => $timeline->user_id]) }}">
                                    <div class="card-haeder p-2 w-100 d-flex">
                                        <img src="{{ $timeline->user->profile_image }}" class="rounded-circle" width="50" height="50">
                                        <div class="ml-2 d-flex flex-column">
                                            <p class="mb-0">{{ $timeline->user->name }}</p>
                                            <p class="text-secondary">{{ $timeline->user->screen_name }}</p>
                                        </div>
                                    </div>
                                </a>
                                <div class="card-body">
                                    <div class="card-title">
                                        <p class="mb-0 text-secondary text-right">{{ $timeline->created_at->format('Y-m-d H:i') }}</p>
                                        <h3>『{{ $timeline->title }}』</h3>
                                    </div>
                                    <div class="d-flex">
                                        <div class="spot-image">
                                            @if(isset($timeline->image_path))
                                                <img src="{{ $timeline->image_path }}">
                                            @else
                                                <img src="https://yutmtsm.s3.ap-northeast-1.amazonaws.com/z6L5P9QTOHolCDoQUx9s0bRY6LoeQfZgSho7StYu.png">
                                            @endif
                                        </div>
                                        <div class="post-text">
                                            <div class="spot-comment mt-3">
                                                <p>{{ str_limit($timeline->text, 1500) }}</p>
                                            </div>
                                            <div class="detail-btn">
                                                <a href="{{ action('Admin\TweetsController@show', ['id' => $timeline->id]) }}">
                                                    <button type="button" class="btn btn-primary btn-xs active" data_but="btn-xs"><i class='fa fa-search'></i> 詳しく見る</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card-footer py-1 d-flex justify-content-end bg-white">
                                    <!--ログイン中のユーザーなら編集可能-->
                                    @if ($timeline->user->id === Auth::user()->id)
                                        <div class="dropdown mr-3 d-flex align-items-center">
                                            <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v fa-fw"></i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a href="{{ action('Admin\TweetsController@edit', ['id' => $timeline->id]) }}" class="dropdown-item">編集</a>
                                                <a href="{{ action('Admin\TweetsController@delete', ['id' => $timeline->id]) }}" class="dropdown-item">削除</a>
                                            </div>
                                        </div>
                                    @endif
                                        <!--コメント数の表示-->
                                        <div class="mr-3 d-flex align-items-center">
                                            @include('layouts.common.comments_modal')
                                            <p class="mb-0 text-secondary">{{ count($timeline->comments) }}</p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <!--記事に対してのいいね-->
                                            @if (!in_array(Auth::user()->id, array_column($timeline->favorites->toArray(), 'user_id'), TRUE))
                                            <form method="POST" action="{{ url('favorites/') }}" class="mb-0">
                                                @csrf
                                                <input type="hidden" name="tweet_id" value="{{ $timeline->id }}">
                                                <button type="submit" class="btn p-0 border-0 text-primary"><i class="far fa-heart fa-fw"></i></button>
                                            </form>
                                            @else
                                            <form method="POST"action="{{ url('favorites/' .array_column($timeline->favorites->toArray(), 'id', 'user_id')[Auth::user()->id]) }}" class="mb-0">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn p-0 border-0 text-danger"><i class="fas fa-heart fa-fw"></i></button>
                                            </form>
                                            @endif
                                            <p class="mb-0 text-secondary">{{ count($timeline->favorites) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        @endforeach
                        {{ $timelines->links() }}
                        </div>
                </div>
            </div>
        </div>
        <!-- スポット検索ここまで -->
        
        <!-- おすすめユーザー -->
        <div class="col-md-4">
            <div class="item">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">ユーザー一覧</div>
                    </div>
                    
                    @foreach ($all_users as $user)
                    <div class="card">
                        <div class="card-haeder p-3 w-100">
                            <a class="d-flex" href="{{ action('Other\MoneybikeController@mypage', ['id' => $user->id]) }}">
                                <img src="{{ $user->profile_image }}" class="rounded-circle" width="50" height="50">
                                <div class="ml-2 d-flex flex-column">
                                    <p class="mb-0">{{ $user->name }}</p>
                                    <p class="text-secondary">{{ $user->screen_name }}</p>
                                </div>
                            </a>
                            @if (auth()->user()->isFollowed($user->id))
                                <div class="px-2">
                                    <span class="px-1 bg-secondary text-light">フォローされています</span>
                                </div>
                            @endif
                            <div class="d-flex justify-content-end flex-grow-1">
                                @if (auth()->user()->isFollowing($user->id))
                                    <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger">フォロー解除</button>
                                    </form>
                                @else
                                    <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
                                        {{ csrf_field() }}

                                        <button type="submit" class="btn btn-primary">フォローする</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{ $all_users->links() }}
                </div>
            </div>
        </div>
        <!-- おすすめユーザーここまで -->
        </div>
    </div>
</div>
@endsection
