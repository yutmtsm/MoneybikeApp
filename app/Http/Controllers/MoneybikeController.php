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
    public function top(Request $request, User $user, Tweet $tweet, Follower $follower)
    {
        // 画像ありの投稿データーを最新中に処理
        
        // dd($post_image_path[3]);
        return view('top');
    }
}
