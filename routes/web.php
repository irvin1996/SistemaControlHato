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

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

//MANTENIMIENTOS

//Tipo Evento
//Index
Route::get('/TipoEvento',['uses'=>'TipoEventoController@getIndexTipoEvento'] )->name('TipoEvento.index')->middleware('auth');
//Create
Route::get('/TipoEventoCreate',['uses'=>'TipoEventoController@getTipoEventoCreate'] )->name('TipoEvento.create')->middleware('auth');
Route::post('/tipoEventoCrear',['uses'=>'TipoEventoController@postTipoEventoCreate'])->name('tipoEvento.crear')->middleware('auth');
//Edit
Route::get('/tipoEventoedit/{id}',['uses'=>'TipoEventoController@getTipoEventoEditar'])->name('TipoEvento.edit')->middleware('auth');
Route::post('/Update',['uses'=>'TipoEventoController@postTipoEventoUpdate'])->name('EventType.update')->middleware('auth');
//Remove-SoftDeletes

Route::get('/TipoEvento/delete/{id}',['uses'=>'TipoEventoController@destroyEventType'] )->name('EventType.delete')->middleware('auth');

//Restaurar un solo elementos
Route::get('/TipoEvento/restore/{id}',['uses'=>'TipoEventoController@TipoEventoRestore'] )->name('EventType.restore')->middleware('auth');



Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});
