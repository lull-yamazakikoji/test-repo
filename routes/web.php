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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('loginView');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@registerView');
Route::post('/register/post', 'Auth\RegisterController@registerPost');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::group(['middleware' => 'auth'],function(){
Route::get('/top','PostsController@index');
Route::get('/logout','Auth\LoginController@logout');

Route::post('/postCreate','PostsController@postCreate');
Route::post('/postEdit','PostsController@postEdit');
Route::get('/postDelete/{id}','PostsController@postDelete');


Route::get('/profile','UsersController@profile');
Route::post('/userUpdate','UsersController@userUpdate');

Route::get('/search','UsersController@search');
Route::get('/userSearch','UsersController@userSearch');

Route::get('/follow-list','FollowsController@followList');
Route::get('/follower-list','FollowsController@followerList');

Route::get('/follow/{id}','FollowsController@follow');
Route::get('/unfollow/{id}','FollowsController@unfollow');

});
