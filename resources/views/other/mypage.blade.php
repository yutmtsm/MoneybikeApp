@extends('layouts.common.common')
@section('css', 'mypage.css')

@section('title', 'マイページ')

@section('content')
    <div class="container">
        <h1>{{ $other_user->name }}さんのマイページ</h1>
        <div class="row  no-gutters">
            <!-- 左コンテンツ -->
            <div class="col-md-4" style="padding: 0 7px;">
            @include('layouts.common.other_profile') 
            </div>
            <!-- 真ん中コンテンツ -->
            <div class="col-md-4"  style="padding: 0 7px;">
                <div class="col-md-12">
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
                    @include('layouts.common.other_calendar')
                </div>
            </div>
            
            <div class="col-md-4" style="padding: 0 7px;">
                <div class="container">
                    @include('layouts.common.other_top_tweet')
                </div>
            </div>
        </div>
    </div>
@endsection