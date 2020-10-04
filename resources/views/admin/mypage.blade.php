@extends('layouts.common.common')
@section('css', 'mypage.css')

@section('title', 'マイページ')

@section('content')
    <div class="container">
        <h1>マイページ</h1>
        <div class="row  no-gutters">
            <!-- 左コンテンツ -->
            <div class="col-md-4" style="padding: 0 7px;">
            @include('layouts.common.profile') 
            </div>
            <!-- 真ん中コンテンツ -->
            <div class="col-md-4"  style="padding: 0 7px;">
                <div class="section">
                    <div class="card">
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>{{ number_format($total_year_cost) }}円</td>
                                            <td>{{ number_format($total_month_cost) }}円</td>
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
                    <div class="item">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title text-center"><p>{{ $month }}月</p></div>
                                <div class="d-flex">
                                </div>
                            </div>
                            @include('layouts.common.calendar')
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4" style="padding: 0 7px;">
                <div class="container">
                    @include('layouts.common.top_tweet')
                </div>
            </div>
        </div>
    </div>
@endsection