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
