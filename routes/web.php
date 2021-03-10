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

Route::get('/', 'PostController@latest_posts');

Route::get('/{y}/{m}/{d}/{url}', 'PostController@get_post');

Route::post('/{y}/{m}/{d}/{url}', 'CommentController@insert_comment');

Route::get('/editor/{name}', 'PostController@latest_posts');

/*admin*/

Route::get('/edit-articles', function () {
    return view('admin.pages.posts');
})->middleware('auth');

Route::post('/edit-articles', 'PostController@edit_post')->name('edit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout')->name('logout');
