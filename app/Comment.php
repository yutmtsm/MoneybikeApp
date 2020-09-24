<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // ユーザーに紐づいたコメントの取得
    public function getComments(Int $tweet_id)
    {
        return $this->with('user')->where('tweet_id', $tweet_id)->get();
    }
    // 受け取った投稿記事のID・テキストを$dataで受け取り処理
    public function commentStore(Int $user_id, Array $data)
    {
        // dd($data);
        $this->user_id = $user_id;
        $this->tweet_id = $data['tweet_id'];
        $this->text = $data['text'];
        $this->save();

        return;
    }
}