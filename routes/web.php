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

Route::get('a',"UserController@store");
Route::get('ab',"UserController@echo");
Route::get('rset',"UserController@redisSet");
Route::get('rhset',"UserController@redisJson");
Route::get('test',"UserController@test");
Route::get('publish',"UserController@redisPublish");
Route::get('psubscribe',"UserController@redisPsubscribe");
