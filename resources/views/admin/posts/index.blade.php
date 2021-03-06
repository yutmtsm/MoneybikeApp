@extends('layouts.common.common')
@section('css', 'post.css')

@section('title', 'My Posts')

@section('content')
<div class="container text-secondary">
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
            <i class="fa fa-file" aria-hidden="true"></i>
            <span itemprop="name">自分の投稿一覧</span>
            <meta itemprop="position" content="1" />
        </li>
    </ol>
    
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
                                    <a href="{{ action('Admin\TweetsController@create') }}" class="btn btn-md btn-primary mt-2">新規投稿</a>
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
        @if (isset($timelines))
            @foreach ($timelines as $timeline)
            <a href="{{ action('Admin\TweetsController@show', ['id' => $timeline->id]) }}">
                <div class="col-md-8 mb-3">
                    <div class="card">
                        <div class="card-haeder p-2 w-100 d-flex">
                            <img src="{{ $user->profile_image }}" class="rounded-circle" width="50" height="50">
                            <div class="ml-2 d-flex flex-column">
                                <p class="mb-0">{{ $timeline->user->name }} 
                                @if($timeline->user->gender === "男性")<i class="fa fa-mars text-primary" aria-hidden="true"></i>
                                @elseif($timeline->user->gender === "女性")<i class="fa fa-venus text-danger" aria-hidden="true"></i>
                                @else <i class="fa fa-transgender text-success" aria-hidden="true"></i>
                                @endif
                                </p>
                                <a href="#" class="text-secondary">{{ $timeline->user->screen_name }}</a>
                            </div>
                            <div class="m-10">
                                <p class="mb-0 text-secondary text-right"><i class="fa fa-calculator text-danger"></i> {{ $timeline->created_at->format('Y-m-d') }}</p>
                                <h3>『{{ $timeline->title }}』</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            {{ $timeline->text }}
                        </div>
                        <div class="card-footer py-1 d-flex justify-content-end bg-white">
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

                            <!-- ここから -->
                            <div class="mr-3 d-flex align-items-center">
                                @include('layouts.common.comments_modal')
                                <p class="mb-0 text-secondary">{{ count($timeline->comments) }}</p>
                            </div>
                            <div class="d-flex align-items-center">
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
                            <!-- ここまで -->

                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        @endif
    </div>
    <div class="my-4 d-flex justify-content-center">
        {{ $timelines->links() }}
    </div>
</div>
@endsection