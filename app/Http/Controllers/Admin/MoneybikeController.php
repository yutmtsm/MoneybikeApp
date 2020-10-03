<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Tweet;
use App\Bike;
use App\Money;
use App\Follower;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Storage;

class MoneybikeController extends Controller
{
    public function mypage(Request $request, User $user, Bike $bike, Money $money, Tweet $tweet, Follower $follower)
    {
        $user = auth()->user();
        // dd($user->id);
        $mybikes = Bike::where('user_id', $user->id)->get();
        // 定義している箇所->定義関数
        // フォローしているユーザーのID
        $follow_ids = $follower->followingIds($user->id);
        // followed_idだけ抜き出す　上のを
        $following_ids = $follow_ids->pluck('followed_id')->toArray();
        $timelines = $tweet->getTimeLines($user->id, $following_ids);
        // 自分の指定月の投稿記事を取得
        $dt = Carbon::now('Asia/Tokyo');
        $year_month = substr( $dt, 0, 7); 
        $year = substr( $year_month, 0, 4);
        $month = substr( $year_month, 5, 2);
        $posts = Tweet::where('user_id', $user->id)->whereYear('created_at', $year)->whereMonth('created_at', $month)->get();
        $yeartimelines = $tweet->getYearTimelines($user->id, $year);
        $monthtimelines = $tweet->getMonthTimeLines($user->id, $year, $month);
        $total_year_cost = 0;
        $total_month_cost = 0;
        // 年間総コストの抽出
        foreach($yeartimelines as $yeartimeline)
        {
            $total_year_cost += ($yeartimeline->addmission_fee + $yeartimeline->purchase_cost);
        }
        $total_year_cost += $bike->getTotalCost($mybikes);
        // 月間総コスト
        foreach($monthtimelines as $monthtimeline)
        {
            $total_month_cost += ($monthtimeline->addmission_fee + $monthtimeline->purchase_cost);
        }
        $total_month_cost += $bike->getTotalCost($mybikes)/12;
        
        $is_following = $user->isFollowing($user->id);
        $is_followed = $user->isFollowed($user->id);
        $tweet_count = $tweet->getTweetCount($user->id);
        $follow_count = $follower->getFollowCount($user->id);
        $follower_count = $follower->getFollowerCount($user->id);
        
        $year_month = date('y/m');
        $today = date('d');
        // dd($year_month);
        
        
        //カレンダーのJSON
        $url = public_path("/json/2020-09.js");
        $json = '[' . file_get_contents($url) . ']';
        $calendar_day = json_decode($json,false);
        // 他にいい方法があるか模索中
        $total_spending = null;
        $total_spending01 = null;$total_spending02 = null;$total_spending03 = null;$total_spending04 = null;$total_spending05 = null;$total_spending06 = null;$total_spending07 = null;
        $total_spending08 = null;$total_spending09 = null;$total_spending10 = null;$total_spending11 = null;$total_spending12 = null;$total_spending13 = null;$total_spending14 = null;
        $total_spending15 = null;$total_spending16 = null;$total_spending17 = null;$total_spending18 = null;$total_spending19 = null;$total_spending20 = null;$total_spending21 = null;
        $total_spending22 = null;$total_spending23 = null;$total_spending24 = null;$total_spending25 = null;$total_spending26 = null;$total_spending27 = null;$total_spending28 = null;
        $total_spending29 = null;$total_spending30 = null;$total_spending31 = null;$total_spending32 = null;$total_spending33 = null;$total_spending34 = null;$total_spending35 = null;
        
        $day_costs = Tweet::where('user_id', $user->id)->get();
        
        
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
        // dd($year_month);
        $year = substr( $year_month, 0, 4);
        $month = substr( $year_month, 5, 2);
        $today = Carbon::now('d');
        
         //カレンダーのJSON
        $url = public_path("/json/".$year_month.".js");
        $json = '[' . file_get_contents($url) . ']';
        $calendar_day = json_decode($json,false);
        $last_month = "last_month";
        $next_month = "next_month";
        
        return view('admin.mypage', [
            'user'           => $user, 'mybikes' => $mybikes,
            'is_following'   => $is_following,
            'is_followed'    => $is_followed,
            'timelines'      => $timelines, 'posts' => $posts,
            'tweet_count'    => $tweet_count,
            'follow_count'   => $follow_count,
            'follower_count' => $follower_count,
            'total_year_cost' => $total_year_cost, 'total_month_cost' => $total_month_cost,
            'total_spending' => $total_spending, 'calendar_day' => $calendar_day, 'today' => $today, 'day_costs' => $day_costs,
            'total_spending01' => $total_spending01, 'total_spending02' => $total_spending02, 'total_spending03' => $total_spending03, 'total_spending04' => $total_spending04, 'total_spending05' => $total_spending05, 'total_spending06' => $total_spending06, 'total_spending07' => $total_spending07, 
            'total_spending08' => $total_spending08, 'total_spending09' => $total_spending09, 'total_spending10' => $total_spending10, 'total_spending11' => $total_spending11, 'total_spending12' => $total_spending12, 'total_spending13' => $total_spending13, 'total_spending14' => $total_spending14, 
            'total_spending15' => $total_spending15, 'total_spending16' => $total_spending16, 'total_spending17' => $total_spending17, 'total_spending18' => $total_spending18, 'total_spending19' => $total_spending19, 'total_spending20' => $total_spending20, 'total_spending21' => $total_spending21, 
            'total_spending22' => $total_spending22, 'total_spending23' => $total_spending23, 'total_spending24' => $total_spending24, 'total_spending25' => $total_spending25, 'total_spending26' => $total_spending26, 'total_spending27' => $total_spending27, 'total_spending28' => $total_spending28, 
            'total_spending29' => $total_spending29, 'total_spending30' => $total_spending30, 'total_spending31' => $total_spending31, 'total_spending32' => $total_spending32, 'total_spending33' => $total_spending33, 'total_spending34' => $total_spending34, 'total_spending35' => $total_spending35,
            'year_month' => $year_month, 'year' => $year, 'month' => $month, 'today' => $today, 'last_month' => $last_month, 'next_month' => $next_month

        ]);
    }
    
