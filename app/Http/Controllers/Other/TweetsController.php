<?php

namespace App\Http\Controllers\Other;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Comment;
use App\User;
use App\Tweet;
use App\Follower;
use DB;
use Auth;

class TweetsController extends Controller
{
    
    
    public function showDay(Request $request, Tweet $tweet, Comment $comment)
    {
        // dd($request);
        $date = $request->created_at;
        $year = $tweet->getYear($date);
        $month = $tweet->getMonth($date);
        $day = $tweet->getDay($date);
        // dd($day);
        // $aa = $aaa->pluck('created_at')->toArray();
        
        $login_user = auth()->user();
        $posts = $tweet->getDayTweet($login_user->id, $year, $month, $day);
        // ポストに紐づいたUser_idを持ってきて情報を代入
            // $users = User::find($post->user_id);
            // $post->profile_name = $users->name;
            // $post->profile_image_path = $users->image_path;
            // $post->profile_created_at = $users->created_at;

        return view('admin.posts.showDay', [
            'login_user' => $login_user, 'posts' => $posts,
        ]);
    }
}
