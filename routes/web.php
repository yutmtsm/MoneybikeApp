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

// ログイン状態
Route::group(['middleware' => 'auth'], function() {

    // ユーザ関連
    Route::resource('users', 'Admin\UsersController', ['only' => ['index', 'show', 'edit', 'update']]);

    // フォロー/フォロー解除を追加
    Route::post('users/{user}/follow', 'Admin\UsersController@follow')->name('follow');
    Route::delete('users/{user}/unfollow', 'Admin\UsersController@unfollow')->name('unfollow');
    
    // ツイート関連
    Route::get('mypage/posts', 'Admin\TweetsController@index');
    Route::get('mypage/posts/create', 'Admin\TweetsController@create');
    Route::post('mypage/posts/create', 'Admin\TweetsController@store');
    // Route::post('mypage/posts/show{sightseeing_day}', 'Admin\TweetsController@store');
    Route::get('mypage/posts/delete', 'Admin\TweetsController@delete');
    
    // コメント関連
    Route::resource('comments', 'Admin\CommentsController', ['only' => ['store']]);
    
    // いいね関連
    Route::resource('favorites', 'Admin\FavoritesController', ['only' => ['store', 'destroy']]);
    // Route::post('favorites', 'Admin\FavoritesController@store');
    // Route::get('favorites', 'Admin\FavoritesController@destroy');    
    // マイページの表示
    Route::get('mypage', 'Admin\MoneybikeController@mypage');
    
    // バイク追加画面
    Route::get('mypage/add_bike', 'Admin\BikeController@create');
    Route::post('mypage/add_bike', 'Admin\BikeController@store');
    Route::get('mypage/edit_bike', 'Admin\BikeController@edit');
    Route::post('mypage/edit_bike', 'Admin\BikeController@update');
    Route::get('/mypage/delete', 'Admin\BikeController@delete');
    
    Route::get('/', 'Admin\MoneybikeController@mypage');
});
    


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
