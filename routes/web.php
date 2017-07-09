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
Route::get('/auth/redirect/facebook', 'SocialController@facebookRedirect')->name('facebook-redirect');
Route::get('/auth/callback/facebook', 'SocialController@facebookCallback')->name('facebook-callback');
/** Login con google **/
Route::get('/auth/redirect/google', 'SocialController@googleRedirect')->name('google-redirect');
Route::get('/auth/callback/google', 'SocialController@googleCallback')->name('google-callback');
/** Login con linkedin **/
Route::get('/auth/redirect/linkedin', 'SocialController@linkedinRedirect')->name('linkedin-redirect');
Route::get('/auth/callback/linkedin', 'SocialController@linkedinCallback')->name('linkedin-callback');
