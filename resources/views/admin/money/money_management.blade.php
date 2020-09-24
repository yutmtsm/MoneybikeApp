@extends('layouts.common.common')
@section('css', 'mypage.css')

@section('title', 'お金管理')

@section('content')
<div class="container">
    <h1>支出一覧</h1>
    <!-- スポット検索 -->
    <div class="row">
        
        <!-- 右コンテンツ -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-header d-flex">
                        <h4 class="card-title personal-title">当月支出：{{ number_format($money->spending_month) }}円</h4>
                    </div>
                    
                    <div class="card-header d-flex">
                        <div class="search-totalmoney text-secondary">
                            <h4 class="card-title personal-title">旅費等を期間で検索</h4>
                            <form action="{{ action('Admin\MoneyController@search') }}" method="GET">
                                <input type="date" name="from" placeholder="from_date">
                                    <span class="mx-3 text-grey">~</span>
                                <input type="date" name="until" placeholder="until_date">
                                <input type="hidden" name="id" value="{{ $money->user_id }}">
                                <button type="submit">検索</button>
                            </form>
                            @if($total_period_money > 0)
                            <p>「{{ $period['from'] }}」から「{{ $period['until'] }}」までの旅費等は
                            <span class="text-danger" style="border-bottom: 2px solid red; font-size: 20px;">{{ number_format($total_period_money) }}円</span></p>
                            @else
                            <p>{{ $total_period_money }}</p>
                            @endif
                        </div>
                    </div>
                    
                </div>
            </div>
        
            <div class="card" style="margin-top: 10px;">
                <div class="card-body">
                    <div class="card-title">8月</div>
                    <div class="card-header d-flex">
                        <a href="{{ action('Admin\MoneyController@moneypage', ['target' => $last_month]) }}">前の月</a>
                        <a href="{{ action('Admin\MoneyController@moneypage', ['target' => $next_month]) }}">次の月</a>
                    </div>
                </div>
                
            </div>
            
            <div class="card" style="margin-top: 10px;">
                <div class="card-body">
                    
                    <table width=100% bgcolor="#aaaaaa" cellspacing=1 cellpadding=4>
                        <tr bgcolor="#f0f8ff" align=center>
                            <td width=14%><font color="#ff0000"><b>日</b></font></td>
                            <td width=14%><font color="#000000"><b>月</b></font></td>
                            <td width=14%><font color="#000000"><b>火</b></font></td>
                            <td width=14%><font color="#000000"><b>水</b></font></td>
                            <td width=14%><font color="#000000"><b>木</b></font></td>
                            <td width=14%><font color="#000000"><b>金</b></font></td>
                            <td width=14%><font color="#0000ff"><b>土</b></font></td>
                        </tr>
                        <tr bgcolor="#ffffff" valign=top>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[0]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[0]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[0]->jDay)
                                <?php $total_spending01 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                @if($total_spending01 == 0)
                                
                                @else
                                {{ number_format($total_spending01) }}円
                                @endif
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[1]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[1]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[1]->jDay)
                                <?php $total_spending02 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                @if($total_spending02 == 0)
                                
                                @else
                                {{ number_format($total_spending02) }}円
                                @endif
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[2]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[2]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[2]->jDay)
                                <?php $total_spending03 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                @if($total_spending03 == 0)
                                
                                @else
                                {{ number_format($total_spending03) }}円
                                @endif
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[3]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[3]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[3]->jDay)
                                <?php $total_spending04 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                @if($total_spending04 == 0)
                                
                                @else
                                <a href="{{ action('Admin\PostController@day_details', ['created_at' => $post->created_at]) }}">
                                {{ number_format($total_spending04) }}円
                                </a>
                                @endif
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[4]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[4]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[4]->jDay)
                                <?php $total_spending05 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                @if($total_spending05 == 0)
                                
                                @else
                                {{ number_format($total_spending05) }}円
                                @endif
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[5]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[5]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[5]->jDay)
                                <?php $total_spending06 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                @if($total_spending06 == 0)
                                
                                @else
                                {{ number_format($total_spending06) }}円
                                @endif
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[6]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[6]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[6]->jDay)
                                <?php $total_spending07 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                @if($total_spending07 == 0)
                                
                                @else
                                {{ number_format($total_spending07) }}円
                                @endif
                                </font>
                            </td>
                        </tr>
                        <tr bgcolor="#ffffff" valign=top>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[7]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[7]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[7]->jDay)
                                <?php $total_spending08 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                @if($total_spending08 == 0)
                                
                                @else
                                {{ number_format($total_spending08) }}円
                                @endif
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[8]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[8]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[8]->jDay)
                                <?php $total_spending09 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                @if($total_spending09 == 0)
                                
                                @else
                                {{ number_format($total_spending09) }}円
                                @endif
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[9]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[9]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[9]->jDay)
                                <?php $total_spending10 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                @if($total_spending10 == 0)
                                
                                @else
                                {{ number_format($total_spending10) }}円
                                @endif
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[10]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[10]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[10]->jDay)
                                <?php $total_spending11 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                @if($total_spending11 == 0)
                                
                                @else
                                {{ number_format($total_spending11) }}円
                                @endif
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[11]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[11]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[11]->jDay)
                                <?php $total_spending12 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                @if($total_spending12 == 0)
                                
                                @else
                                {{ number_format($total_spending12) }}円
                                @endif
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[12]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[12]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[12]->jDay)
                                <?php $total_spending13 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                @if($total_spending13 == 0)
                                
                                @else
                                {{ number_format($total_spending13) }}円
                                @endif
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[13]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[13]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[13]->jDay)
                                <?php $total_spending14 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                @if($total_spending14 == 0)
                                
                                @else
                                {{ number_format($total_spending14) }}円
                                @endif
                                </font>
                            </td>
                        </tr>
                        <tr bgcolor="#ffffff" valign=top>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[14]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[14]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[14]->jDay)
                                <?php $total_spending15 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                @if($total_spending15 == 0)
                                
                                @else
                                {{ number_format($total_spending15) }}円
                                @endif
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[15]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[15]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[15]->jDay)
                                <?php $total_spending16 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                @if($total_spending16 == 0)
                                
                                @else
                                {{ number_format($total_spending16) }}円
                                @endif
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[16]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[16]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[16]->jDay)
                                <?php $total_spending17 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                @if($total_spending17 == 0)
                                
                                @else
                                {{ number_format($total_spending17) }}円
                                @endif
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[17]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[17]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[17]->jDay)
                                <?php $total_spending18 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                @if($total_spending18 == 0)
                                
                                @else
                                {{ number_format($total_spending18) }}円
                                @endif
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[18]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[18]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[18]->jDay)
                                <?php $total_spending19 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                @if($total_spending19 == 0)
                                
                                @else
                                {{ number_format($total_spending19) }}円
                                @endif
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[19]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[19]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[19]->jDay)
                                <?php $total_spending20 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                @if($total_spending20 == 0)
                                
                                @else
                                {{ number_format($total_spending20) }}円
                                @endif
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[20]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[20]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[20]->jDay)
                                <?php $total_spending21 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                @if($total_spending21 == 0)
                                
                                @else
                                {{ number_format($total_spending21) }}円
                                @endif
                                </font>
                            </td>
                        </tr>
                        <tr bgcolor="#ffffff" valign=top>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[21]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[21]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[21]->jDay)
                                <?php $total_spending22 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                @if($total_spending22 == 0)
                                
                                @else
                                {{ number_format($total_spending22) }}円
                                @endif
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[22]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[22]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[22]->jDay)
                                <?php $total_spending23 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                @if($total_spending23 == 0)
                                
                                @else
                                {{ number_format($total_spending23) }}円
                                @endif
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[23]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[23]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[23]->jDay)
                                <?php $total_spending24 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                @if($total_spending24 == 0)
                                
                                @else
                                {{ number_format($total_spending24) }}円
                                @endif
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[24]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[24]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[24]->jDay)
                                <?php $total_spending25 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                @if($total_spending25 == 0)
                                
                                @else
                                {{ number_format($total_spending25) }}円
                                @endif
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[25]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[25]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[25]->jDay)
                                <?php $total_spending26 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                @if($total_spending26 == 0)
                                
                                @else
                                {{ number_format($total_spending26) }}円
                                @endif
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[26]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[26]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[26]->jDay)
                                <?php $total_spending27 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                @if($total_spending27 == 0)
                                
                                @else
                                {{ number_format($total_spending27) }}円
                                @endif
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[27]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[27]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[27]->jDay)
                                <?php $total_spending28 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                @if($total_spending28 == 0)
                                
                                @else
                                {{ number_format($total_spending28) }}円
                                @endif
                                </font>
                            </td>
                        </tr>
                        <tr bgcolor="#ffffff" valign=top>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[28]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[28]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[28]->jDay)
                                <?php $total_spending29 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                @if($total_spending29 == 0)
                                
                                @else
                                {{ number_format($total_spending29) }}円
                                @endif
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[29]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[29]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[29]->jDay)
                                <?php $total_spending30 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                @if($total_spending30 == 0)
                                
                                @else
                                {{ number_format($total_spending30) }}円
                                @endif
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[30]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[30]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[30]->jDay)
                                <?php $total_spending31 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                @if($total_spending31 == 0)
                                
                                @else
                                {{ number_format($total_spending31) }}円
                                @endif
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[31]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[31]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[31]->jDay)
                                <?php $total_spending += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                @if($total_spending32 == 0)
                                
                                @else
                                {{ number_format($total_spending32) }}円
                                @endif
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[32]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[32]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[32]->jDay)
                                <?php $total_spending += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                @if($total_spending33 == 0)
                                
                                @else
                                {{ number_format($total_spending33) }}円
                                @endif
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[33]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[33]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[33]->jDay)
                                <?php $total_spending += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                @if($total_spending34 == 0)
                                
                                @else
                                {{ number_format($total_spending34) }}円
                                @endif
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[34]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[34]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[34]->jDay)
                                <?php $total_spending += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                @if($total_spending35 == 0)
                                
                                @else
                                {{ number_format($total_spending35) }}円
                                @endif
                                </font>
                            </td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
        <!-- スポット検索ここまで -->
        
        <!-- 右コンテンツ -->
        <div class="col-md-4">
            <!--  -->
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title personal-title">旅費等 : {{ number_format($money->travel_expenses) }}円</h4>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-dark">施設費　　：{{ number_format($money->total_addmission_fee) }}円</li>
                        <li class="list-group-item text-dark">購入費　　：{{ number_format($money->total_purchase_cost) }}円</li>
                    </ul>
                </div>
            </div>
            
            <!--  -->
            <div class="card" style="margin-top: 10px;">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title personal-title">変動費 : {{ number_format($money->variable_cost) }}円</h4>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-dark">任意保険　：{{ number_format($total_voluntary_insurance) }}円</li>
                        <li class="list-group-item text-dark">車検　　　：{{ number_format($total_vehicle_inspection) }}円</li>
                        <li class="list-group-item text-dark">駐車場代　：{{ number_format($total_parking_fee) }}円</li>
                        <li class="list-group-item text-dark">消耗品費　：{{ number_format($total_consumables) }}円</li>
                        <li class="list-group-item text-dark">分割払い金：円</li>
                    </ul>
                </div>
            </div>
            
            <!--  -->
            <div class="card" style="margin-top: 10px;">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title personal-title">固定費 : {{ number_format($money->fixed_cost) }}円</h4>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-dark">自賠責保険：{{ number_format($total_liability_insurance) }}円</li>
                        <li class="list-group-item text-dark">重量税　　：{{ number_format($total_weight_tax) }}円</li>
                        <li class="list-group-item text-dark">自動車税　：{{ number_format($total_light_vehicle_tax) }}円</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- おすすめユーザーここまで -->
        
        
    </div>
</div>
@endsection
