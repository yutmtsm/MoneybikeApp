<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
            $path = $request->file('image')->store('public/image/bike');
            //画像のパス先を格納
            $mybike->image_path = basename($path);
            // $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
            // $news->image_path = Storage::disk('s3')->url($path);
        } else {
            $mybike->image_path = "noimage.png";
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
        // dd($mybike);
        if(empty($mybike)){
            abort(404);
        }
        
        return view('admin.bikes.edit', ['mybike_form' => $mybike]);
    }
    
    public function update(Request $request)
    {
        // dd($request->manufacturer);
        $mybike = Bike::find($request->id);
        // dd($mybike);
        
        $mybike_form = $request->all();
        // dd($mybike_form);
        if($request->remove == 'true'){
            // 削除にチェックを入れた場合
            $mybike_form['image_path'] = null;
        } elseif($request->file('image')){
            // 画像を変更した場合
            $path = $request->file('image')->store('public/image/bike');
            $mybike->image_path = basename($path);
        } else {
            // 変更しなかった場合
            $mybike_form['image_path'] = $mybike->image_path;
        }
        
        unset($mybike_form['_token']);
        unset($mybike_form['image']);
        unset($mybike_form['remove']);
        
        $mybike->fill($mybike_form);
        // dd($mybike);
        $mybike->save;
        // dd($mybike);
        
        return redirect('mypage');
    }
    
    public function delete(Request $request)
    {
        $mybike = Bike::find($request->id);
        // dd($mybike);
        
        $mybike->delete();
        
        //dd($post);
        return redirect('mypage');
    }
    
    
}
