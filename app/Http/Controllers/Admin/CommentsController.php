<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Comment;
use Illuminate\Support\Facades\Storage;

class CommentsController extends Controller
{
    public function store(Request $request, Comment $comment)
    {
        // dd($request);
        $user = auth()->user();
        $data = $request->all();
        // dd($data);
        $validator = Validator::make($data, [
            'tweet_id' =>['required', 'integer'],
            'text'     => ['required', 'string', 'max:140']
        ]);
        // dd($data);
        $validator->validate();
        $comment->commentStore($user->id, $data);
        // dd($comment);
        return back();
    }

}
