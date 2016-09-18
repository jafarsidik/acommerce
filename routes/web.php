<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return redirect('/facebook');
});

Route::get('/facebook',function(){
	return view('facebook');
});

Route::get('/twitter',function(){
	return view('twitter');
});

Route::get('/googleplus',function(){
	return view('googleplus');
});

Route::get('/auth/facebook','SocialiteAuth@facebookRedirectToProvider');
Route::get('/auth/facebook/callback','SocialiteAuth@facebookHandleProviderCallback');
Route::get('/auth/facebook/logout','SocialiteAuth@facebookLogout');

Route::get('/auth/twitter','SocialiteAuth@twitterRedirectToProvider');
Route::get('/auth/twitter/callback','SocialiteAuth@twitterHandleProviderCallback');
Route::get('/auth/twitter/logout','SocialiteAuth@twitterLogout');

Route::get('/auth/google','SocialiteAuth@googleRedirectToProvider');
Route::get('/auth/google/callback','SocialiteAuth@googleHandleProviderCallback');
Route::get('/auth/google/logout','SocialiteAuth@googleLogout');

Route::post('/post/facebook','SocialitePost@postFacebook');
Route::post('/post/twitter','SocialitePost@postTwitter');
Route::post('/post/google','SocialitePost@postGoogle');
