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
//    return view('welcome');
    return view('public.inicio');
});

/*********************
 * Routes protected  *
 *********************/
Route::group(['middleware' => 'auth'], function () {
    Route::get('manage/profiles', 'ProfileController@profiles')->name('all-profiles');
    Route::get ('/profile', 'ProfileController@index')->name('profile');
    Route::post('/profile/store', 'ProfileController@store')->name('store-profile');
    Route::post('/profile/edit', 'ProfileController@edit')->name('edit-profile');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/*************************
 * Login redes sociales  *
 *************************/
/** Login con facebook **/
Route::get ('/auth/redirect/facebook', 'SocialController@facebookRedirect')->name('facebook-redirect');
Route::get ('/auth/callback/facebook', 'SocialController@facebookCallback')->name('facebook-callback');
/** Login con google **/
Route::get ('/auth/redirect/google', 'SocialController@googleRedirect')->name('google-redirect');
Route::get ('/auth/callback/google', 'SocialController@googleCallback')->name('google-callback');
/** Login con linkedin **/
Route::get ('/auth/redirect/linkedin', 'SocialController@linkedinRedirect')->name('linkedin-redirect');
Route::get ('/auth/callback/linkedin', 'SocialController@linkedinCallback')->name('linkedin-callback');

/***********************
 * Cambios de idiomas  *
 ***********************/
Route::post('/language-chooser', 'LanguageController@changeLanguage')->name('language-chooser');
Route::post ('/language', array(
    'before' => 'csrf',
    'uses' => 'LanguageController@changeLanguage'
))->name('language-chooser');
