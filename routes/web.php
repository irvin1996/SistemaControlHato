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

//INICIO MANTENIMIENTOS

//Tipo Evento
//Index
Route::get('/TipoEvento',['uses'=>'TipoEventoController@getIndexTipoEvento'] )->name('TipoEvento.index')->middleware('auth');
//Create
Route::get('/TipoEventoCreate',['uses'=>'TipoEventoController@getTipoEventoCreate'] )->name('TipoEvento.create')->middleware('auth');
Route::post('/tipoEventoCrear',['uses'=>'TipoEventoController@postTipoEventoCreate'])->name('tipoEvento.crear')->middleware('auth');
//Edit
Route::get('/tipoEventoedit/{id}',['uses'=>'TipoEventoController@getTipoEventoEditar'])->name('TipoEvento.edit')->middleware('auth');
Route::post('/TipoEvento/Update',['uses'=>'TipoEventoController@postTipoEventoUpdate'])->name('EventType.update')->middleware('auth');
//Remove-SoftDeletes
Route::get('/TipoEvento/delete/{id}',['uses'=>'TipoEventoController@destroyEventType'] )->name('EventType.delete')->middleware('auth');
//Restaurar un solo elementos
Route::get('/TipoEvento/restore/{id}',['uses'=>'TipoEventoController@TipoEventoRestore'] )->name('EventType.restore')->middleware('auth');


//RAZA
//Index
Route::get('/Raza',['uses'=>'RazaController@getIndexRaza'] )->name('Raza.index')->middleware('auth');
//Create
Route::get('/RazaCreate',['uses'=>'RazaController@getRazaCreate'] )->name('Raza.create')->middleware('auth');
Route::post('/RazaCrear',['uses'=>'RazaController@postRazaCreate'])->name('Raza.crear')->middleware('auth');
//Edit
Route::get('/Razaedit/{id}',['uses'=>'RazaController@getRazaEditar'])->name('Raza.edit')->middleware('auth');
Route::post('/Raza/Update',['uses'=>'RazaController@postRazaUpdate'])->name('Raza.update')->middleware('auth');
//Remove-SoftDeletes
Route::get('/Raza/delete/{id}',['uses'=>'RazaController@destroyRaza'] )->name('Raza.delete')->middleware('auth');
//Restaurar un solo elementos
Route::get('/Raza/restore/{id}',['uses'=>'RazaController@RazaRestore'] )->name('Raza.restore')->middleware('auth');



//CATEGORIA
//Index
Route::get('/Categoria',['uses'=>'CategoriaController@getIndexCategoria'] )->name('Categoria.index')->middleware('auth');
//Create
Route::get('/CategoriaCreate',['uses'=>'CategoriaController@getCategoriaCreate'] )->name('Categoria.create')->middleware('auth');
Route::post('/CategoriaCrear',['uses'=>'CategoriaController@postCategoriaCreate'])->name('Categoria.crear')->middleware('auth');
//Edit
Route::get('/Categoriaedit/{id}',['uses'=>'CategoriaController@getCategoriaEditar'])->name('Categoria.edit')->middleware('auth');
Route::post('/Categoria/Update',['uses'=>'CategoriaController@postCategoriaUpdate'])->name('Categoria.update')->middleware('auth');
//Remove-SoftDeletes
Route::get('/Categoria/delete/{id}',['uses'=>'CategoriaController@destroyCategoria'] )->name('Categoria.delete')->middleware('auth');

//Restaurar un solo elementos
Route::get('/Categoria/restore/{id}',['uses'=>'CategoriaController@CategoriaRestore'] )->name('Categoria.restore')->middleware('auth');

//PAJILLA

