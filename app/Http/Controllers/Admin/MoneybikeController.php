<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Post;
use App\Bike;
use App\Follower;
use Auth;
use Carbon\Carbon;

class MoneybikeController extends Controller
{
    public function mypage(User $user, Post $tweet, Follower $follower)
    {
        $user = auth()->user();
        $mybikes = Bike::where('user_id', $user->id)->get();
        
        $is_following = $user->isFollowing($user->id);
        $is_followed = $user->isFollowed($user->id);
        $timelines = $tweet->getUserTimeLine($user->id);
        $tweet_count = $tweet->getTweetCount($user->id);
        $follow_count = $follower->getFollowCount($user->id);
        $follower_count = $follower->getFollowerCount($user->id);
        
        $year_month = date('y/m');
        $today = date('d');
        // dd($year_month);
        
        
        //カレンダーのJSON
        $url = public_path("/storage/json/202009.js");
        $json = '[' . file_get_contents($url) . ']';
        $calendar_day = json_decode($json,false);
        // 他にいい方法があるか模索中
        $total_spending = null;
        $total_spending01 = null;$total_spending02 = null;$total_spending03 = null;$total_spending04 = null;$total_spending05 = null;$total_spending06 = null;$total_spending07 = null;
        $total_spending08 = null;$total_spending09 = null;$total_spending10 = null;$total_spending11 = null;$total_spending12 = null;$total_spending13 = null;$total_spending14 = null;
        $total_spending15 = null;$total_spending16 = null;$total_spending17 = null;$total_spending18 = null;$total_spending19 = null;$total_spending20 = null;$total_spending21 = null;
        $total_spending22 = null;$total_spending23 = null;$total_spending24 = null;$total_spending25 = null;$total_spending26 = null;$total_spending27 = null;$total_spending28 = null;
        $total_spending29 = null;$total_spending30 = null;$total_spending31 = null;$total_spending32 = null;$total_spending33 = null;$total_spending34 = null;$total_spending35 = null;
        
        $day_costs = Post::where('user_id', $user->id)->get();
        // dd($day_costs);
        
        return view('admin.mypage', [
            'user'           => $user, 'mybikes' => $mybikes,
            'is_following'   => $is_following,
            'is_followed'    => $is_followed,
            'timelines'      => $timelines,
            'tweet_count'    => $tweet_count,
            'follow_count'   => $follow_count,
            'follower_count' => $follower_count,
            'total_spending' => $total_spending, 'calendar_day' => $calendar_day, 'today' => $today, 'day_costs' => $day_costs,
            'total_spending01' => $total_spending01, 'total_spending02' => $total_spending02, 'total_spending03' => $total_spending03, 'total_spending04' => $total_spending04, 'total_spending05' => $total_spending05, 'total_spending06' => $total_spending06, 'total_spending07' => $total_spending07, 
            'total_spending08' => $total_spending08, 'total_spending09' => $total_spending09, 'total_spending10' => $total_spending10, 'total_spending11' => $total_spending11, 'total_spending12' => $total_spending12, 'total_spending13' => $total_spending13, 'total_spending14' => $total_spending14, 
            'total_spending15' => $total_spending15, 'total_spending16' => $total_spending16, 'total_spending17' => $total_spending17, 'total_spending18' => $total_spending18, 'total_spending19' => $total_spending19, 'total_spending20' => $total_spending20, 'total_spending21' => $total_spending21, 
            'total_spending22' => $total_spending22, 'total_spending23' => $total_spending23, 'total_spending24' => $total_spending24, 'total_spending25' => $total_spending25, 'total_spending26' => $total_spending26, 'total_spending27' => $total_spending27, 'total_spending28' => $total_spending28, 
            'total_spending29' => $total_spending29, 'total_spending30' => $total_spending30, 'total_spending31' => $total_spending31, 'total_spending32' => $total_spending32, 'total_spending33' => $total_spending33, 'total_spending34' => $total_spending34, 'total_spending35' => $total_spending35,

        ]);
    }
}
