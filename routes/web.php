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

/*************************
 * Login redes sociales  *
 *************************/
/** Login con facebook **/
Route::get('/auth/facebook/redirect', 'SocialController@facebookRedirect')->name('facebook-redirect');
Route::get('/auth/facebook/callback', 'SocialController@facebookCallback')->name('facebook-callback');
/** Login con google **/
Route::get('/auth/google/redirect', 'SocialController@googleRedirect')->name('google-redirect');
Route::get('/auth/google/callback', 'SocialController@googleCallback')->name('google-callback');
