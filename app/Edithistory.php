<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edithistory extends Model
{
    //
    protected $fillable = [
        'title', 'text', 'edited_at'
    ];
}