//Index
Route::get('/Pajilla',['uses'=>'PajillaController@getIndexPajilla'] )->name('Pajilla.index')->middleware('auth');
//Create
Route::get('/PajillaCreate',['uses'=>'PajillaController@getPajillaCreate'] )->name('Pajilla.create')->middleware('auth');
Route::post('/PajillaCrear',['uses'=>'PajillaController@postPajillaCreate'])->name('Pajilla.crear')->middleware('auth');
//Edit
Route::get('/Pajillaedit/{id}',['uses'=>'PajillaController@getPajillaEditar'])->name('Pajilla.edit')->middleware('auth');
Route::post('/Pajilla/Update',['uses'=>'PajillaController@postPajillaUpdate'])->name('Pajilla.update')->middleware('auth');
//Remove-SoftDeletes
Route::get('/Pajilla/delete/{id}',['uses'=>'PajillaController@destroyPajilla'] )->name('Pajilla.delete')->middleware('auth');
//Restaurar un solo elementos
Route::get('/Pajilla/restore/{id}',['uses'=>'PajillaController@PajillaRestore'] )->name('Pajilla.restore')->middleware('auth');


//Mineral

Route::group(['prefix'=>'miner','middleware'=>'auth'],function(){
//Index
Route::get('/Mineral',['uses'=>'MineralController@getIndexMineral'] )->name('miner.index')->middleware('auth');
//Create
Route::get('/MineralCreate',['uses'=>'MineralController@getMineralCreate'] )->name('miner.create')->middleware('auth');
Route::post('/MineralCrear',['uses'=>'MineralController@postMineralCreate'])->name('miner.crear')->middleware('auth');
//Edit
Route::get('/MineralEdit/{id}',['uses'=>'MineralController@getMineralEditar'])->name('miner.edit')->middleware('auth');
Route::post('/Mineral/Update',['uses'=>'MineralController@postMineralUpdate'])->name('miner.update')->middleware('auth');
//Remove-SoftDeletes
Route::get('/Mineral/delete/{id}',['uses'=>'MineralController@destroyMineral'] )->name('miner.delete')->middleware('auth');
//Restaurar un solo elementos
Route::get('/Mineral/restore/{id}',['uses'=>'MineralController@MineralRestore'] )->name('miner.restore')->middleware('auth');
});

//Rol

Route::group(['prefix'=>'roles','middleware'=>'auth'],function(){
//Index
Route::get('/Roles',['uses'=>'RoleController@getIndexRol'] )->name('roles.index')->middleware('auth');
//Create
Route::get('/RolesCreate',['uses'=>'RoleController@getRolCreate'] )->name('roles.create')->middleware('auth');
Route::post('/RolesCrear',['uses'=>'RoleController@postRolCreate'])->name('roles.crear')->middleware('auth');
//Edit
Route::get('/RolesEdit/{id}',['uses'=>'RoleController@getRolEditar'])->name('roles.edit')->middleware('auth');
Route::post('/Roles/Update',['uses'=>'RoleController@postRolUpdate'])->name('roles.update')->middleware('auth');
//Remove-SoftDeletes
Route::get('/Roles/delete/{id}',['uses'=>'RoleController@destroyRol'] )->name('roles.delete')->middleware('auth');
//Restaurar un solo elementos
Route::get('/Roles/restore/{id}',['uses'=>'RoleController@RolRestore'] )->name('roles.restore')->middleware('auth');
});

//Permiso

Route::group(['prefix'=>'permisos','middleware'=>'auth'],function(){
//Index
Route::get('/Permisos',['uses'=>'PermisosController@getIndexPermiso'] )->name('permisos.index')->middleware('auth');
//Create
Route::get('/PermisosCreate',['uses'=>'PermisosController@getPermisoCreate'] )->name('permisos.create')->middleware('auth');
Route::post('/PermisosCrear',['uses'=>'PermisosController@postPermisoCreate'])->name('permisos.crear')->middleware('auth');
//Edit
Route::get('/PermisosEdit/{id}',['uses'=>'PermisosController@getPermisoEditar'])->name('permisos.edit')->middleware('auth');
Route::post('/Permisos/Update',['uses'=>'PermisosController@postPermisoUpdate'])->name('permisos.update')->middleware('auth');
//Remove-SoftDeletes
Route::get('/Permisos/delete/{id}',['uses'=>'PermisosController@destroyPermiso'] )->name('permisos.delete')->middleware('auth');
//Restaurar un solo elementos
Route::get('/Permisos/restore/{id}',['uses'=>'PermisosController@PermisoRestore'] )->name('permisos.restore')->middleware('auth');
});



//FIN MANTENIMIENTOS



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
