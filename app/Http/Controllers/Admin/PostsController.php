<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Comment;
use App\User;
use App\Post;
use App\Follower;
use Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post, Follower $follower)
    {
        $user = Auth::user();
        $follow_ids = $follower->followingIds($user->id);
        // followed_idだけ抜き出す
        $following_ids = $follow_ids->pluck('followed_id')->toArray();

        $timelines = $post->getTimelines($user->id, $following_ids);
        dd($timelines);
        return view('posts.index', [
            'user'      => $user,
            'timelines' => $timelines
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Post::$rules);
        // dd($request);
        $post = new Post;
        $user = Auth::user();
        //userと関連付け
        $post->user_id = $user->id;
        //dd($post);
        $form = $request->all();
        // dd($form);
        
        if(isset($form['image'])){
            //画像をStrange内に格納し、パスを代入
            $path = $request->file('image')->store('public/image/posts');
            //画像のパス先を格納
            $post->image_path = basename($path);
            // $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
            // $news->image_path = Storage::disk('s3')->url($path);
        } else {
            $post->image_path = null;
        }
        // dd($form);
        
        unset($form['_token']);
        dd($form);
        $post->fill($form);
        dd($post);
        $post->save();
        dd($post);

        return redirect('mypage/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $tweet, Comment $comment)
    {
        $user = auth()->user();
        $tweet = $tweet->getTweet($tweet->id);
        $comments = $comment->getComments($tweet->id);

        return view('tweets.show', [
            'user'     => $user,
            'tweet' => $tweet,
            'comments' => $comments
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $tweet)
    {
        $user = auth()->user();
        $tweets = $tweet->getEditTweet($user->id, $tweet->id);

        if (!isset($tweets)) {
            return redirect('tweets');
        }

        return view('tweets.edit', [
            'user'   => $user,
            'tweets' => $tweets
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $tweet)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'text' => ['required', 'string', 'max:140']
        ]);

        $validator->validate();
        $tweet->tweetUpdate($tweet->id, $data);

        return redirect('tweets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $tweet)
    {
        $user = auth()->user();
        $tweet->tweetDestroy($user->id, $tweet->id);

        return back();
    }
}
