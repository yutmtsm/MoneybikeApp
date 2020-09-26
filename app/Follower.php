<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $primaryKey = [
        'following_id',
        'followed_id'
    ];
    protected $fillable = [
        'following_id',
        'followed_id'
    ];
    public $timestamps = false;
    public $incrementing = false;
    
    // フォローしているユーザーID
    public function getFollowingUsersId($user_id)
    {
        return $this->where('following_id', $user_id)->get('followed_id');
    }
    
    // フォローされているユーザーID
    public function getFollowedUsersId($user_id)
    {
        return $this->where('followed_id', $user_id)->get('following_id');
    }
    
    // フォローしてるユーザー数
    //フォローしているユーザーID。| following_id（対象） | followed_id（被対象） |で表現する為。followed_idを取得 
    public function getFollowCount($user_id)
    {
        return $this->where('following_id', $user_id)->count();
    }
    
    // フォローされているユーザー数
    //フォローされているユーザーID。| following_id（被対象） | followed_id（対象） |で表現する為。following_idを取得 
    public function getFollowerCount($user_id)
    {
        return $this->where('followed_id', $user_id)->count();
    }
    
     // フォローしているユーザのIDを取得
    public function followingIds(Int $user_id)
    {
        return $this->where('following_id', $user_id)->get('followed_id');
    }
    
    // 一覧画面
    public function getTimeLines(Int $user_id, Array $follow_ids)
    {
        // 自身とフォローしているユーザIDを結合する
        $follow_ids[] = $user_id;
        return $this->whereIn('user_id', $follow_ids)->orderBy('created_at', 'DESC')->paginate(50);
    }
}