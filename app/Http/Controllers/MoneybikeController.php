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
        
        unset($request['_token']);
        return view('admin.spot_search', [
        'cond_title' => $cond_title,
        'timelines' => $timelines
        ]);
    }
}
