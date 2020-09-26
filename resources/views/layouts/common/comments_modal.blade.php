<!-- コメント表示モーダル -->
<button type="button" class="bike-detail-btn btn w-10 h-25" style="padding: 0;" data-toggle="modal" data-target="#exampleModal{{ $timeline->id }}">
    <p class="m-0 p-0 pb-1" style="display:block;"><i class="far fa-comment fa-fw"></i></p>
</button>
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal{{ $timeline->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal3Label">
                    <div class="col-md-12 d-flex no-gutters text-secondary">
                        <div>
                            @if(isset($user->profile_image))
                            <img class="post-icon" src="{{ asset('storage/profile_image/' .$user->profile_image) }}">
                            @else
                            <img class="post-icon" src="/storage/noimage.png">
                            @endif
                            <div class="v_line_fix" style="margin:5px 0 5px 25px;width: 2px;height: 50px;background-color: brown;margin:"></div>
                        </div>
                        <div class="post-top">
                            <div class="form-inline">
                                <div class="post-name" style="margin-right: 10px;">{{ $timeline->user_name }}</div>
                                <div class="post-date">{{ $timeline->created_at }}</div>
                            </div>
                            <div class="post-title">
                                <h5>『{{ $timeline->title }}』</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 d-flex no-gutters text-secondary">
                        <div>
                            <img class="post-icon" src="{{ asset('storage/image/post/' .$timeline->image_path) }}">
                        </div>
                        <form action="{{ action('Admin\CommentsController@store', ['tweet_id' => $timeline->id]) }}" method="post">
                            <div class="form-group">
                                <textarea class="form-control" name="text" value="{{ old('text') }}" style="resize: none;width:450px;height:200px;" placeholder="思ったことや気になることなどを入力してください">{{ old('comment') }}</textarea>
                                {{ csrf_field() }}
                                <input type="submit" class="btn-primary add-btn" value="コメント">
                            </div>
                        </form>
                    </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
      </div>
</div>
<!-- Modalここまで -->