    public function spot_search(Tweet $tweet)
    {
        $login_user = Auth::user();
        $all_users = $login_user->getAllUser($login_user->id);
        // dd($all_users);
        $timelines = $tweet->getAllTimeLines();
        $cond_title = "";
        
        
        
        // dd($posts);
        return view('admin.spot_search',[
            'login_user' => $login_user, 'all_users' => $all_users, 'cond_title' => $cond_title,
            'timelines'      => $timelines
            
            ]);
    }
    
    public function search(Request $request, Tweet $tweet)
    {
        $login_user = Auth::user();
        $all_users = User::Where('id', '<>', $login_user->id)->paginate(5);
        
        $cond_title = $request->cond_title;
        
        //検索⇨投稿記事
        if($cond_title != ''){
            // 検索されたら検索結果を取得する
            $timelines = DB::table('tweets')->where('title', 'like', "%$cond_title%")
            ->orwhere('text', 'like', "%$cond_title%")
            ->orwhere('created_at', 'like', "%$cond_title%")
            ->orwhere('spot', 'like', "%$cond_title%")
            ->orwhere('pref', 'like', "%$cond_title%")
            ->orderByDesc('created_at')->simplePaginate(4);
            // dd($timelines);
        } else {
            $timelines = DB::table('tweets')->orderByDesc('created_at')->simplePaginate(3);
        }
        
        // foreach($timelines as $timeline){
        //     $users = User::find($timeline->user_id);
        //     // dd($users);
        //     $timeline->user_name = $users->name;
        //     $timeline->screen_name = $users->screen_name;
        //     if($users->profile_image != null){
        //         $timeline->profile_image = $users->profile_image;
        //         // dd($post->image_icon);
        //     } else {
        //         $timeline->profile_image = null;
        //     }
        //     // dd($timeline->profile_image);
        // }
        
        unset($request['_token']);
        return view('admin.spot_search', [
        'login_user' => $login_user, 'all_users' => $all_users, 'cond_title' => $cond_title,
        'timelines' => $timelines
        ]);
    }
}