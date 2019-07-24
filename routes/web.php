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

Route::group(['prefix' => 'todos'], function () {
    Route::get('public', 'TodoController@publicTodos')->name('todos.public');
    Route::put('{todo}/public', 'TodoController@public')->name('todos.make-public');
    Route::put('{todo}/completed', 'TodoController@completed')->name('todos.completed');
});
Route::resource('todos', 'TodoController');
// Route::get('todos', 'TodoController@index');
