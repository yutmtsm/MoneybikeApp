<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// ログイン状態
Route::group(['middleware' => 'auth'], function() {

    // ユーザ関連
    Route::resource('users', 'Admin\UsersController', ['only' => ['index', 'show', 'edit', 'update']]);

    // フォロー/フォロー解除を追加
    Route::post('users/{user}/follow', 'Admin\UsersController@follow')->name('follow');
    Route::delete('users/{user}/unfollow', 'Admin\UsersController@unfollow')->name('unfollow');
    
    // ツイート関連
    Route::resource('mypage/posts', 'Admin\TweetsController', ['only' => ['index', 'store', 'show', 'edit', 'update', 'destroy']]);
    Route::get('mypage/posts', 'Admin\TweetsController@create');
    
    // コメント関連
    Route::resource('comments', 'Admin\CommentsController', ['only' => ['store']]);
    
    // いいね関連
    Route::resource('favorites', 'Admin\FavoritesController', ['only' => ['store', 'destroy']]);
    
    // マイページの表示
    Route::get('/mypage', 'Admin\MoneybikeController@mypage');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
