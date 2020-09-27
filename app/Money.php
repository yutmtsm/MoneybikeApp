<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Money extends Model
{
    //
    protected $dates = ['public_date'];
    
    // 対象月の投稿記事を取得する
    public function month_posts($year, $month)
    {
        return $this->whereYear('created_at', $year)->whereMonth('created_at', $month)->get();
    }
    
    // 1ヶ月＋する
    public function getNextMonth($year_month)
    {
        $year = substr( $year_month, 0, 4);
        $month = substr( $year_month, 5, 2);
        dd($month);
        $month = (int)($month) + 1;
        dd($month);
        if($month >= 12){
            $year += 1;
            $month = 1;
        }
        $month = str_pad($month, 2, 0, STR_PAD_LEFT);
        $year_month = $year . "-" . $month;
        return $year_month;
    }
    // 1ヶ月ーする
    public function getLastMonth($year_month)
    {
        $year = substr( $year_month, 0, 4);
        $month = substr( $year_month, 5, 2);
        $month = (int)($month) - 1;
        if($month <= 1){
            $year -= 1;
            $month = 12;
        }
        $month = str_pad($month, 2, 0, STR_PAD_LEFT);
        $year_month = $year . "-" . $month;
        return $year_month;
    }
}
