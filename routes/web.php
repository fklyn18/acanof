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

/** Login con facebook **/
Route::get('/auth/facebook/redirect', 'SocialController@fredirect')->name('facebook-redirect');
Route::get('/auth/facebook/callback', 'SocialController@fcallback')->name('facebook-callback');
