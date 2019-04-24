<?php
header('Access-Control-Allow-Origin:*');
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

// 春季运动会实时排行榜路由 .
Route::get('/temp', '\App\Http\Controllers\RankController@index');
Route::get('/temp/list', '\App\Http\Controllers\RankController@list');
Route::get('/temp/notice', '\App\Http\Controllers\RankController@notice');
Route::get('/temp/notice2', '\App\Http\Controllers\RankController@notice2');
Route::get('/temp/notice/{post}', '\App\Http\Controllers\RankController@search5');
Route::post('/temp/submit', '\App\Http\Controllers\RankController@submit');
Route::post('/temp/submit2', '\App\Http\Controllers\RankController@submit2');
Route::post('/temp/edit', '\App\Http\Controllers\RankController@edit');
Route::post('/temp/edit2', '\App\Http\Controllers\RankController@edit2');
Route::get('/temp/schedule/{post}', '\App\Http\Controllers\RankController@search2');
Route::get('/temp/place/{post}', '\App\Http\Controllers\RankController@search3');
Route::get('/temp/score/{post}', '\App\Http\Controllers\RankController@search4');
Route::get('/temp/{post}', '\App\Http\Controllers\RankController@search');
Route::get('/temp/{post}/delete', '\App\Http\Controllers\RankController@delete');
Route::post('/temp', '\App\Http\Controllers\RankController@store');
// .


// 文章列表页
Route::get('/posts', '\App\Http\Controllers\PostController@index');
// 创建文章
Route::get('/posts/create', '\App\Http\Controllers\PostController@create');
Route::post('/posts', '\App\Http\Controllers\PostController@store');
// 删除文章
Route::post('/posts/delete', '\App\Http\Controllers\PostController@delete');
// 查找文章
Route::post('/posts/search', '\App\Http\Controllers\PostController@search');
// 编辑文章
Route::get('/posts/{post}/edit', '\App\Http\Controllers\PostController@edit');
Route::post('/posts/{post}', '\App\Http\Controllers\PostController@update');
// 文章详情页
Route::get('/posts/{post}', '\App\Http\Controllers\PostController@show');
// 文章留言
Route::post('/posts/{post}/message', '\App\Http\Controllers\PostController@message');



Route::get('/ranking', '\App\Http\Controllers\RankController@index');
Route::get('/ranking/submit', '\App\Http\Controllers\RankController@submit');
Route::post('/ranking/submit', '\App\Http\Controllers\RankController@form');
Route::get('/ranking/submit/{post}', '\App\Http\Controllers\RankController@put');


