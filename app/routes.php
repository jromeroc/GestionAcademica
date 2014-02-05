<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function(){
	return View::make('home');
});

Route::get('login', 'AuthController@showLogin');
Route::post('login', 'AuthController@postLogin');
Route::get('logout', 'AuthController@getLogout');

/*
	-- Rutas para administración principal
*/
Route::group(array('prefix' => 'administracion'), function(){
	Route::group(array('before' => 'auth'), function(){
		Route::group(array('before' => 'permit'), function(){
			Route::get('/', 'AdministracionController@index');
			/*
			-- Rutas para menu
			*/
			Route::get('menu', 'MenuController@informes');
	        Route::get('menu_nuevo', 'MenuController@nuevo');
	        Route::post('menu_guardar', 'MenuController@guardar');
	        Route::get('menu_editar/{numero}', 'MenuController@editar')->where('numero', '[0-9]+');
	        Route::post('menu_save', 'MenuController@save');
	        Route::get('menu_informes', 'MenuController@informes');
			/*
				-- Rutas para submenu
			*/
			Route::get('submenu', 'SubmenuController@listar');
			Route::get('submenu_nuevo', 'SubmenuController@nuevo');
		    Route::post('submenu_guardar', 'SubmenuController@guardar');
		    Route::get('submenu/editar/{numero}', 'SubmenuController@editar')->where('numero', '[0-9]+');
		    Route::post('submenu_save', 'SubmenuController@save');
		    Route::get('submenu_listar', 'SubmenuController@listar');
		    /*
				-- Rutas para Admon Permisos
			*/
			Route::get('permisos','RoleController@index');	
			Route::get('listado_roles','RoleController@listado');	
			Route::get('permisos_role/{numero}','RoleController@permisos')->where('numero','[0-9]+');	
			Route::post('guardar','RoleController@guardar');	
		});	
	});
});

/*
	-- Rutas para carga académica
*/
Route::group(array('prefix' => 'carga_academica'), function(){
	Route::group(array('before' => 'auth'), function(){
		Route::group(array('before' => 'permit'), function(){
			Route::get('/', 'CargaAcademicaController@report');
			Route::get('nuevo', 'CargaAcademicaController@nuevo');
			Route::get('informes', 'CargaAcademicaController@report');
			Route::get('editar/{carga}', 'CargaAcademicaController@edit')->where('numero','[0-9]');
			Route::get('asignar/{carga}', 'CargaAcademicaController@assign')->where('numero','[0-9]');
			Route::get('eliminar/{carga}', 'CargaAcademicaController@delete')->where('numero','[0-9]');
			Route::group(array('before' => 'csrf'), function(){
				Route::post('nuevo', 'CargaAcademicaController@nuevo');
			});
		});
	});
});


/*
	-- Rutas para logros
*/
Route::group(array('prefix' => 'logros'), function(){
	Route::group(array('before' => 'auth'), function(){
		Route::group(array('before' => 'permit'), function(){
			Route::group(array('before' => 'csrf'), function(){
				Route::post('nuevo/{term}', 'LogrosController@create');
			});
			Route::get('/', 'LogrosController@index');
			Route::get('nuevo', 'LogrosController@create');
			Route::get('editar', 'LogrosController@edit');
			Route::get('informes', 'LogrosController@informes');
		});
	});
});

Route::group(array('prefix' => 'materias'), function(){
	Route::group(array('before' => 'auth'), function(){
		Route::get('buscar', 'MateriasController@buscar');
	});
});

Route::group(array('prefix' => 'observador'), function(){
	Route::group(array('before' => 'auth'), function(){
		Route::group(array('before' => 'permit'), function(){
			Route::get('/', 'ObservadorController@index');
			Route::get('nuevo', 'ObservadorController@nuevo');
			Route::post('nuevo', 'ObservadorController@nuevo');
			Route::get('informe', 'ObservadorController@informe');
			Route::post('informe', 'ObservadorController@informe');
		});
	});
});

Route::group(array('prefix' => 'alumnos'), function(){
	Route::group(array('before' => 'auth'), function(){
		Route::group(array('before' => 'permit'), function(){
			Route::get('/', 'AlumnosController@index');
			Route::get('nuevo', 'AlumnosController@nuevo');
			Route::get('informe', 'AlumnosController@informe');
			
		});
	});
});
