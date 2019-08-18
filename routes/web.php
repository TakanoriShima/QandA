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

Route::get('/', 'FrontController@index');
// Resourceful Routing
Auth::routes();
Route::resource('categories', 'CategoryController');
Route::resource('posts', 'PostController');
Route::resource('comments', 'CommentsController');

#Route::get('/category', 'CategoryController@index');
#Route::get('/ranking', 'RankingController@index');
#Route::get('/tout', 'ToutController@index');
#Route::get('/mon_page', 'MonpageController@index')
#->middleware('auth');
// Route::get('/home', 'FrontController@index');
// Route::get('/store', 'PostController@create')
// ->middleware('auth');
// Route::get('comment','CommentsController@index');