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
    return "Hello World. Meu primeiro App Laravel. <br> Listar posts <a href='/posts'>Listar posts</a>";
});

Route::get('/posts','PostsController@index');
Route::post('/posts','PostsController@create');
Route::put('/posts/{id}','PostsController@update');
Route::delete('/posts/{id}','PostsController@delete');

