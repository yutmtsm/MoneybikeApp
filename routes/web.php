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
    Route::get('mypage/posts', 'Admin\PostsController@index');
    Route::get('mypage/posts/create', 'Admin\PostsController@create');
    Route::post('mypage/posts/create', 'Admin\PostsController@store');
    
    // コメント関連
    Route::resource('comments', 'Admin\CommentsController', ['only' => ['store']]);
    
    // いいね関連
    Route::resource('favorites', 'Admin\FavoritesController', ['only' => ['store', 'destroy']]);
    
    // マイページの表示
    Route::get('mypage', 'Admin\MoneybikeController@mypage');
    
    // バイク追加画面
    Route::get('mypage/add_bike', 'Admin\BikeController@create');
    Route::post('mypage/add_bike', 'Admin\BikeController@store');
    Route::get('mypage/edit_bike', 'Admin\BikeController@edit');
    Route::post('mypage/edit_bike', 'Admin\BikeController@update');
    Route::get('/mypage/delete', 'Admin\BikeController@delete');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
