
    <div class="section">
        <div class="card">
            @if(isset($other_user->profile_image))
            <img src="{{ $other_user->profile_image }}" class="" width="100%" height="auto">
            @else
            <img src="/storage/image/noimage.png" class="" width="100%" height="auto">
            @endif
            <div class="content d-flex">
                <a href="{{ action('Admin\UsersController@myfollowers') }}" class="">フォロー数：{{ $follow_count }}</a>
                <a href="{{ action('Admin\UsersController@myfollowers') }}" class="">フォロワー数：{{ $follower_count }}</a>
            </div>
            <!--プロフィール編集ボタン/フォロー・フォロー解除ボタン-->
            <div class="d-flex">
                <div class="content">
                    <p class="personal-title text-bold text-large text-ornament">ニックネーム</p>
                    <p class="personal-text">{{ $other_user->name}}　「ID: {{ $other_user->screen_name }}」</p>
                </div>
                <div class="mb-1">
                    @if ($other_user->id === Auth::user()->id)
                        <a href="{{ url('mypage/users/' .$other_user->id .'/edit') }}" class="btn btn-primary">プロフィール編集</a>
                    @else
                        @if ($is_following)
                            <form action="{{ route('unfollow', ['id' => $other_user->id]) }}" method="POST" class="mb-2">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
    
                                <button type="submit" class="btn btn-danger">フォロー解除</button>
                            </form>
                        @else
                            <form action="{{ route('follow', ['id' => $other_user->id]) }}" method="POST" class="mb-2">
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
                <p class="personal-text">{{ $other_user->gender}} 
                @if($other_user->gender === "男性")<i class="fa fa-mars text-primary" aria-hidden="true"></i>
                @elseif($other_user->gender === "女性")<i class="fa fa-venus text-danger" aria-hidden="true"></i>
                @else <i class="fa fa-transgender text-success" aria-hidden="true"></i>
                @endif
                </p>
            </div>
            <div class="content">
                <p class="personal-title text-bold text-large text-ornament">年齢</p>
                <p class="personal-text">{{ $other_user->age}}</p>
            </div>
            <div class="content">
                <p class="personal-title text-bold text-large text-ornament">マイバイク情報</p>
                @foreach($mybikes as $mybike)
                    <div class="d-flex">
                        <img class="bike-icon" src="storage/image/bike/{{ $mybike->image_path }}">
                        <p class="bike-text"><p>{{ $mybike->manufacturer }}</p></p>
                        <p class="bike-text">『{{ $mybike->type }}』( {{ $mybike->engine_displacement }} )</p>
                        
                        <!-- Modalの詳細ボタン -->
                        <button type="button" class="bike-detail-btn btn w-10 h-25" style="padding: 0;" data-toggle="modal" data-target="#exampleModal3">
                            <p>詳細</p>
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModal3Label">
                                    <p class="bike-text"><p>{{ $mybike->manufacturer }}『{{ $mybike->type }}』( {{ $mybike->engine_displacement }} )の詳細情報</p>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                    <div class="d-flex">
                                        <img class="bike-detail-icon w-50 h-auto" src="{{ $mybike->image_path }}" >
                                        <div class="bike-detail">
                                            <table>
                                                <div class="bike-detail-title">基本情報</div>
                                                <tr>
                                                    <th>メーカー</th>
                                                    <td>{{ $mybike->manufacturer }}</td>
                                                </tr>
                                                <tr>
                                                    <th>車種</th>
                                                    <td>{{ $mybike->type }}</td>
                                                </tr>
                                                <tr>
                                                    <th>排気量</th>
                                                    <td>{{ $mybike->engine_displacement }}</td>
                                                </tr>
                                                <tr>
                                                    <th>年式</th>
                                                    <td>{{ $mybike->model_year }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex">
                                        <div class="bike-detail">
                                            <table>
                                                <div class="bike-detail-title">固定費</div>
                                                <tr>
                                                    <th>軽自動車税</th>
                                                    <td>{{ $mybike->light_vehicle_tax }}円</td>
                                                </tr>
                                                <tr>
                                                    <th>重量税</th>
                                                    <td>{{ $mybike->weight_tax }}円</td>
                                                </tr>
                                                <tr>
                                                    <th>自賠責保険</th>
                                                    <td>{{ $mybike->liability_insurance }}円</td>
                                                </tr>
                                            </table>
                                        </div>
                                        
                                        <div class="bike-detail">
                                            <table>
                                                <div class="bike-detail-title">変動日</div>
                                                <tr>
                                                    <th>任意保険</th>
                                                    <td>{{ $mybike->voluntary_insurance }}円</td>
                                                </tr>
                                                <tr>
                                                    <th>車検</th>
                                                    <td>{{ $mybike->vehicle_inspection }}円</td>
                                                </tr>
                                                <tr>
                                                    <th>駐車場代</th>
                                                    <td>{{ $mybike->parking_fee }}円</td>
                                                </tr>
                                                <tr>
                                                    <th>消耗品費</th>
                                                    <td>{{ $mybike->consumables }}円</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                              </div>
                              <div class="modal-footer">
                                <a href="{{ action('Admin\BikeController@edit', ['id' => $mybike->id]) }}" class="btn btn-primary">編集</a>
                                <a href="{{ action('Admin\BikeController@delete', ['id' => $mybike->id]) }}" class="btn btn-danger">削除</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Modalここまで -->
                    </div>
                            @endforeach
            </div>
            <div class="content">
                
            </div>
            
        </div>
    </div>
