@extends('layouts.common.common')
@section('css', 'mypage.css')

@section('title', 'マイページ')

@section('content')
    <div class="container">
        <h1>マイページ</h1>
        <div class="row">
            <!-- 左コンテンツ -->
            @include('layouts.common.profile') 
            <!-- 真ん中コンテンツ -->
            <div class="col-md-4">
                <!--プロフィール編集ボタン/フォロー・フォロー解除ボタン-->
                <div>
                    @if ($user->id === Auth::user()->id)
                        <a href="{{ url('users/' .$user->id .'/edit') }}" class="btn btn-primary">プロフィールを編集する</a>
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
                <div class="col-md-6">
                    <div class="item" style="margin-bottom: 20px;">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">支出一覧</div>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">年間支出</th>
                                            <th scope="col">当月支出</th>
                                            <th scope="col">当日支出</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>120,000円</td>
                                            <td>5,400円</td>
                                            <td>300円</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>前月比：+10%</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- カレンダー -->
                    @include('layouts.common.calendar')
                </div>
            </div>
        </div>
    </div>
@endsection