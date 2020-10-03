<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Tweet extends Model
{
    // use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text',
        'title',
        'pref',
        'spot',
        'addmission_fee',
        'purchase_cost',
        'image_path',
        'sightseeing_day'
    ];
    
    public static $rules = array(
        'title' => 'required | max:50',
        'spot' => 'required | max:50',
        'pref' => 'required | max:50',
        'addmission-fee' => 'numeric',
        'purchase-cost' => 'numeric',
        'text' => 'required | max:400',
        'addmission-fee' => 'numeric',
    );

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    // $user_idの入れようによっては・・・
    public function getUserTimeLine( $user_id)
    {
        return $this->where('user_id', $user_id)->orderBy('created_at', 'DESC')->simplePaginate(4);
    }
    
    public function getTweetCount( $user_id)
    {
        return $this->where('user_id', $user_id)->count();
    }
    
    // 自分の投稿を含む全てを取得
    public function getTimeLines(Int $user_id, Array $follow_ids)
    {
        $follow_ids[] = $user_id;
        return $this->whereIn('user_id', $follow_ids)->orderBy('created_at', 'DESC')->paginate(50);
    }
    // 自分のは抜く＆フォローしているユーザーの投稿
    public function getOtherTimeLines(Int $login_user_id, Array $follow_ids)
    {
        return $this->where('user_id', '<>', $login_user_id)->whereIn('user_id', $follow_ids)->orderBy('created_at', 'DESC')->paginate(50);
    }
    // 自分のは抜く全ての投稿を取得
    public function getOthersTimeLines(Int $user_id)
    {
        // 自身とフォローしているユーザIDを結合する
        return $this->where('id', '<>', $user_id)->orderByDesc('created_at')->simplePaginate(10);
    }
    // すべての投稿を取得
    public function getAllTimeLines()
    {
        return $this->orderByDesc('created_at')->simplePaginate(10);
    }
    // 年間記事を取得い
    public function getYearTimelines($user_id, $year)
    {
        return $this->where('user_id', $user_id)->whereYear('created_at', $year)->get();
    }
    // 月の記事を算出
    public function getMonthTimeLines($user_id, $year, $month)
    {
        return $this->where('user_id', $user_id)->whereYear('created_at', $year)->whereMonth('created_at', $month)->get();
    }
    // 指定された期間の投稿を取得
    public static function getDate($id, $from, $until)
    {
        //created_atが20xx/xx/xx ~ 20xx/xx/xxのデータを取得
        $date = Tweet::whereBetween("created_at", [$from, $until])->where('user_id', $id)->get();

        return $date;
    }
    
    // 詳細画面
    public function getTweet( $tweet_id)
    {
        return $this->with('user')->where('id', $tweet_id)->first();
    }
    // 特定の日付の投稿を取得
    public function getDayTweet($user_id, $year, $month, $day)
    {
        return Tweet::whereYear("created_at", $year)->whereMonth("created_at", $month)
        ->whereDay("created_at", $day)->where('user_id', $user_id)->get();
        
        return $this->with('user')->where('id', $tweet_id)->first();
    }
    // 受け取った投稿記事のID・テキストを$dataで受け取り処理
    public function tweetStore(Int $user_id, Array $data)
    {
        $this->user_id = $user_id;
        $this->text = $data['text'];
        $this->save();

        return;
    }
    // 対象記事を取得
    public function getEditTweet(Int $user_id, Int $tweet_id)
    {
        return $this->where('user_id', $user_id)->where('id', $tweet_id)->first();
    }
    
    public function tweetUpdate(Int $tweet_id, Array $data)
    {
        $this->id = $tweet_id;
        $this->text = $data['text'];
        $this->update();

        return;
    }
    // 投稿記事の削除
    public function tweetDestroy(Int $user_id, Int $tweet_id)
    {
        return $this->where('user_id', $user_id)->where('id', $tweet_id)->delete();
    }
    
    public function getYear($date)
    {
        return substr($date, 0, 4);
    }
    
    public function getMonth($date)
    {
        return substr($date, 5, 2);
    }
    
    public function getDay($date)
    {
        return substr($date, 8, 2);
    }
}