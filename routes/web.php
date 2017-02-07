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



Route::group(['middleware' => ['web']], function(){
	Route::get('servidores', 'Servidores@index');
	Route::get('servidores.show', 'Servidores@show');
	Route::get('servidores.create', 'Servidores@create');
	Route::get('servidores/{servidor}/edit','Servidores@edit');
	//Route::get('servidores.edit', 'Servidores@edit');
	Route::get('/', function () {
  	  return view('welcome');
	});

	Route::post('criarServidor', 'Servidores@store');
	
	Route::patch('editarServidor/{servidor}', 'Servidores@atualizar');
	Route::patch('servidores/{servidor}','Servidores@update');

	Route::delete('servidores/{servidor}','Servidores@destroy');
	Auth::routes();

	//Route::get('/home', 'HomeController@index');
	Route::get('/home', 'Servidores@index');
});

