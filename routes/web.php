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

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::resource('/student','StudentControllerResource');

Route::get('/student/create','StudentControllerResource@create')->name('c');
Route::get('/student/edit/{id}','StudentControllerResource@edit');
Route::post('/student/update/{id}','StudentControllerResource@update');
Route::get('/student/delete/{id}','StudentControllerResource@destroy');
Route::get('/','StudentControllerResource@index');

Route::get('/todo','TodoController@ret_todo');
Route::post('/todosave','TodoController@save_todo');
Route::post('/inworksave','TodoController@save_inwork');
Route::post('/donesave','TodoController@save_done');
Route::get('/todotask','TodoController@todo_task');

Route::post('/todosave/update','TodoController@save_todo_update');
