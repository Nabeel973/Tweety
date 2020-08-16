<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function() {
    Route::resource('tweets', 'TweetController', ['except' => ['create','show']]);
});
Route::get('/profiles/{user:username}','ProfileController@show')->name('profile');
Route::get('/profiles/{user:username}/edit','ProfileController@edit')->name('profile.edit')->middleware('can:edit,user');
Route::patch('/profiles/{user:username}','ProfileController@update')->name('profile.update');

Route::post('/profiles/{user}/follow','FollowController@store')->name('follow');
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

Route::post('/tweets/{tweet}/like','TweetLikesController@store');
Route::delete('/tweets/{tweet}/like','TweetLikesController@destroy');

Route::get('/explore','ExploreController');

Auth::routes();

