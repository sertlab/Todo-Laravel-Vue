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
//     $data=[
//         'var1'=>'something',
//         'var2'=>'something',
//         'var3'=>'something',
//               ];
//     return view('twig',compact('data'));
// });

Route::get('/todos', 'SinglePageController@index');

// Todos CRUD Routes
Route::prefix('api')->group(function (){
    Route::post('/todo/create', 'TodoController@store');
    Route::get('/todo/edit/{id}', 'TodoController@edit');
    Route::post('/todo/update/{id}', 'TodoController@update');
    Route::delete('/todo/delete/{id}', 'TodoController@delete');
    Route::get('/todos', 'TodoController@index');
    
});