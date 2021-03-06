@extends('layouts.common.common')
@section('css', 'post.css')

@section('title', 'Following')

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
        <li class=" text-dark current-nav" itemprop="itemListElement" itemscopeitemtype="https://schema.org/ListItem">
            <i class="fa fa-address-card" aria-hidden="true"></i>
            <span itemprop="name">Following</span>
            <meta itemprop="position" content="1" />
        </li>
    </ol>

    <div class="container text-secondary">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-3">
                <div class="card">
                    <div class="d-inline-flex">
                        <div class="p-3 d-flex flex-column">
                            <img src="{{ $user->profile_image }}" class="rounded-circle" width="100" height="100">
                            <div class="mt-3 d-flex flex-column">
                                <h4 class="mb-0 font-weight-bold">{{ $user->name }} 
                                @if($user->gender === "男性")<i class="fa fa-mars text-primary" aria-hidden="true"></i>
                                @elseif($user->gender === "女性")<i class="fa fa-venus text-danger" aria-hidden="true"></i>
                                @else <i class="fa fa-transgender text-success" aria-hidden="true"></i>
                                @endif
                                </h4>
                                <span class="text-secondary">{{ $user->screen_name }}</span>
                            </div>
                        </div>
                        <div class="p-3 d-flex flex-column justify-content-between">
                            <div class="d-flex">
                                <div>
                                    @if ($user->id === Auth::user()->id)
                                        <a href="{{ action('Admin\UsersController@edit', ['id' => $user->id]) }}" class="btn btn-primary">プロフィール編集</a>
                                    @else
                                        @if ($is_following)
                                            <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST" class="mb-2">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
    
                                                <button type="submit" class="btn btn-danger">フォロー解除</button>
                                            </form>
                                        @else
                                            <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST" class="mb-2">
                                                {{ csrf_field() }}
    
                                                <button type="submit" class="btn btn-primary">フォローする</button>
                                            </form>
                                        @endif
    
                                        @if ($is_followed)
                                            <span class="mt-2 px-1 bg-secondary text-light">フォローされています</span>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <div class="p-2 d-flex flex-column align-items-center">
                                    <p class="font-weight-bold">ツイート数</p>
                                    <span>{{ $tweet_count }}</span>
                                </div>
                                <div class="p-2 d-flex flex-column align-items-center">
                                    <p class="font-weight-bold">フォロー数</p>
                                    <span>{{ $follow_count }}</span>
                                </div>
                                <div class="p-2 d-flex flex-column align-items-center">
                                    <p class="font-weight-bold">フォロワー数</p>
                                    <span>{{ $follower_count }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--フォロワーの表示-->
            <div class="tab_wrap col-md-8 mb-3% mt-0">
                <ul class="nav nav-tabs">
                    <li class="nav-items follow-bar">
                        <a href="#following" class="nav-link aabb active" data-toggle="tab">フォロー</a>
                    </li>
                    <li class="nav-items follow-bar">
                        <a href="#followed" class="nav-link aabb" data-toggle="tab">フォロワー</a>
                    </li>
                </ul>
            	
            	<div class="tab-content">
            	    <!--フォローユーザーの表示-->
            		<div id="following" class="tab-pane active">
            		    @if (isset($following_Users))
                        @foreach ($following_Users as $following_User)
            			<div class="col-md-12 mb-3">
                            <div class="card">
                                <div class="card-haeder p-3 w-100 d-flex">
                                    <a href="{{ action('Other\MoneybikeController@mypage', ['id' => $following_User->id]) }}">
                                        @if(isset($following_User->profile_image))
                                        <img src="{{ $following_User->profile_image }}" class="rounded-circle" width="50" height="50">
                                        @else
                                        <img src="https://yutmtsm.s3.ap-northeast-1.amazonaws.com/z6L5P9QTOHolCDoQUx9s0bRY6LoeQfZgSho7StYu.png" class="rounded-circle" width="50" height="50">
                                        @endif
                                        <div class="ml-2 d-flex flex-column">
                                            <p class="mb-0">{{ $following_User->name }} 
                                            @if($following_User->gender === "男性")<i class="fa fa-mars text-primary" aria-hidden="true"></i>
                                            @elseif($following_User->gender === "女性")<i class="fa fa-venus text-danger" aria-hidden="true"></i>
                                            @else <i class="fa fa-transgender text-success" aria-hidden="true"></i>
                                            @endif
                                            </p>
                                            <a href="{{ url('users/' .$user->id) }}" class="text-secondary">{{ $following_User->screen_name }}</a>
                                        </div>
                                    </a>
                                    @if (auth()->user()->isFollowed($following_User->id))
                                        <div class="px-2">
                                            <span class="px-1 bg-secondary text-light">フォローされています</span>
                                        </div>
                                    @endif
                                    <div class="d-flex justify-content-end flex-grow-1">
                                        @if (auth()->user()->isFollowing($following_User->id))
                                            <form action="{{ route('unfollow', ['id' => $following_User->id]) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger">フォロー解除</button>
                                            </form>
                                        @else
                                            <form action="{{ route('follow', ['id' => $following_User->id]) }}" method="POST">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-primary">フォローする</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
            		</div>
            		<!--フォロワーユーザーの表示-->
            		<div id="followed" class="tab-pane">
            		    @if (isset($followed_Users))
                        @foreach ($followed_Users as $followed_User)
            			<div class="col-md-12 mb-3">
                            <div class="card">
                                <div class="card-haeder p-3 w-100 d-flex">
                                    <a href="{{ action('Other\MoneybikeController@mypage', ['id' => $followed_User->id]) }}">
                                        <img src="{{ $followed_User->profile_image }}" class="rounded-circle" width="50" height="50">
                                        <div class="ml-2 d-flex flex-column">
                                            <p class="mb-0">{{ $followed_User->name }} 
                                            @if($following_User->gender === "男性")<i class="fa fa-mars text-primary" aria-hidden="true"></i>
                                            @elseif($following_User->gender === "女性")<i class="fa fa-venus text-danger" aria-hidden="true"></i>
                                            @else <i class="fa fa-transgender text-success" aria-hidden="true"></i>
                                            @endif
                                            </p>
                                            <a href="{{ url('other_users/' .$followed_User->id) }}" class="text-secondary">{{ $followed_User->screen_name }}</a>
                                        </div>
                                    </a>
                                    @if (auth()->user()->isFollowed($followed_User->id))
                                    <div class="px-2">
                                        <span class="px-1 bg-secondary text-light">フォローされています</span>
                                    </div>
                                    @endif
                                    <div class="d-md-flex justify-content-end flex-grow-1">
                                        @if (auth()->user()->isFollowing($followed_User->id))
                                            <form action="{{ route('unfollow', ['id' => $followed_User->id]) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger">フォロー解除</button>
                                            </form>
                                        @else
                                            <form action="{{ route('follow', ['id' => $followed_User->id]) }}" method="POST">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-primary">フォローする</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
            		</div>
            	</div>
            </div>
        </div>
    </div>
</div>
@endsection