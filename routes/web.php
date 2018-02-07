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
Auth::routes();

Route::get('/', ['uses' => 'PostsController@index']);

Route::get('/auth/login', function () {
    return view('auth.login');
});

Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
    Route::get('', ['as' => 'index', 'uses' => 'PostsController@index']);
    Route::post('{draft}', ['as' => 'store', 'uses' => 'PostsController@store']);
    Route::get('{post}', ['as' => 'show', 'uses' => 'PostsController@show']);
});

Route::group(['prefix' => 'drafts', 'as' => 'drafts.', 'middleware' => ['auth']], function () {
    Route::get('', ['as' => 'index', 'uses' => 'DraftsController@index']);
    Route::get('create', ['as' => 'create', 'uses' => 'DraftsController@create']);
    Route::post('store', ['as' => 'store', 'uses' => 'DraftsController@store']);
    Route::get('{draft}', ['as' => 'show', 'uses' => 'DraftsController@show']);   
});
