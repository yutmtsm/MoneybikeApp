<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Bike;
use Auth;

class BikeController extends Controller
{
    //
    public function create()
    {
        return view('admin.bikes.create');
    }
    
    public function store(Request $request)
    {
        $form = $request->all();
        $mybike = new Bike;
        $user = Auth::user();
        
        // userと関連付け
        $mybike->user_id = $user->id;
        
        if(isset($form['image'])){
            //画像をStrange内に格納し、パスを代入
            $path = Storage::disk('s3')->putFile('/bikes', $form['image'], 'public');
            //画像のパス先を格納
            $mybike->image_path = Storage::disk('s3')->url($path);
        } else {
            $mybike->image_path = "https://yutmtsm.s3.ap-northeast-1.amazonaws.com/z6L5P9QTOHolCDoQUx9s0bRY6LoeQfZgSho7StYu.png";
        }
        unset($form['image']);
        unset($form['_token']);
        
        $mybike->fill($form);
        $mybike->save();
        
        return redirect('mypage');
    }
    
    public function edit(Request $request)
    {
        $mybike = Bike::find($request->id);
        
        if(empty($mybike)){
            abort(404);
        }
        return view('admin.bikes.edit', ['mybike_form' => $mybike]);
    }
    
    public function update(Request $request)
    {
        // dd($request->manufacturer);
        $mybike = Bike::find($request->id);
        
        
        $mybike_form = $request->all();
        
        if($request->remove == 'true'){
            // 削除にチェックを入れた場合
            $mybike_form['image_path'] = "https://yutmtsm.s3.ap-northeast-1.amazonaws.com/z6L5P9QTOHolCDoQUx9s0bRY6LoeQfZgSho7StYu.png";
        } elseif($request->file('image')){
            // 画像を変更した場合
            // $path = $request->file('image')->store('public/image/bike');
            // $mybike->image_path = basename($path);
            $path = Storage::disk('s3')->putFile('/bikes', $mybike_form['image'], 'public');
            $mybike->image_path = Storage::disk('s3')->url($path);
        } else {
            // 変更しなかった場合
            $mybike_form['image_path'] = $mybike->image_path;
        }
        
        unset($mybike_form['_token']);
        unset($mybike_form['image']);
        unset($mybike_form['remove']);
        
        $mybike->fill($mybike_form);
        
        $mybike->save;
        
        
        return redirect('mypage');
    }
    
    public function delete(Request $request)
    {
        $mybike = Bike::find($request->id);
        
        $mybike->delete();
        
        return redirect('mypage');
    }
    
    
}
