<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Money extends Model
{
    //
    // 対象月の投稿記事を取得する
    public function month_posts($year, $month)
    {
        return $this->whereYear('created_at', $year)->whereMonth('created_at', $month)->get();
    }
}
