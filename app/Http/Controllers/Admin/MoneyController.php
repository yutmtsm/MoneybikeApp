<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Money;
use App\Tweet;
use App\Bike;
use Auth;

class MoneyController extends Controller
{
    //
    public function moneypage(Request $request, Bike $bike, Tweet $tweet, Money $money)
    {
        $user = Auth::user();
        
        $mybikes = $bike->getMybikeInfo($user->id);
        
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
        $today = $dt->day;
        
         //カレンダーのJSON
        $url = public_path("/storage/json/".$year_month.".js");
        $json = '[' . file_get_contents($url) . ']';
        $calendar_day = json_decode($json,false);
        
        // 自分の指定月の投稿記事を取得
        $posts = Tweet::where('user_id', $user->id)->whereYear('created_at', $year)->whereMonth('created_at', $month)->get();
        // 投稿記事の合計金を算出
       foreach($posts as $post)
       {
           $money->total_addmission_fee += $post->addmission_fee;
           $money->total_purchase_cost += $post->purchase_cost;
       }
       $money->total_travel_expenses = $money->total_addmission_fee + $money->total_purchase_cost;
        //   バイクの合計金を算出
        foreach($mybikes as $mybike)
        {
            // 変動日の合計金
            $money->total_voluntary_insurance += $mybike->voluntary_insurance;
            $money->total_vehicle_inspection += $mybike->vehicle_inspection;
            $money->total_parking_fee += $mybike->parking_fee;
            $money->total_consumables += $mybike->consumables;
            // 固定費の合計金
            $money->total_liability_insurance += $mybike->liability_insurance;
            $money->total_weight_tax += $mybike->weight_tax;
            $money->total_light_vehicle_tax += $mybike->light_vehicle_tax;
        }
        $money->total_variable_cost = $money->total_voluntary_insurance + $money->total_vehicle_inspection + $money->total_parking_fee + $money->total_consumables;
        $money->total_fixed_cost = $money->total_liability_insurance + $money->total_weight_tax + $money->total_light_vehicle_tax;
        $money->spending_month = $money->total_travel_expenses + $money->total_variable_cost/12 + $money->total_fixed_cost/12;

        // 他にいい方法があるか模索中
        $total_spending = null;
        $total_spending01 = null;$total_spending02 = null;$total_spending03 = null;$total_spending04 = null;$total_spending05 = null;$total_spending06 = null;$total_spending07 = null;
        $total_spending08 = null;$total_spending09 = null;$total_spending10 = null;$total_spending11 = null;$total_spending12 = null;$total_spending13 = null;$total_spending14 = null;
        $total_spending15 = null;$total_spending16 = null;$total_spending17 = null;$total_spending18 = null;$total_spending19 = null;$total_spending20 = null;$total_spending21 = null;
        $total_spending22 = null;$total_spending23 = null;$total_spending24 = null;$total_spending25 = null;$total_spending26 = null;$total_spending27 = null;$total_spending28 = null;
        $total_spending29 = null;$total_spending30 = null;$total_spending31 = null;$total_spending32 = null;$total_spending33 = null;$total_spending34 = null;$total_spending35 = null;
        
        
        //日付が選択されたら
        if (!empty($request['from']) && !empty($request['until'])) {
            //ハッシュタグの選択された20xx/xx/xx ~ 20xx/xx/xxのレポート情報を取得
            $dates = Tweet::getDate($user->id, $request['from'], $request['until']);
        } else {
            //リクエストデータがなければそのままで表示
            $dates = null;
        }
        $period = $request->all();

        $total_period_money = 0;

        if(isset($dates))
        {
            foreach($dates as $date)
            {
                $total_period_money += $date->addmission_fee + $date->purchase_cost;
            }
        } else {
            $total_period_money = "期間を選択してください";
        }
        
        $last_month = "last_month";
        $next_month = "next_month";
        
        
        return view('admin.money.money_management', [
            'user' => $user, 'mybikes' => $mybikes,
            'posts' => $posts, 'money' => $money,
            'year_month' => $year_month, 'year' => $year, 'month' => $month, 'today' => $today, 'last_month' => $last_month, 'next_month' => $next_month,
            'calendar_day' => $calendar_day,
            'total_spending' => $total_spending,
            'total_spending01' => $total_spending01, 'total_spending02' => $total_spending02, 'total_spending03' => $total_spending03, 'total_spending04' => $total_spending04, 'total_spending05' => $total_spending05, 'total_spending06' => $total_spending06, 'total_spending07' => $total_spending07, 
            'total_spending08' => $total_spending08, 'total_spending09' => $total_spending09, 'total_spending10' => $total_spending10, 'total_spending11' => $total_spending11, 'total_spending12' => $total_spending12, 'total_spending13' => $total_spending13, 'total_spending14' => $total_spending14, 
            'total_spending15' => $total_spending15, 'total_spending16' => $total_spending16, 'total_spending17' => $total_spending17, 'total_spending18' => $total_spending18, 'total_spending19' => $total_spending19, 'total_spending20' => $total_spending20, 'total_spending21' => $total_spending21, 
            'total_spending22' => $total_spending22, 'total_spending23' => $total_spending23, 'total_spending24' => $total_spending24, 'total_spending25' => $total_spending25, 'total_spending26' => $total_spending26, 'total_spending27' => $total_spending27, 'total_spending28' => $total_spending28, 
            'total_spending29' => $total_spending29, 'total_spending30' => $total_spending30, 'total_spending31' => $total_spending31, 'total_spending32' => $total_spending32, 'total_spending33' => $total_spending33, 'total_spending34' => $total_spending34, 'total_spending35' => $total_spending35,
            'total_period_money' => $total_period_money, 'period' => $period
            ]);
    }
    
