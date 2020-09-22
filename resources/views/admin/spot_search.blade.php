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
                <div class="card">
                    <div class="content">
                        <div class="row">
                            
                            <div class="col-md-10">
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
                        </div>
                        
                        <div class="card-header">
                            <div class="card-title">スポットツイート</div>
                            <div class="d-flex">
                                <a class="new-post btn btn-primary" href="{{ action('Admin\TweetsController@create') }}">新規投稿</a>
                                
                            </div>
                        </div>
                        @foreach($posts as $post)
                        
                            <div class="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                         <div class="title">
                                             <h2>{{ str_limit($post->title, 100) }}</h2>
                                        </div>
                                        <div class="post-info d-flex">
                                            <div class="col-md-8 d-flex no-gutters">
                                                <div class="d-flex">
                                                    <img src="{{ asset('storage/profile_image/' .$post->image_icon) }}" class="rounded-circle" width="50" height="50">
                                                    <div class="ml-2 d-flex flex-column">
                                                        <p class="mb-0">{{ $post->user_name }}</p>
                                                        <a href="{{ url('users/' .$user->id) }}" class="text-secondary">{{ $post->screen_name }}</a>
                                                    </div>
                                                </div>
                                                <div class="post-spot">　エリア：{{ $post->spot }}</div>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="spot-image">
                                                @if(isset($post->image_path))
                                                    <img src="/storage/image/post/{{ $post->image_path }}">
                                                @else
                                                    <img src="/storage/image/noimage.png">
                                                @endif
                                            </div>
                                            <div class="post-text">
                                                <div class="spot-text mt-3">
                                                    <p>{{ str_limit($post->text, 1500) }}</p>
                                                </div>
                                                <div class="detail-btn">
                                                    <a href="{{ action('Admin\TweetsController@show', ['id' => $post->id]) }}">
                                                        <button type="button" class="btn btn-primary btn-xs active" data_but="btn-xs"><i class='fa fa-search'></i> 詳しく見る</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="date text-right">
                                            {{ $post->created_at }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        @endforeach
                        {{ $posts->links() }}
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
                        <div class="card-haeder p-3 w-100 d-flex">
                            <img src="{{ asset('storage/profile_image/' .$user->profile_image) }}" class="rounded-circle" width="50" height="50">
                            <div class="ml-2 d-flex flex-column">
                                <p class="mb-0">{{ $user->name }}</p>
                                <a href="{{ url('users/' .$user->id) }}" class="text-secondary">{{ $user->screen_name }}</a>
                            </div>
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
@endsection
