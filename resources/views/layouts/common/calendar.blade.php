<div class="item">
    <div class="card">
        <div class="card-header">
            <div class="card-title text-center"><p>{{ $month }}月</p></div>
            <div class="d-flex">
                <a href="#">前の月</a>
                <a class="ml-auto" href="#">次の月</a>
            </div>
        </div>
        
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
                    @foreach($day_costs as $day_cost)
                    <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                    @if($post_day == $calendar_day[0]->jDay)
                    <?php $total_spending01 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
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
                    @foreach($day_costs as $day_cost)
                    <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                    @if($post_day == $calendar_day[1]->jDay)
                    <?php $total_spending02 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
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
                    @foreach($day_costs as $day_cost)
                    <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                    @if($post_day == $calendar_day[2]->jDay)
                    <?php $total_spending03 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
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
                    @foreach($day_costs as $day_cost)
                    <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                    @if($post_day == $calendar_day[3]->jDay)
                    <?php $total_spending04 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                    @endif
                    @endforeach
                    @if($total_spending04 == 0)
        
                    @else
                    {{ number_format($total_spending04) }}円
                    @endif
                    </font>
                </td>
                <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[4]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[4]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                    <font size="-1">
                    @foreach($day_costs as $day_cost)
                    <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                    @if($post_day == $calendar_day[4]->jDay)
                    <?php $total_spending05 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
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
                    @foreach($day_costs as $day_cost)
                    <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                    @if($post_day == $calendar_day[5]->jDay)
                    <?php $total_spending06 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
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
                    @foreach($day_costs as $day_cost)
                    <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                    @if($post_day == $calendar_day[6]->jDay)
                    <?php $total_spending07 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
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
                    @foreach($day_costs as $day_cost)
                    <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                    @if($post_day == $calendar_day[7]->jDay)
                    <?php $total_spending08 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
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
                    @foreach($day_costs as $day_cost)
                    <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                    @if($post_day == $calendar_day[8]->jDay)
                    <?php $total_spending09 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
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
                    @foreach($day_costs as $day_cost)
                    <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                    @if($post_day == $calendar_day[9]->jDay)
                    <?php $total_spending10 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
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
                    @foreach($day_costs as $day_cost)
                    <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                    @if($post_day == $calendar_day[10]->jDay)
                    <?php $total_spending11 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
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
                    @foreach($day_costs as $day_cost)
                    <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                    @if($post_day == $calendar_day[11]->jDay)
                    <?php $total_spending12 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
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
                    @foreach($day_costs as $day_cost)
                    <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                    @if($post_day == $calendar_day[12]->jDay)
                    <?php $total_spending13 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
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
                    @foreach($day_costs as $day_cost)
                    <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                    @if($post_day == $calendar_day[13]->jDay)
                    <?php $total_spending14 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
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
                    @foreach($day_costs as $day_cost)
                    <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                    @if($post_day == $calendar_day[14]->jDay)
                    <?php $total_spending15 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
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
                    @foreach($day_costs as $day_cost)
                    <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                    @if($post_day == $calendar_day[15]->jDay)
                    <?php $total_spending16 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
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
                    @foreach($day_costs as $day_cost)
                    <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                    @if($post_day == $calendar_day[16]->jDay)
                    <?php $total_spending17 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
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
                    @foreach($day_costs as $day_cost)
                    <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                    @if($post_day == $calendar_day[17]->jDay)
                    <?php $total_spending18 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
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
                    @foreach($day_costs as $day_cost)
                    <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                    @if($post_day == $calendar_day[18]->jDay)
                    <?php $total_spending19 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
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
                    @foreach($day_costs as $day_cost)
                    <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                    @if($post_day == $calendar_day[19]->jDay)
                    <?php $total_spending20 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
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
                    @foreach($day_costs as $day_cost)
                    <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                    @if($post_day == $calendar_day[20]->jDay)
                    <?php $total_spending21 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
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
                    @foreach($day_costs as $day_cost)
                    <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                    @if($post_day == $calendar_day[21]->jDay)
                    <?php $total_spending22 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
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
                    @foreach($day_costs as $day_cost)
                    <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                    @if($post_day == $calendar_day[22]->jDay)
                    <?php $total_spending23 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
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
                    @foreach($day_costs as $day_cost)
                    <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                    @if($post_day == $calendar_day[23]->jDay)
                    <?php $total_spending24 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
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
                    @foreach($day_costs as $day_cost)
                    <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                    @if($post_day == $calendar_day[24]->jDay)
                    <?php $total_spending25 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
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
                    @foreach($day_costs as $day_cost)
                    <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                    @if($post_day == $calendar_day[25]->jDay)
                    <?php $total_spending26 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
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
                    @foreach($day_costs as $day_cost)
                    <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                    @if($post_day == $calendar_day[26]->jDay)
                    <?php $total_spending27 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
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
                    @foreach($day_costs as $day_cost)
                    <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                    @if($post_day == $calendar_day[27]->jDay)
                    <?php $total_spending28 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
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
                    @foreach($day_costs as $day_cost)
                    <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                    @if($post_day == $calendar_day[28]->jDay)
                    <?php $total_spending29 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
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
                    @foreach($day_costs as $day_cost)
                    <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                    @if($post_day == $calendar_day[29]->jDay)
                    <?php $total_spending30 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
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
                    @foreach($day_costs as $day_cost)
                    <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                    @if($post_day == $calendar_day[30]->jDay)
                    <?php $total_spending31 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
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
                    @foreach($day_costs as $day_cost)
                    <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                    @if($post_day == $calendar_day[31]->jDay)
                    <?php $total_spending += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
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
                    @foreach($day_costs as $day_cost)
                    <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                    @if($post_day == $calendar_day[32]->jDay)
                    <?php $total_spending += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
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
                    @foreach($day_costs as $day_cost)
                    <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                    @if($post_day == $calendar_day[33]->jDay)
                    <?php $total_spending += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
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
                    @foreach($day_costs as $day_cost)
                    <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                    @if($post_day == $calendar_day[34]->jDay)
                    <?php $total_spending += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
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