    public function other_moneypage(Request $request, Bike $bike, Tweet $tweet, Money $money)
    {
        // dd($request);
        $user = Auth::user();
        
        $mybikes = $bike->getMybikeInfo($user->id);
        
        if($request->year_month == null){
            $dt = Carbon::now('Asia/Tokyo');
        } else {
            $dt = $request->year_month;
        }
        if($request->target == null){
            $year_month = substr( $dt, 0, 7); 
        } elseif($request->target == 'next_month') {
            $year_month = $money->getNextMonth($dt);
        } elseif($request->target == 'last_month') {
            $year_month = $money->getLastMonth($dt);
        }
        dd($year_month);
        $year = substr( $year_month, 0, 4);
        $month = substr( $year_month, 5, 2);
        $today = $dt->day;
        
         //カレンダーのJSON
        $url = public_path("/storage/json/".$year_month.".js");
        $json = '[' . file_get_contents($url) . ']';
        $calendar_day = json_decode($json,false);
        
        // 自分の指定月の投稿記事を取得
        $posts = Tweet::where('user_id', $user->id)->whereYear('created_at', $year)->whereMonth('created_at', $month)->get();
        // 投稿記事の合計金を算出
       foreach($posts as $post)
       {
           $money->total_addmission_fee += $post->addmission_fee;
           $money->total_purchase_cost += $post->purchase_cost;
       }
       $money->total_travel_expenses = $money->total_addmission_fee + $money->total_purchase_cost;
        //   バイクの合計金を算出
        foreach($mybikes as $mybike)
        {
            // 変動日の合計金
            $money->total_voluntary_insurance += $mybike->voluntary_insurance;
            $money->total_vehicle_inspection += $mybike->vehicle_inspection;
            $money->total_parking_fee += $mybike->parking_fee;
            $money->total_consumables += $mybike->consumables;
            // 固定費の合計金
            $money->total_liability_insurance += $mybike->liability_insurance;
            $money->total_weight_tax += $mybike->weight_tax;
            $money->total_light_vehicle_tax += $mybike->light_vehicle_tax;
        }
        $money->total_variable_cost = $money->total_voluntary_insurance + $money->total_vehicle_inspection + $money->total_parking_fee + $money->total_consumables;
        $money->total_fixed_cost = $money->total_liability_insurance + $money->total_weight_tax + $money->total_light_vehicle_tax;
        $money->spending_month = $money->total_travel_expenses + $money->total_variable_cost/12 + $money->total_fixed_cost/12;

        // 他にいい方法があるか模索中
        $total_spending = null;
        $total_spending01 = null;$total_spending02 = null;$total_spending03 = null;$total_spending04 = null;$total_spending05 = null;$total_spending06 = null;$total_spending07 = null;
        $total_spending08 = null;$total_spending09 = null;$total_spending10 = null;$total_spending11 = null;$total_spending12 = null;$total_spending13 = null;$total_spending14 = null;
        $total_spending15 = null;$total_spending16 = null;$total_spending17 = null;$total_spending18 = null;$total_spending19 = null;$total_spending20 = null;$total_spending21 = null;
        $total_spending22 = null;$total_spending23 = null;$total_spending24 = null;$total_spending25 = null;$total_spending26 = null;$total_spending27 = null;$total_spending28 = null;
        $total_spending29 = null;$total_spending30 = null;$total_spending31 = null;$total_spending32 = null;$total_spending33 = null;$total_spending34 = null;$total_spending35 = null;
        
        
        //日付が選択されたら
        if (!empty($request['from']) && !empty($request['until'])) {
            //ハッシュタグの選択された20xx/xx/xx ~ 20xx/xx/xxのレポート情報を取得
            $dates = Tweet::getDate($user->id, $request['from'], $request['until']);
        } else {
            //リクエストデータがなければそのままで表示
            $dates = null;
        }
        $period = $request->all();

        $total_period_money = 0;

        if(isset($dates))
        {
            foreach($dates as $date)
            {
                $total_period_money += $date->addmission_fee + $date->purchase_cost;
            }
        } else {
            $total_period_money = "期間を選択してください";
        }
        
        $last_month = "last_month";
        $next_month = "next_month";
        
        
        return view('admin.money.money_management', [
            'user' => $user, 'mybikes' => $mybikes,
            'posts' => $posts, 'money' => $money,
            'year_month' => $year_month, 'year' => $year, 'month' => $month, 'today' => $today, 'last_month' => $last_month, 'next_month' => $next_month,
            'calendar_day' => $calendar_day,
            'total_spending' => $total_spending,
            'total_spending01' => $total_spending01, 'total_spending02' => $total_spending02, 'total_spending03' => $total_spending03, 'total_spending04' => $total_spending04, 'total_spending05' => $total_spending05, 'total_spending06' => $total_spending06, 'total_spending07' => $total_spending07, 
            'total_spending08' => $total_spending08, 'total_spending09' => $total_spending09, 'total_spending10' => $total_spending10, 'total_spending11' => $total_spending11, 'total_spending12' => $total_spending12, 'total_spending13' => $total_spending13, 'total_spending14' => $total_spending14, 
            'total_spending15' => $total_spending15, 'total_spending16' => $total_spending16, 'total_spending17' => $total_spending17, 'total_spending18' => $total_spending18, 'total_spending19' => $total_spending19, 'total_spending20' => $total_spending20, 'total_spending21' => $total_spending21, 
            'total_spending22' => $total_spending22, 'total_spending23' => $total_spending23, 'total_spending24' => $total_spending24, 'total_spending25' => $total_spending25, 'total_spending26' => $total_spending26, 'total_spending27' => $total_spending27, 'total_spending28' => $total_spending28, 
            'total_spending29' => $total_spending29, 'total_spending30' => $total_spending30, 'total_spending31' => $total_spending31, 'total_spending32' => $total_spending32, 'total_spending33' => $total_spending33, 'total_spending34' => $total_spending34, 'total_spending35' => $total_spending35,
            'total_period_money' => $total_period_money, 'period' => $period
            ]);
    }
}
