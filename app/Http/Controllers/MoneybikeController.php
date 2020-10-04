<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tweet;
use App\Bike;
use App\Follower;
use Auth;
use Carbon\Carbon;
use DB;

class MoneybikeController extends Controller
{
    //
    public function top(Request $request)
    {
        // 画像ありの投稿データーを最新中に処理
        $cond_title = "";
        // dd($post_image_path[3]);
        return view('nologin.top', [
            'cond_title' => $cond_title
            ]);
    }
    
    public function search(Request $request, Tweet $tweet)
    {
        $cond_title = "";
        $cond_title = $request->cond_title;
        
        //検索⇨投稿記事
        if($cond_title != ''){
            // 検索されたら検索結果を取得する
            $timelines = $tweet->getSerach($cond_title);
            // dd($timelines);
        } else {
            $timelines = $tweet->getAllTimeLines();
        }
        
        unset($request['_token']);
        return view('nologin.spot_search', [
        'cond_title' => $cond_title, 'timelines' => $timelines
        ]);
    }
    
    public function show(Request $request, Tweet $tweet)
    {
        $post = $tweet->getTweet($request->id);
        
        // ポストに紐づいたUser_idを持ってきて情報を代入
            $post_user = User::find($post->user_id);
        // dd($post->profile_image);

        // 合計を産出
        $total_cost = $post->addmission_fee + $post->purchase_cost;

        return view('nologin.show', [
            'post' => $post, 'post_user' => $post_user,
            'total_cost' => $total_cost
        ]);
    }
}
