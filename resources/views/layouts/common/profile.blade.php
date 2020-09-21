<div class="col-md-4">
    <div class="section">
        <div class="card">
            <img src="{{ asset('storage/profile_image/' .$user->profile_image) }}" class="" width="100%" height="auto">
            <div class="content d-flex">
                <a href="#" class="">フォロー数：{{ $follow_count }}</a>
                <a href="#" class="">フォロワー数：{{ $follower_count }}</a>
            </div>
            <div class="content">
                <p class="personal-title text-bold text-large text-ornament">ニックネーム</p>
                <p class="personal-text">{{ $user->name}}　「ID: {{ $user->screen_name }}」</p>
            </div>
           <div class="content">
                <p class="personal-title text-bold text-large text-ornament">性別</p>
                <p class="personal-text">{{ $user->gender}}　「ID: {{ $user->screen_name }}」</p>
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
</div>