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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix'=>'actividad'],function(){
    Route::get('list/{id}', 'ActividadController@list');
    Route::post('save', 'ActividadController@save');
    Route::put('update/{actividad}', 'ActividadController@update');
    Route::delete('delete/{id}', 'ActividadController@delete');
});

Route::group(['prefix'=>'tiempo'],function(){
    Route::get('list/{id}', 'TiempoController@list');
    Route::post('save', 'TiempoController@save');
    Route::put('update/{tiempo}', 'TiempoController@update');
    Route::delete('delete/{id}', 'TiempoController@delete');
});