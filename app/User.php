<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'screen_name',
        'name',
        'profile_image',
        'email',
        'password',
        'gender',
        'age',
        'address',
        'profile_image'
    ];
    
    public function bikes(){
        return $this->hasMany('App\Bike');
    }
    
    public function followers()
    {
        return $this->belongsToMany(self::class, 'followers', 'followed_id', 'following_id');
    }

    public function follows()
    {
        return $this->belongsToMany(self::class, 'followers', 'following_id', 'followed_id');
    }
    // 全てのユーザー情報を取得
    public function getAllUsers(Int $user_id)
    {
        return $this->Where('id', '<>', $user_id)->paginate(5);
    }
    
    // フォローする
    public function follow(Int $user_id) 
    {
        return $this->follows()->attach($user_id);
    }

    // フォロー解除する
    public function unfollow(Int $user_id)
    {
        return $this->follows()->detach($user_id);
    }

    // フォローしているか
    public function isFollowing( $user_id) 
    {
        return (boolean) $this->follows()->where('followed_id', $user_id)->first(['id']);
    }

    // フォローされているか
    public function isFollowed( $user_id) 
    {
        return (boolean) $this->followers()->where('following_id', $user_id)->first(['id']);
    }
    // プロフィールの更新
    // public function updateProfile(Array $params)
    // {
    //     if (isset($params['profile_image'])) {
    //         $file_name = $params['profile_image']->store('public/profile_image/');

    //         $this::where('id', $this->id)
    //             ->update([
    //                 'screen_name'   => $params['screen_name'],
    //                 'name'          => $params['name'],
    //                 'profile_image' => basename($file_name),
    //                 'email'         => $params['email'],
    //             ]);
    //     } else {
    //         $this::where('id', $this->id)
    //             ->update([
    //                 'screen_name'   => $params['screen_name'],
    //                 'name'          => $params['name'],
    //                 'email'         => $params['email'],
    //             ]); 
    //     }

    //     return;
    // }
    
    // ログイン以外のユーザー取得
    public function getAllUser($user_id)
    {
        return $this->where('id', '!=', $user_id)->orderByDesc('created_at')->simplePaginate(10);
    }
    
    // フォローしているユーザーの取得
    public function getMyfollowingUser($following_Users_Id)
    {
        return $this->find($following_Users_Id);
    }
    
    // フォローされているユーザーの取得
    public function getMyfollowedUser($followed_Users_Id)
    {
        return $this->find($followed_Users_Id);
    }
}