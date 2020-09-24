<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Money;
use App\Tweet;

class MoneyController extends Controller
{
    //
    public function moneypage(Request $request, Tweet $tweet)
    {
        $user = Auth::user();
        // dd($request);
        if($request->year_month == null){
            $dt = Carbon::now('Asia/Tokyo');
        } else {
            $dt = $request->year_month;
        }
        if($request->target == null){
            $year_month = substr( $dt, 0, 7); 
        } elseif($request->target == 'next_month') {
            $year_month = substr( $dt->addMonth(1), 0, 7);
        } elseif($request->target == 'last_month') {
            $year_month = substr( $dt->addMonth(-1), 0, 7);
        }
        $year = substr( $year_month, 0, 4);
        $month = substr( $year_month, 5, 2);
        // dd($month);
        
        $posts = $tweet->getMonthTimeLines($year, $month);
        //カレンダーのJSON
        $url = public_path("/storage/json/".$year_month.".js");
        $json = '[' . file_get_contents($url) . ']';
        $calendar_day = json_decode($json,false);
        
        // 他にいい方法があるか模索中
        $total_spending = null;
        $total_spending01 = null;$total_spending02 = null;$total_spending03 = null;$total_spending04 = null;$total_spending05 = null;$total_spending06 = null;$total_spending07 = null;
        $total_spending08 = null;$total_spending09 = null;$total_spending10 = null;$total_spending11 = null;$total_spending12 = null;$total_spending13 = null;$total_spending14 = null;
        $total_spending15 = null;$total_spending16 = null;$total_spending17 = null;$total_spending18 = null;$total_spending19 = null;$total_spending20 = null;$total_spending21 = null;
        $total_spending22 = null;$total_spending23 = null;$total_spending24 = null;$total_spending25 = null;$total_spending26 = null;$total_spending27 = null;$total_spending28 = null;
        $total_spending29 = null;$total_spending30 = null;$total_spending31 = null;$total_spending32 = null;$total_spending33 = null;$total_spending34 = null;$total_spending35 = null;

        
        return view('admin.money.money_management', [
            'user' => $user,
            'posts' => $posts,
            
            'total_spending' => $total_spending,
            'total_spending01' => $total_spending01, 'total_spending02' => $total_spending02, 'total_spending03' => $total_spending03, 'total_spending04' => $total_spending04, 'total_spending05' => $total_spending05, 'total_spending06' => $total_spending06, 'total_spending07' => $total_spending07, 
            'total_spending08' => $total_spending08, 'total_spending09' => $total_spending09, 'total_spending10' => $total_spending10, 'total_spending11' => $total_spending11, 'total_spending12' => $total_spending12, 'total_spending13' => $total_spending13, 'total_spending14' => $total_spending14, 
            'total_spending15' => $total_spending15, 'total_spending16' => $total_spending16, 'total_spending17' => $total_spending17, 'total_spending18' => $total_spending18, 'total_spending19' => $total_spending19, 'total_spending20' => $total_spending20, 'total_spending21' => $total_spending21, 
            'total_spending22' => $total_spending22, 'total_spending23' => $total_spending23, 'total_spending24' => $total_spending24, 'total_spending25' => $total_spending25, 'total_spending26' => $total_spending26, 'total_spending27' => $total_spending27, 'total_spending28' => $total_spending28, 
            'total_spending29' => $total_spending29, 'total_spending30' => $total_spending30, 'total_spending31' => $total_spending31, 'total_spending32' => $total_spending32, 'total_spending33' => $total_spending33, 'total_spending34' => $total_spending34, 'total_spending35' => $total_spending35,
            ]);
    }
}
