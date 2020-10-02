    <div class="row justify-content-center bg-light">
        <div class="col-md-12 mb-3 text-right bg-light">
            @auth
            <button class="btn btn-md btn-primary mt-2">{{ $other->name }}さんの関連投稿一覧</button>
            @endauth
        </div>
        @if (isset($timelines))
            @foreach ($timelines as $timeline)
                <div class="col-md-12 mb-3 text-secondary">
                    <div class="card">
                        <a href="{{ action('Other\MoneybikeController@mypage', ['id' => $timeline->user->id]) }}">
                            <div class="card-haeder p-2 w-100 d-flex">
                                @if(isset($other_user->profile_image))
                                <img src="{{ $other_user->profile_image }}" class="rounded-circle" width="50" height="50">
                                @else
                                <img src="/storage/noimage.png" class="rounded-circle" width="50" height="50">
                                @endif
                                <div class="ml-2 d-flex flex-column">
                                    <p class="mb-0">{{ $timeline->user->name }}</p>
                                    <a href="{{ url('users/' .$timeline->user->id) }}" class="text-secondary">{{ $timeline->user->screen_name }}</a>
                                </div>
                        </a>
                                <div class="m-10">
                                    <p class="mb-0 text-secondary text-right">{{ $timeline->created_at->format('Y-m-d H:i') }}</p>
                                    <h5>『{{ $timeline->title }}』</h5>
                                </div>
                            </div>
                        <a href="{{ action('Admin\TweetsController@show', ['id' => $timeline->id]) }}">
                            <div class="card-title">
                                <h2>{{ $timeline->title }}</h2>
                            </div>
                            <div class="card-body">
                                {!! nl2br(e($timeline->text)) !!}
                            </div>
                        </a>
                        
                    </div>
                </div>
            </a>
            @endforeach
            <div class="my-4 d-flex justify-content-center">
                {{ $timelines->links() }}
            </div>
        @endif
    </div>