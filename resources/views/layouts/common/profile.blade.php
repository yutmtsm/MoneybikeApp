
    <div class="section">
        <div class="card">
            <img src="{{ asset('storage/profile_image/' .$user->profile_image) }}" class="" width="100%" height="auto">
            <div class="content d-flex">
                <a href="#" class="">フォロー数：{{ $follow_count }}</a>
                <a href="#" class="">フォロワー数：{{ $follower_count }}</a>
            </div>
            <!--プロフィール編集ボタン/フォロー・フォロー解除ボタン-->
            <div class="d-flex">
                <div class="content">
                    <p class="personal-title text-bold text-large text-ornament">ニックネーム</p>
                    <p class="personal-text">{{ $user->name}}　「ID: {{ $user->screen_name }}」</p>
                </div>
                <div class="mb-1">
                    @if ($user->id === Auth::user()->id)
                        <a href="{{ url('users/' .$user->id .'/edit') }}" class="btn btn-primary">プロフィール編集</a>
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
           <div class="content">
                <p class="personal-title text-bold text-large text-ornament">性別</p>
                <p class="personal-text">{{ $user->gender}}</p>
            </div>
            <div class="content">
                <p class="personal-title text-bold text-large text-ornament">年齢</p>
                <p class="personal-text">{{ $user->age}}</p>
            </div>
            <div class="content">
                <p class="personal-title text-bold text-large text-ornament">マイバイク情報</p>
                
            </div>
            
        </div>
    </div>
