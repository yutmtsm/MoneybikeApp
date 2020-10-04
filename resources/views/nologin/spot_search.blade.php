@extends('layouts.common.common')
@section('css', 'mypage.css')

@section('title', 'スポット検索')

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
        <li class=" text-dark current-nav" itemprop="itemListElement" itemscopeitemtype="https://schema.org/ListItem">
            <i class="fa fa-search" aria-hidden="true"></i>
            <span itemprop="name">投稿記事</span>
            <meta itemprop="position" content="1" />
        </li>
    </ol>

    <!-- スポット検索 -->
    <div class="row">
        <!-- スポット検索 -->
        <div class="col-md-12">
            <div class="item">
                <div class="content">
                    <div class="row">
                    @foreach ($timelines as $timeline)
                        <div class="col-md-12 ">
                            <div class="card p-3">
                                <div class="card-haeder p-2 w-100 d-flex">
                                    <img src="{{ $timeline->user->profile_image }}" class="rounded-circle" width="50" height="50">
                                    <div class=" d-flex flex-column">
                                        <p class="mb-0">{{ $timeline->user->name }} 
                                        @if($timeline->user->gender === "男性")<i class="fa fa-mars text-primary" aria-hidden="true"></i>
                                        @elseif($timeline->user->gender === "女性")<i class="fa fa-venus text-danger" aria-hidden="true"></i>
                                        @else <i class="fa fa-transgender text-success" aria-hidden="true"></i>
                                        @endif
                                        </p>
                                        <p class="text-secondary">{{ $timeline->user->screen_name }}</p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="card-title">
                                            <p class="mb-0"><i class="fa fa-motorcycle "></i> スポット : {{ $timeline->pref }} 「 {{ $timeline->spot }}」</p>
                                            <p class="mb-0 text-secondary text-right"><i class="fa fa-calculator text-danger"></i> {{ $timeline->created_at->format('Y-m-d') }}</p>
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
                                                <a href="{{ action('MoneybikeController@show', ['id' => $timeline->id]) }}">
                                                    <button type="button" class="btn btn-primary btn-xs active" data_but="btn-xs"><i class='fa fa-search'></i> 詳しく見る</button>
                                                </a>
                                            </div>
                                        </div>
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
        
        
        </div>
    </div>
</div>
@endsection
