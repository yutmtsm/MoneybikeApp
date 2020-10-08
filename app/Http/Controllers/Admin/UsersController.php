<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\User;
use App\Tweet;
use App\Follower;
use Auth;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // dd($user);
        $all_users = $user->getAllUsers(auth()->user()->id);

        return view('users.index', [
            'all_users'  => $all_users, 'user' => $user
        ]);
    }
        
    // フォロー
    public function follow(User $user)
    {
        // ログイン中のユーザー
        $follower = auth()->user();
        // dd($follower);
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if(!$is_following) {
            // フォローしていなければフォローする
            $follower->follow($user->id);
            return back();
        }
    }

    // フォロー解除
    public function unfollow(User $user)
    {
        // ログイン中のユーザー
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if($is_following) {
            // フォローしていればフォローを解除する
            $follower->unfollow($user->id);
            return back();
        }
    }
    
    public function show(User $user, Tweet $tweet, Follower $follower)
    {
        $login_user = auth()->user();
        $is_following = $login_user->isFollowing($user->id);
        $is_followed = $login_user->isFollowed($user->id);
        $timelines = $tweet->getUserTimeLine($user->id);
        $tweet_count = $tweet->getTweetCount($user->id);
        $follow_count = $follower->getFollowCount($user->id);
        $follower_count = $follower->getFollowerCount($user->id);

        return view('users.show', [
            'user'           => $user,
            'is_following'   => $is_following,
            'is_followed'    => $is_followed,
            'timelines'      => $timelines,
            'tweet_count'    => $tweet_count,
            'follow_count'   => $follow_count,
            'follower_count' => $follower_count
        ]);
    }
    
    public function edit(Request $request)
    {
        $user = User::find($request->id);
        return view('admin.users.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $user = User::find($request->id);
        $form = $request->all();
        
        $validator = Validator::make($form, [
            'screen_name'   => ['required', 'string', 'max:50', Rule::unique('users')->ignore($user->id)],
            'name'          => ['required', 'string', 'max:255'],
            'image' => ['file', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'email'         => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)]
        ]);
        $validator->validate();
        
        // 画像の判定処理
        if ($request->remove == 'true') {
            $user->profile_image = "https://yutmtsm.s3.ap-northeast-1.amazonaws.com/users/siiRse9NafrvwM6Te9scdx4yh7osd7SEQMcsDqzq.jpeg";
        } elseif (isset($form['image'])){
            $path = Storage::disk('s3')->putFile('/users',$form['image'],'public');
            $user->profile_image = Storage::disk('s3')->url($path);
        } else {
            $user->profile_image;
        }
        
        unset($form['_token']);
        unset($form['image']);
        unset($form['remove']);
        
        $user->fill($form)->save();
        
        return redirect('/mypage');
    }
    
    public function myfollowers(Tweet $tweet, Follower $follower)
    {
        $user = auth()->user();
        // dd($user);
        $is_following = $user->isFollowing($user->id);
        $is_followed = $user->isFollowed($user->id);
        // フォローフォロワー情報の取得
        $following_Users_Id = $follower->getFollowingUsersId($user->id);
        $followed_Users_Id = $follower->getFollowedUsersId($user->id);
        $following_Users = $user->find($following_Users_Id);
        $followed_Users = $user->find($followed_Users_Id);
        // カウント数
        $tweet_count = $tweet->getTweetCount($user->id);
        $follow_count = $follower->getFollowCount($user->id);
        $follower_count = $follower->getFollowerCount($user->id);

        return view('admin.users.myfollowers', [
            'user'           => $user,
            'is_following'   => $is_following,
            'is_followed'    => $is_followed,
            'following_Users'      => $following_Users,
            'followed_Users'      => $followed_Users,
            'tweet_count'    => $tweet_count,
            'follow_count'   => $follow_count,
            'follower_count' => $follower_count
        ]);
    }

}