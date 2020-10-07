<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Mail\HelloEmail;
use Mail;

class ContactController extends Controller
{
    //
    public function index()
    {
        return view('contact.index');
    }
 
    public function send(Request $request)
    {
        // バリデーション
        $rules = [
            'contact_name' => 'required|max:10',
            'contact_email' => 'required|email',
            'contact_item' => 'required',
            'contact_message' => 'required|max:1000',
        ];
 
        $messages = [
            'contact_name.required' => '名前を入力して下さい。',
            'contact_name.max' => '名前は10文字以下で入力して下さい。',
            'contact_email.required' => 'メールアドレスを入力して下さい。',
            'contact_email.email' => '正しいメールアドレスを入力して下さい。',
            'contact_item.required' => '項目を選択してください。',
            'contact_message.required' => 'メッセージを入力して下さい。',
            'contact_message.max' => 'メッセージは1000文字以下で入力して下さい。',
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }
 
        $data = $validator->validate();
        // dd($date);
        // Mailファザードを利用してメールを送信
        Mail::to('yutmtsm@gmail.com')->send(new HelloEmail($data));
        
        // フラッシュデータを保存
        session()->flash('success', '送信いたしました！');
        return back();
    }
}
