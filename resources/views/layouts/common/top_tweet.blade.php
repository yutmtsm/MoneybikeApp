    <div class="row justify-content-center bg-light">
        <div class="col-md-12 mb-3 text-right bg-light">
            <a href="{{ action('Admin\TweetsController@create') }}" class="btn btn-md btn-primary mt-2">新規投稿</a>
        </div>
        @if (isset($timelines))
            @foreach ($timelines as $timeline)
                <div class="col-md-12 mb-3 text-secondary">
                    <div class="card">
                        <a href="{{ action('Other\MoneybikeController@mypage', ['id' => $timeline->user_id]) }}">
                            <div class="card-haeder p-2 w-100 d-flex">
                                @if(isset($timeline->user->profile_image))
                                <img src="{{ $timeline->user->profile_image }}" class="rounded-circle" width="50" height="50">
                                @else
                                <img src="/storage/noimage.png" class="rounded-circle" width="50" height="50">
                                @endif
                                <div class="ml-2 d-flex flex-column">
                                    <p class="mb-0">{{ $timeline->user->name }}</p>
                                    <a href="{{ url('users/' .$timeline->user->id) }}" class="text-secondary">{{ $timeline->user->screen_name }}</a>
                                </div>
                                
                            </div>
                        </a>
                        <a href="{{ action('Admin\TweetsController@show', ['id' => $timeline->id]) }}">
                            <div class="card-title">
                                <div class="m-10">
                                    <p class="mb-0 text-secondary text-right">{{ $timeline->created_at->format('Y-m-d') }}</p>
                                    <h5>『{{ $timeline->title }}』</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                {!! nl2br(e($timeline->text)) !!}
                            </div>
                        </a>
                        <!--コメント・編集・削除関連-->
                        <div class="card-footer py-1 d-flex justify-content-end bg-white">
                            @if ($timeline->user->id === Auth::user()->id)
                                <div class="dropdown mr-3 d-flex align-items-center">
                                    <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-fw"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a href="{{ url('tweets/' .$timeline->id .'/edit') }}" class="dropdown-item">編集</a>
                                            <a href="{{ action('Admin\TweetsController@delete', ['id' => $timeline->id]) }}" class="dropdown-item">削除</a>
                                    </div>
                                </div>
                            @endif
                            <div class="mr-3 d-flex align-items-center">
                                @include('layouts.common.comments_modal')
                                <p class="mb-0 text-secondary">{{ count($timeline->comments) }}</p>
                            </div>
                            
                            <!-- ここから -->
                            <div class="d-flex align-items-center">
                                @if (!in_array($user->id, array_column($timeline->favorites->toArray(), 'user_id'), TRUE))
                                    <form method="POST" action="{{ url('favorites/') }}" class="mb-0">
                                        @csrf

                                        <input type="hidden" name="tweet_id" value="{{ $timeline->id }}">
                                        <button type="submit" class="btn p-0 border-0 text-primary"><i class="far fa-heart fa-fw"></i></button>
                                    </form>
                                @else
                                    <form method="POST" action="{{ url('favorites/' .array_column($timeline->favorites->toArray(), 'id', 'user_id')[$user->id]) }}" class="mb-0">
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
   
            @endforeach
            <div class="my-4 d-flex justify-content-center">
                {{ $timelines->links() }}
            </div>
        @endif
    </div>