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
    
    // マイページの表示
    Route::get('mypage', 'Admin\MoneybikeController@mypage');
    Route::get('mypage/myfollowers', 'Admin\UsersController@myfollowers');
    Route::get('mypage/spot_search', 'Admin\MoneybikeController@spot_search');
    Route::get('mypage/spot_search/search', 'Admin\MoneybikeController@search');
    
    // ユーザ関連
    Route::resource('mypage/users', 'Admin\UsersController', ['only' => ['index', 'show', 'edit']]);
    Route::get('mynews/users/edit', 'Admin\UsersController@edit');
    Route::post('mynews/users/edit', 'Admin\UsersController@update');

    // フォロー/フォロー解除を追加
    Route::post('users/{user}/follow', 'Admin\UsersController@follow')->name('follow');
    Route::delete('users/{user}/unfollow', 'Admin\UsersController@unfollow')->name('unfollow');
    
    // ツイート関連
    Route::get('mypage/posts', 'Admin\TweetsController@index');
    Route::get('mypage/posts/create', 'Admin\TweetsController@create');
    Route::post('mypage/posts/create', 'Admin\TweetsController@store');
    Route::get('mypage/posts/detail', 'Admin\TweetsController@show');
    Route::get('mypage/posts/detail/day', 'Admin\TweetsController@showDay');
    Route::get('mypage/posts/detail/edit', 'Admin\TweetsController@edit');
    Route::post('mypage/posts/detail/edit', 'Admin\TweetsController@update');
    Route::get('mypage/posts/delete', 'Admin\TweetsController@delete');

    // コメント関連
    Route::post('mypage/posts/comments', 'Admin\CommentsController@store');
    Route::post('mypage/posts/detail/comments', 'Admin\CommentsController@store');
    
    // いいね関連
    Route::resource('favorites', 'Admin\FavoritesController', ['only' => ['store', 'destroy']]);
    // Route::post('favorites', 'Admin\FavoritesController@store');
    // Route::get('favorites', 'Admin\FavoritesController@destroy');    
    
    // バイク追加画面
    Route::get('mypage/add_bike', 'Admin\BikeController@create');
    Route::post('mypage/add_bike', 'Admin\BikeController@store');
    Route::get('mypage/edit_bike', 'Admin\BikeController@edit');
    Route::post('mypage/edit_bike', 'Admin\BikeController@update');
    Route::get('/mypage/delete', 'Admin\BikeController@delete');
    
    // お金関連
    Route::get('mypage/money', 'Admin\MoneyController@moneypage');
    // Route::get('mypage/other_money', 'Admin\MoneyController@other_moneypage');
    // Route::get('mypage/money', 'Admin\MoneyController@search');
    
    Route::get('/', 'Admin\MoneybikeController@mypage');
    
    // 他人のページ
    Route::get('other_mypage', 'Other\MoneybikeController@mypage');
    Route::get('other_mypage/money', 'Other\MoneyController@moneypage');
});
    


Auth::routes();

Route::get('/', 'MoneybikeController@top');

Route::get('/home', 'HomeController@index')->name('home');
