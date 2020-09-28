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
                <td height=90><font color="#000000"><font size="+1">@if(isset($post))
                <a href="{{ action('Admin\TweetsController@showDay', ['created_at' => $calendar_day[1]->jYear . "-" . str_pad($calendar_day[1]->jMonth, 2, 0, STR_PAD_LEFT) . "-" . str_pad($calendar_day[0]->jDay, 2, 0, STR_PAD_LEFT), 'id' => $other_user->id]) }}">@endif<b>&nbsp;{{ $calendar_day[0]->jDay}}</b></font></a> <font size="-1">@if($today == $calendar_day[0]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
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
                <td height=90><font color="#000000"><font size="+1">@if(isset($post))
                <a href="{{ action('Admin\TweetsController@showDay', ['created_at' => $calendar_day[1]->jYear . "-" . str_pad($calendar_day[1]->jMonth, 2, 0, STR_PAD_LEFT) . "-" . str_pad($calendar_day[1]->jDay, 2, 0, STR_PAD_LEFT), 'id' => $other_user->id]) }}">@endif<b>&nbsp;{{ $calendar_day[1]->jDay}}</b></font></a> <font size="-1">@if($today == $calendar_day[1]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
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
                <td height=90><font color="#000000"><font size="+1">@if(isset($post))
                <a href="{{ action('Admin\TweetsController@showDay', ['created_at' => $calendar_day[1]->jYear . "-" . str_pad($calendar_day[1]->jMonth, 2, 0, STR_PAD_LEFT) . "-" . str_pad($calendar_day[2]->jDay, 2, 0, STR_PAD_LEFT), 'id' => $other_user->id]) }}">@endif<b>&nbsp;{{ $calendar_day[2]->jDay}}</b></font></a> <font size="-1">@if($today == $calendar_day[2]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
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
                <td height=90><font color="#000000"><font size="+1">@if(isset($post))
                <a href="{{ action('Admin\TweetsController@showDay', ['created_at' => $calendar_day[1]->jYear . "-" . str_pad($calendar_day[1]->jMonth, 2, 0, STR_PAD_LEFT) . "-" . str_pad($calendar_day[3]->jDay, 2, 0, STR_PAD_LEFT), 'id' => $other_user->id]) }}">@endif<b>&nbsp;{{ $calendar_day[3]->jDay}}</b></font></a> <font size="-1">@if($today == $calendar_day[3]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                    <font size="-1">
                    @foreach($posts as $post)
                    <?php $post_day = substr($post->created_at, 8, 2); ?>
                    @if($post_day == $calendar_day[3]->jDay)
                    <?php $total_spending04 += $post->addmission_fee + $post->purchase_cost ?>
                    @endif
                    @endforeach
                    @if($total_spending04 == 0)
                    
                    @else
                    {{ number_format($total_spending04) }}円
                    @endif
                    </font>
                </td>
                <td height=90><font color="#000000"><font size="+1">@if(isset($post))
                <a href="{{ action('Admin\TweetsController@showDay', ['created_at' => $calendar_day[1]->jYear . "-" . str_pad($calendar_day[1]->jMonth, 2, 0, STR_PAD_LEFT) . "-" . str_pad($calendar_day[4]->jDay, 2, 0, STR_PAD_LEFT), 'id' => $other_user->id]) }}">@endif<b>&nbsp;{{ $calendar_day[4]->jDay}}</b></font></a> <font size="-1">@if($today == $calendar_day[4]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
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
                <td height=90><font color="#000000"><font size="+1">@if(isset($post))
                <a href="{{ action('Admin\TweetsController@showDay', ['created_at' => $calendar_day[1]->jYear . "-" . str_pad($calendar_day[1]->jMonth, 2, 0, STR_PAD_LEFT) . "-" . str_pad($calendar_day[5]->jDay, 2, 0, STR_PAD_LEFT), 'id' => $other_user->id]) }}">@endif<b>&nbsp;{{ $calendar_day[5]->jDay}}</b></font></a> <font size="-1">@if($today == $calendar_day[5]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
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
                <td height=90><font color="#000000"><font size="+1">@if(isset($post))
                <a href="{{ action('Admin\TweetsController@showDay', ['created_at' => $calendar_day[1]->jYear . "-" . str_pad($calendar_day[1]->jMonth, 2, 0, STR_PAD_LEFT) . "-" . str_pad($calendar_day[6]->jDay, 2, 0, STR_PAD_LEFT), 'id' => $other_user->id]) }}">@endif<b>&nbsp;{{ $calendar_day[6]->jDay}}</b></font></a> <font size="-1">@if($today == $calendar_day[6]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
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
                <td height=90><font color="#000000"><font size="+1">@if(isset($post))
                <a href="{{ action('Admin\TweetsController@showDay', ['created_at' => $calendar_day[1]->jYear . "-" . str_pad($calendar_day[1]->jMonth, 2, 0, STR_PAD_LEFT) . "-" . str_pad($calendar_day[7]->jDay, 2, 0, STR_PAD_LEFT), 'id' => $other_user->id]) }}">@endif<b>&nbsp;{{ $calendar_day[7]->jDay}}</b></font></a> <font size="-1">@if($today == $calendar_day[7]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
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
                <td height=90><font color="#000000"><font size="+1">@if(isset($post))
                <a href="{{ action('Admin\TweetsController@showDay', ['created_at' => $calendar_day[1]->jYear . "-" . str_pad($calendar_day[1]->jMonth, 2, 0, STR_PAD_LEFT) . "-" . str_pad($calendar_day[8]->jDay, 2, 0, STR_PAD_LEFT), 'id' => $other_user->id]) }}">@endif<b>&nbsp;{{ $calendar_day[8]->jDay}}</b></font></a> <font size="-1">@if($today == $calendar_day[8]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
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
                <td height=90><font color="#000000"><font size="+1">@if(isset($post))
                <a href="{{ action('Admin\TweetsController@showDay', ['created_at' => $calendar_day[1]->jYear . "-" . str_pad($calendar_day[1]->jMonth, 2, 0, STR_PAD_LEFT) . "-" . str_pad($calendar_day[9]->jDay, 2, 0, STR_PAD_LEFT), 'id' => $other_user->id]) }}">@endif<b>&nbsp;{{ $calendar_day[9]->jDay}}</b></font></a> <font size="-1">@if($today == $calendar_day[9]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
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
                <td height=90><font color="#000000"><font size="+1">@if(isset($post))
                <a href="{{ action('Admin\TweetsController@showDay', ['created_at' => $calendar_day[1]->jYear . "-" . str_pad($calendar_day[1]->jMonth, 2, 0, STR_PAD_LEFT) . "-" . str_pad($calendar_day[10]->jDay, 2, 0, STR_PAD_LEFT), 'id' => $other_user->id]) }}">@endif<b>&nbsp;{{ $calendar_day[10]->jDay}}</b></font></a> <font size="-1">@if($today == $calendar_day[10]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
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
                <td height=90><font color="#000000"><font size="+1">@if(isset($post))
                <a href="{{ action('Admin\TweetsController@showDay', ['created_at' => $calendar_day[1]->jYear . "-" . str_pad($calendar_day[1]->jMonth, 2, 0, STR_PAD_LEFT) . "-" . str_pad($calendar_day[11]->jDay, 2, 0, STR_PAD_LEFT), 'id' => $other_user->id]) }}">@endif<b>&nbsp;{{ $calendar_day[11]->jDay}}</b></font></a> <font size="-1">@if($today == $calendar_day[11]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
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
                <td height=90><font color="#000000"><font size="+1">@if(isset($post))
                <a href="{{ action('Admin\TweetsController@showDay', ['created_at' => $calendar_day[1]->jYear . "-" . str_pad($calendar_day[1]->jMonth, 2, 0, STR_PAD_LEFT) . "-" . str_pad($calendar_day[12]->jDay, 2, 0, STR_PAD_LEFT), 'id' => $other_user->id]) }}">@endif<b>&nbsp;{{ $calendar_day[12]->jDay}}</b></font></a> <font size="-1">@if($today == $calendar_day[12]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
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
                <td height=90><font color="#000000"><font size="+1">@if(isset($post))
                <a href="{{ action('Admin\TweetsController@showDay', ['created_at' => $calendar_day[1]->jYear . "-" . str_pad($calendar_day[1]->jMonth, 2, 0, STR_PAD_LEFT) . "-" . str_pad($calendar_day[13]->jDay, 2, 0, STR_PAD_LEFT), 'id' => $other_user->id]) }}">@endif<b>&nbsp;{{ $calendar_day[13]->jDay}}</b></font></a> <font size="-1">@if($today == $calendar_day[13]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
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
                <td height=90><font color="#000000"><font size="+1">@if(isset($post))
                <a href="{{ action('Admin\TweetsController@showDay', ['created_at' => $calendar_day[1]->jYear . "-" . str_pad($calendar_day[1]->jMonth, 2, 0, STR_PAD_LEFT) . "-" . str_pad($calendar_day[14]->jDay, 2, 0, STR_PAD_LEFT), 'id' => $other_user->id]) }}">@endif<b>&nbsp;{{ $calendar_day[14]->jDay}}</b></font></a> <font size="-1">@if($today == $calendar_day[14]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
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
                <td height=90><font color="#000000"><font size="+1">@if(isset($post))
                <a href="{{ action('Admin\TweetsController@showDay', ['created_at' => $calendar_day[1]->jYear . "-" . str_pad($calendar_day[1]->jMonth, 2, 0, STR_PAD_LEFT) . "-" . str_pad($calendar_day[15]->jDay, 2, 0, STR_PAD_LEFT), 'id' => $other_user->id]) }}">@endif<b>&nbsp;{{ $calendar_day[15]->jDay}}</b></font></a> <font size="-1">@if($today == $calendar_day[15]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
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
                <td height=90><font color="#000000"><font size="+1">@if(isset($post))
                <a href="{{ action('Admin\TweetsController@showDay', ['created_at' => $calendar_day[1]->jYear . "-" . str_pad($calendar_day[1]->jMonth, 2, 0, STR_PAD_LEFT) . "-" . str_pad($calendar_day[16]->jDay, 2, 0, STR_PAD_LEFT), 'id' => $other_user->id]) }}">@endif<b>&nbsp;{{ $calendar_day[16]->jDay}}</b></font></a> <font size="-1">@if($today == $calendar_day[16]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
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
                <td height=90><font color="#000000"><font size="+1">@if(isset($post))
                <a href="{{ action('Admin\TweetsController@showDay', ['created_at' => $calendar_day[1]->jYear . "-" . str_pad($calendar_day[1]->jMonth, 2, 0, STR_PAD_LEFT) . "-" . str_pad($calendar_day[17]->jDay, 2, 0, STR_PAD_LEFT), 'id' => $other_user->id]) }}">@endif<b>&nbsp;{{ $calendar_day[17]->jDay}}</b></font></a> <font size="-1">@if($today == $calendar_day[17]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
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
                <td height=90><font color="#000000"><font size="+1">@if(isset($post))
                <a href="{{ action('Admin\TweetsController@showDay', ['created_at' => $calendar_day[1]->jYear . "-" . str_pad($calendar_day[1]->jMonth, 2, 0, STR_PAD_LEFT) . "-" . str_pad($calendar_day[18]->jDay, 2, 0, STR_PAD_LEFT), 'id' => $other_user->id]) }}">@endif<b>&nbsp;{{ $calendar_day[18]->jDay}}</b></font></a> <font size="-1">@if($today == $calendar_day[18]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
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
                <td height=90><font color="#000000"><font size="+1">@if(isset($post))
                <a href="{{ action('Admin\TweetsController@showDay', ['created_at' => $calendar_day[1]->jYear . "-" . str_pad($calendar_day[1]->jMonth, 2, 0, STR_PAD_LEFT) . "-" . str_pad($calendar_day[19]->jDay, 2, 0, STR_PAD_LEFT), 'id' => $other_user->id]) }}">@endif<b>&nbsp;{{ $calendar_day[19]->jDay}}</b></font></a> <font size="-1">@if($today == $calendar_day[19]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
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
                <td height=90><font color="#000000"><font size="+1">@if(isset($post))
                <a href="{{ action('Admin\TweetsController@showDay', ['created_at' => $calendar_day[1]->jYear . "-" . str_pad($calendar_day[1]->jMonth, 2, 0, STR_PAD_LEFT) . "-" . str_pad($calendar_day[20]->jDay, 2, 0, STR_PAD_LEFT), 'id' => $other_user->id]) }}">@endif<b>&nbsp;{{ $calendar_day[20]->jDay}}</b></font></a> <font size="-1">@if($today == $calendar_day[20]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
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
                <td height=90><font color="#000000"><font size="+1">@if(isset($post))
                <a href="{{ action('Admin\TweetsController@showDay', ['created_at' => $calendar_day[1]->jYear . "-" . str_pad($calendar_day[1]->jMonth, 2, 0, STR_PAD_LEFT) . "-" . str_pad($calendar_day[21]->jDay, 2, 0, STR_PAD_LEFT), 'id' => $other_user->id]) }}">@endif<b>&nbsp;{{ $calendar_day[21]->jDay}}</b></font></a> <font size="-1">@if($today == $calendar_day[21]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
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
                <td height=90><font color="#000000"><font size="+1">@if(isset($post))
                <a href="{{ action('Admin\TweetsController@showDay', ['created_at' => $calendar_day[1]->jYear . "-" . str_pad($calendar_day[1]->jMonth, 2, 0, STR_PAD_LEFT) . "-" . str_pad($calendar_day[22]->jDay, 2, 0, STR_PAD_LEFT), 'id' => $other_user->id]) }}">@endif<b>&nbsp;{{ $calendar_day[22]->jDay}}</b></font></a> <font size="-1">@if($today == $calendar_day[22]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
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
                <td height=90><font color="#000000"><font size="+1">@if(isset($post))
                <a href="{{ action('Admin\TweetsController@showDay', ['created_at' => $calendar_day[1]->jYear . "-" . str_pad($calendar_day[1]->jMonth, 2, 0, STR_PAD_LEFT) . "-" . str_pad($calendar_day[23]->jDay, 2, 0, STR_PAD_LEFT), 'id' => $other_user->id]) }}">@endif<b>&nbsp;{{ $calendar_day[23]->jDay}}</b></font></a> <font size="-1">@if($today == $calendar_day[23]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
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
                <td height=90><font color="#000000"><font size="+1">@if(isset($post))
                <a href="{{ action('Admin\TweetsController@showDay', ['created_at' => $calendar_day[1]->jYear . "-" . str_pad($calendar_day[1]->jMonth, 2, 0, STR_PAD_LEFT) . "-" . str_pad($calendar_day[24]->jDay, 2, 0, STR_PAD_LEFT), 'id' => $other_user->id]) }}">@endif<b>&nbsp;{{ $calendar_day[24]->jDay}}</b></font></a> <font size="-1">@if($today == $calendar_day[24]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
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
                <td height=90><font color="#000000"><font size="+1">@if(isset($post))
                <a href="{{ action('Admin\TweetsController@showDay', ['created_at' => $calendar_day[1]->jYear . "-" . str_pad($calendar_day[1]->jMonth, 2, 0, STR_PAD_LEFT) . "-" . str_pad($calendar_day[25]->jDay, 2, 0, STR_PAD_LEFT), 'id' => $other_user->id]) }}">@endif<b>&nbsp;{{ $calendar_day[25]->jDay}}</b></font></a> <font size="-1">@if($today == $calendar_day[25]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
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
                <td height=90><font color="#000000"><font size="+1">@if(isset($post))
                <a href="{{ action('Admin\TweetsController@showDay', ['created_at' => $calendar_day[1]->jYear . "-" . str_pad($calendar_day[1]->jMonth, 2, 0, STR_PAD_LEFT) . "-" . str_pad($calendar_day[26]->jDay, 2, 0, STR_PAD_LEFT), 'id' => $other_user->id]) }}">@endif<b>&nbsp;{{ $calendar_day[26]->jDay}}</b></font></a> <font size="-1">@if($today == $calendar_day[26]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
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
                <td height=90><font color="#000000"><font size="+1">@if(isset($post))
                <a href="{{ action('Admin\TweetsController@showDay', ['created_at' => $calendar_day[1]->jYear . "-" . str_pad($calendar_day[1]->jMonth, 2, 0, STR_PAD_LEFT) . "-" . str_pad($calendar_day[27]->jDay, 2, 0, STR_PAD_LEFT), 'id' => $other_user->id]) }}">@endif<b>&nbsp;{{ $calendar_day[27]->jDay}}</b></font></a> <font size="-1">@if($today == $calendar_day[27]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
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
                <td height=90><font color="#000000"><font size="+1">@if(isset($post))
                <a href="{{ action('Admin\TweetsController@showDay', ['created_at' => $calendar_day[1]->jYear . "-" . str_pad($calendar_day[1]->jMonth, 2, 0, STR_PAD_LEFT) . "-" . str_pad($calendar_day[28]->jDay, 2, 0, STR_PAD_LEFT), 'id' => $other_user->id]) }}">@endif<b>&nbsp;{{ $calendar_day[28]->jDay}}</b></font></a> <font size="-1">@if($today == $calendar_day[28]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
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
                <td height=90><font color="#000000"><font size="+1">@if(isset($post))
                <a href="{{ action('Admin\TweetsController@showDay', ['created_at' => $calendar_day[1]->jYear . "-" . str_pad($calendar_day[1]->jMonth, 2, 0, STR_PAD_LEFT) . "-" . str_pad($calendar_day[29]->jDay, 2, 0, STR_PAD_LEFT), 'id' => $other_user->id]) }}">@endif<b>&nbsp;{{ $calendar_day[29]->jDay}}</b></font></a> <font size="-1">@if($today == $calendar_day[29]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
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
                <td height=90><font color="#000000"><font size="+1">@if(isset($post))
                <a href="{{ action('Admin\TweetsController@showDay', ['created_at' => $calendar_day[1]->jYear . "-" . str_pad($calendar_day[1]->jMonth, 2, 0, STR_PAD_LEFT) . "-" . str_pad($calendar_day[30]->jDay, 2, 0, STR_PAD_LEFT), 'id' => $other_user->id]) }}">@endif<b>&nbsp;{{ $calendar_day[30]->jDay}}</b></font></a> <font size="-1">@if($today == $calendar_day[30]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
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
                <td height=90><font color="#000000"><font size="+1">@if(isset($post))
                <a href="{{ action('Admin\TweetsController@showDay', ['created_at' => $calendar_day[1]->jYear . "-" . str_pad($calendar_day[1]->jMonth, 2, 0, STR_PAD_LEFT) . "-" . str_pad($calendar_day[31]->jDay, 2, 0, STR_PAD_LEFT), 'id' => $other_user->id]) }}">@endif<b>&nbsp;{{ $calendar_day[31]->jDay}}</b></font></a> <font size="-1">@if($today == $calendar_day[31]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
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
                <td height=90><font color="#000000"><font size="+1">@if(isset($post))
                <a href="{{ action('Admin\TweetsController@showDay', ['created_at' => $calendar_day[1]->jYear . "-" . str_pad($calendar_day[1]->jMonth, 2, 0, STR_PAD_LEFT) . "-" . str_pad($calendar_day[32]->jDay, 2, 0, STR_PAD_LEFT), 'id' => $other_user->id]) }}">@endif<b>&nbsp;{{ $calendar_day[32]->jDay}}</b></font></a> <font size="-1">@if($today == $calendar_day[32]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
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
                <td height=90><font color="#000000"><font size="+1">@if(isset($post))
                <a href="{{ action('Admin\TweetsController@showDay', ['created_at' => $calendar_day[1]->jYear . "-" . str_pad($calendar_day[1]->jMonth, 2, 0, STR_PAD_LEFT) . "-" . str_pad($calendar_day[33]->jDay, 2, 0, STR_PAD_LEFT), 'id' => $other_user->id]) }}">@endif<b>&nbsp;{{ $calendar_day[33]->jDay}}</b></font></a> <font size="-1">@if($today == $calendar_day[33]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
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
                <td height=90><font color="#000000"><font size="+1">@if(isset($post))
                <a href="{{ action('Admin\TweetsController@showDay', ['created_at' => $calendar_day[1]->jYear . "-" . str_pad($calendar_day[1]->jMonth, 2, 0, STR_PAD_LEFT) . "-" . str_pad($calendar_day[34]->jDay, 2, 0, STR_PAD_LEFT), 'id' => $other_user->id]) }}">@endif<b>&nbsp;{{ $calendar_day[34]->jDay}}</b></font></a> <font size="-1">@if($today == $calendar_day[34]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
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