<!-- 左コンテンツ -->
            <div class="col-md-4">
                <div class="section">
                    <div class="card">
                         @if(isset($other_user->image_path))
                        <img width="100%" height="300px" style="margin-bottom: 5px;" src="/storage/image/user/{{ $other_user->image_path }}">
                        @else
                        <img width="100%" height="300px" style="margin-bottom: 5px;" src="/storage/image/noimage.png">
                        @endif
                        <div class="content d-flex">
                            <a href="{{ action('MoneybikeController@other_followers', ['id' => $other_user->id]) }}" class="">フォロー数：{{ $following_Count }}</a>
                            <a href="{{ action('MoneybikeController@other_followers', ['id' => $other_user->id]) }}" class="">フォロワー数：{{ $followed_Count }}</a>
                        </div>
                        <div class="content">
                            <p class="personal-title text-bold text-large text-ornament">ニックネーム</p>
                            <div class="d-flex">
                                <p class="personal-text">{{ $other_user->name}}</p>
                                <div class="follow-btn">
                                    
                                    @if ($login_user->isFollowing($other_user->id))
                                    <form action="{{ route('unfollow', ['id' => $other_user->id]) }}" method="POST">
                                       {{ csrf_field() }}
                                       {{ method_field('DELETE') }}
                                       <button type="submit" class="btn btn-danger">{{ $other_user->name}}さんのフォロー解除</button>
                                    </form>
                                    @else
                                    <form action="{{ route('follow', ['id' => $other_user->id]) }}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-primary">{{ $other_user->name}}さんをフォローする</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                       <div class="content">
                            <p class="personal-title text-bold text-large text-ornament">性別</p>
                            <p class="personal-text">{{ $other_user->gender}}</p>
                        </div>
                        <div class="content">
                            <p class="personal-title text-bold text-large text-ornament">年齢</p>
                            <p class="personal-text">{{ $other_user->age}}</p>
                        </div>
                        <div class="content">
                            <p class="personal-title text-bold text-large text-ornament">マイバイク情報</p>
                            @foreach($other_mybikes as $other_mybike)
                                <div class="d-flex">
                                    <img class="bike-icon" src="/storage/image/bike/{{ $other_mybike->image_path }}">
                                    <p class="bike-text"><p>{{ $other_mybike->manufacturer }}</p></p>
                                    <p class="bike-text">『{{ $other_mybike->type }}』( {{ $other_mybike->engine_displacement }} )</p>

                                    <!-- Modalの詳細ボタン -->
                                    <button type="button" class="bike-detail-btn btn w-10 h-25" style="padding: 0;" data-toggle="modal" data-target="#exampleModal{{ $other_mybike->id }}">
                                        <p>詳しく見る...</p>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade bd-example-modal-lg" id="exampleModal{{ $other_mybike->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label" aria-hidden="true">
                                      <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModal3Label">
                                                <p class="bike-text"><p>{{ $other_mybike->manufacturer }}『{{ $other_mybike->type }}』( {{ $other_mybike->engine_displacement }} )の詳細情報</p>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                                <div class="d-flex">
                                                    <img class="bike-detail-icon w-50 h-auto" src="storage/image/bike/{{ $other_mybike->image_path }}">
                                                    <div class="bike-detail">
                                                        <table>
                                                            <div class="bike-detail-title">基本情報</div>
                                                            <tr>
                                                                <th>メーカー</th>
                                                                <td>{{ $other_mybike->manufacturer }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>車種</th>
                                                                <td>{{ $other_mybike->type }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>排気量</th>
                                                                <td>{{ $other_mybike->engine_displacement }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>年式</th>
                                                                <td>{{ $other_mybike->model_year }}</td>
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
                                                                <td>{{ $other_mybike->light_vehicle_tax }}円</td>
                                                            </tr>
                                                            <tr>
                                                                <th>重量税</th>
                                                                <td>{{ $other_mybike->weight_tax }}円</td>
                                                            </tr>
                                                            <tr>
                                                                <th>自賠責保険</th>
                                                                <td>{{ $other_mybike->liability_insurance }}円</td>
                                                            </tr>
                                                        </table>
                                                    </div>

                                                    <div class="bike-detail">
                                                        <table>
                                                            <div class="bike-detail-title">変動日</div>
                                                            <tr>
                                                                <th>任意保険</th>
                                                                <td>{{ $other_mybike->voluntary_insurance }}円</td>
                                                            </tr>
                                                            <tr>
                                                                <th>車検</th>
                                                                <td>{{ $other_mybike->vehicle_inspection }}円</td>
                                                            </tr>
                                                            <tr>
                                                                <th>駐車場代</th>
                                                                <td>{{ $other_mybike->parking_fee }}円</td>
                                                            </tr>
                                                            <tr>
                                                                <th>消耗品費</th>
                                                                <td>{{ $other_mybike->consumables }}円</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                          </div>
                                          <div class="modal-footer">

                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- Modalここまで -->
                                </div>
                            @endforeach

                        </div>
                        <div class="content">
                            <div class="d-flex">
                                <a href="#" class="add-bike" href="#"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>