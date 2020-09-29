<?php

namespace App\Http\Controllers\Admin;

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
    // 一覧表示
    public function index(Tweet $tweet, Follower $follower)
    {
        $user = auth()->user();
        // dd($user);
        $is_following = $user->isFollowing($user->id);
        $is_followed = $user->isFollowed($user->id);
        $timelines = $tweet->getUserTimeLine($user->id);
        // dd($timelines);
        $tweet_count = $tweet->getTweetCount($user->id);
        $follow_count = $follower->getFollowCount($user->id);
        $follower_count = $follower->getFollowerCount($user->id);

        return view('admin.posts.index', [
            'user'           => $user,
            'is_following'   => $is_following,
            'is_followed'    => $is_followed,
            'timelines'      => $timelines,
            'tweet_count'    => $tweet_count,
            'follow_count'   => $follow_count,
            'follower_count' => $follower_count
        ]);
    }


    // 新規投稿画面
    public function create()
    {
        return view('admin.posts.create');
    }
    
    // 新規投稿情報を処理
    public function store(Request $request)
    {
        $this->validate($request, Tweet::$rules);
        $tweet = new Tweet;
        $user = Auth::user();
        //userと関連付け
        $tweet->user_id = $user->id;
        $form = $request->all();
        // 受け取った情報にimageがあれば処理を実施
        if(isset($form['image'])){
            //画像をStrange内に格納し、パスを代入。なければnullを代入
            $path = Storage::disk('s3')->putFile('/posts', $form['image'], 'public');
            $tweet->image_path = Storage::disk('s3')->url($path);
        } else {
            $tweet->image_path = null;
        }
        // 不要な情報を削除
        unset($form['image']);
        unset($form['_token']);
        
        // $form['sightseeing_day'] = date('Y年m月d日 D',strtotime($form['sightseeing_day']));
        $tweet->fill($form);
        $tweet->created_at = $request->created_at;
        $tweet->save();
        // dd($tweet);
        return redirect('mypage/posts');
    }

    public function show(Request $request, Tweet $tweet, Comment $comment)
    {
        // dd($request->id);
        $login_user = auth()->user();
        $post = $tweet->getTweet($request->id);
        // ポストに紐づいたUser_idを持ってきて情報を代入
            $post_user = User::find($post->user_id);
        // dd($post->profile_image);
        $comments = $comment->getComments($post->id);
        $comment_count = $comments->count();
        
        // 合計を産出
        $total_cost = $post->addmission_fee + $post->purchase_cost;
        
        // 情報に紐づいたユーザー情報を取得
        foreach($comments as $comment)
        {
            $post_comment_user = User::find($comment->user_id);
            $comments->user_name = $post_comment_user->name;
            $comments->image_path = $post_comment_user->image_path;
        }

        return view('admin.posts.show', [
            'login_user' => $login_user, 'post' => $post, 'post_user' => $post_user,
            'total_cost' => $total_cost,
            'comments' => $comments, 'comment_count' => $comment_count
        ]);
    }
    
    public function showDay(Request $request, Tweet $tweet, Comment $comment)
    {
        // dd($request);
        $date = $request->created_at;
        $date = $request->created_at;
        $year = $tweet->getYear($date);
        $month = $tweet->getMonth($date);
        $day = $tweet->getDay($date);
        // dd($day);
        // $aa = $aaa->pluck('created_at')->toArray();
        
        $login_user = auth()->user();
        $posts = $tweet->getDayTweet($request->id, $year, $month, $day);
        // ポストに紐づいたUser_idを持ってきて情報を代入
            // $users = User::find($post->user_id);
            // $post->profile_name = $users->name;
            // $post->profile_image_path = $users->image_path;
            // $post->profile_created_at = $users->created_at;

        return view('admin.posts.showDay', [
            'login_user' => $login_user, 'posts' => $posts,
        ]);
    }

    public function edit(Request $request)
    {
        //dd($request);
        $post = Tweet::find($request->id);
        //dd($post);
        if(empty($post)){
            abort(404);
        }
        return view('admin.posts.edit', [
            'post_form' => $post,
            ]);
    }

    public function update(Request $request, Comment $comment)
    {
        // dd($request);
        $this->validate($request, Tweet::$rules);
        $post = Tweet::find($request->id);
        // ポストに紐づいたUser_idを持ってきて情報を代入
            $post_user = User::find($post->user_id);
        $login_user = Auth::user();
        // dd($post);
        $post_form = $request->all();
        // dd($post_form);
        $total_cost = $post->addmission_fee + $post->purchase_cost;
        // 削除・画像をそのまま・変更によって切り分け
        if ($request->remove == 'true') {
            $post_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = Storage::disk('s3')->putFile('/posts', $post_form['image'], 'public');
            $post->image_path = Storage::disk('s3')->url($path);
        } else {
            $post_form['image_path'] = $post->image_path;
        }

        unset($post_form['_token']);
        unset($post_form['image']);
        unset($post_form['remove']);
        
        $post->fill($post_form)->save();
        // dd($post);
        $total_cost = $post->addmission_fee + $post->purchase_cost;
        
        $users = DB::table('users')->get();
        //ポストに紐づいたUser_idを持ってきて情報を代入
            $users = User::find($post->user_id);
            $post->user_name = $users->name;
            $post->image_icon = $users->image_path;
            $post->created_at = $users->created_at;
        
        $comments = $comment->getComments($post->id);
        $comment_count = $comments->count();
        
        // 合計を産出
        $total_cost = $post->addmission_fee + $post->purchase_cost;
        
        // 情報に紐づいたユーザー情報を取得
        foreach($comments as $comment)
        {
            $post_comment_user = User::find($comment->user_id);
            $comments->user_name = $post_comment_user->name;
            $comments->image_path = $post_comment_user->image_path;
        }
        
        
        return view('admin.posts.show', [
            'login_user' => $login_user, 'post' => $post, 'post_user' => $post_user,
            'total_cost' => $total_cost,
            'comments' => $comments, 'comment_count' => $comment_count
        ]);
    }

    public function delete(Request $request)
    {
        $tweet = Tweet::find($request->id);
        $tweet->delete();

        return back();
    }
}
