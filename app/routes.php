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
			Route::get('/', 'CargaAcademicaController@informe');
			Route::get('nuevo', 'CargaAcademicaController@nuevo');
			Route::get('informes', 'CargaAcademicaController@informe');

			Route::get('editar/{carga}', 'CargaAcademicaController@edit')->where('carga','[0-9]+');
			Route::get('asignar/{carga}', 'CargaAcademicaController@asignar')->where('carga','[0-9]+');
			Route::get('editar_asignacion/{carga}', 'CargaAcademicaController@asignacion_edit')->where('carga','[0-9]+');
			Route::get('eliminar/{carga}', 'CargaAcademicaController@delete')->where('carga','[0-9]');

			Route::group(array('before' => 'csrf'), function(){
				Route::post('nuevo', 'CargaAcademicaController@nuevo');
				Route::post('editar/{carga}', 'CargaAcademicaController@editar')->where('carga','[0-9]');
				Route::post('asignar/{carga}', 'CargaAcademicaController@asignar')->where('carga','[0-9]');

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
/*
	-- Rutas para Observador
*/
Route::group(array('prefix' => 'observador'), function(){
	Route::group(array('before' => 'auth'), function(){
		Route::group(array('before' => 'permit'), function(){
			Route::get('/', 'ObservadorController@index');
			Route::get('nuevo', 'ObservadorController@nuevo');
			Route::get('informe', 'ObservadorController@informe');
			Route::get('show/{numero}', 'ObservadorController@show')->where('numero','[0-9]+');
			Route::get('edit/{numero}', 'ObservadorController@edit')->where('numero','[0-9]+');
			Route::get('grupo/{numero_1}','ObservadorController@listGrupo')->where('numero','[0-9]+');
			Route::get('delete/{numero_1}/{numero_2}','ObservadorController@destroy')->where('numero','[0-9]+');
			/*----------------------------*/
			Route::post('nuevo', 'ObservadorController@nuevo');
			Route::post('informe', 'ObservadorController@informe');
			Route::post('edit', 'ObservadorController@edit');
			Route::post('update/{numero}', 'ObservadorController@update')->where('numero','[0-9]+');
			Route::get('updatealums/{numero}', 'ObservadorController@updatealums')->where('numero','[0-9]+');
		});
	});
});
/*
	--Rutas para Alumnos
*/
Route::group(array('prefix' => 'alumnos'), function(){
	Route::group(array('before' => 'auth'), function(){
		Route::group(array('before' => 'permit'), function(){
			Route::get('buscar', 'AlumnosController@autocompletar');
		});
	});
});
/*
	--Rutas para Docentes
*/
Route::group(array('prefix' => 'docentes'), function(){
	Route::group(array('before' => 'auth'), function(){
		Route::group(array('before' => 'permit'), function(){
			Route::get('buscar', 'DocentesController@autocompletar');
		});
	});
});

/*
	--Rutas para Matriculas
*/
Route::group(array('prefix' => 'matriculas'), function(){
	Route::group(array('before' => 'auth'), function(){
		Route::group(array('before' => 'permit'), function(){
			Route::get('/', 'MatriculasController@MatriculaAlum');
			Route::post('nuevo', 'MatriculasController@nuevo');
			Route::get('infocomp', 'MatriculasController@infocomp');
			Route::get('padre/{num1}/{num2}', 'MatriculasController@padre')->where(array('num1'=>'[0-9]+','num2'=>'[0-9]+'));
			Route::get('madre/{num1}/{num2}', 'MatriculasController@madre')->where(array('num1'=>'[0-9]+','num2'=>'[0-9]+'));
			Route::get('acudiente/{num1}/{num2}', 'MatriculasController@acudiente')->where(array('num1'=>'[0-9]+','num2'=>'[0-9]+'));
			Route::get('correspondencia', 'MatriculasController@infocomp');

			//Autocompletar papa - mama - acudiente
			Route::get('buscar_padre', 'MatriculasController@srch_papa');
			Route::get('buscar_acudiente/', 'MatriculasController@srch_acudiente');

			//Rutas para guardar y buscar
			Route::get('buscaralum/{numero}', 'MatriculasController@searchalum')->where('numero','[0-9]+');
			Route::get('srchP', 'MatriculasController@srchP');
			Route::post('savePadre', 'MatriculasController@savePadre');
			Route::post('saveAcudiente', 'MatriculasController@saveAcudiente');

			//Listar Editar y Eliminar
			Route::get('matriculados', 'MatriculasController@matriculados');
			Route::get('inscritos', 'MatriculasController@inscritos');

			Route::get('alumnos-matriculados', 'MatriculasController@srch_alum_matri');
			Route::get('alumnos-inscritos', 'MatriculasController@srch_alum_inscritos');


			Route::get('cancel_matricula/{num1}/{num2}', 'MatriculasController@cancel_matri')->where(array('num1'=>'[0-9]+','num2'=>'[0-9]+'));
			Route::get('editar_matricula/{num1}/{num2}', 'MatriculasController@edit_matri')->where(array('num1'=>'[0-9]+','num2'=>'[0-9]+'));
			Route::get('editar_papa/{num1}/{num2}/{num3}', 'MatriculasController@edit_padre')->where(array('num1'=>'[0-9]+','num2'=>'[0-9]+','num3'=>'[0-9]+'));
			Route::get('editar_mama/{num1}/{num2}/{num3}', 'MatriculasController@edit_madre')->where(array('num1'=>'[0-9]+','num2'=>'[0-9]+','num3'=>'[0-9]+'));
			Route::get('editar_acudiente/{num1}/{num2}', 'MatriculasController@edit_acudiente')->where(array('num1'=>'[0-9]+','num2'=>'[0-9]+'));
			Route::post('update_matricula/{num1}/{num2}', 'MatriculasController@update_matricula')->where(array('num1'=>'[0-9]+','num2'=>'[0-9]+'));

		});
	});
});

/*
	--Rutas para Autocompletar Paises y Ciudades
*/

Route::group(array('prefix' => 'location'), function(){
	Route::group(array('before' => 'auth'), function(){
		Route::group(array('before' => 'permit'), function(){
			Route::get('buscarpais', 'LocationController@autocompletarpais');
			Route::get('buscarciudad', 'LocationController@autocompletarciudad');
			Route::get('buscarciudadU', 'LocationController@autocompletarciudadU');
		});
	});
});

/*
	--Rutas para Legalizar
*/

Route::group(array('prefix' => 'legalizacion'), function(){
	Route::group(array('before' => 'auth'), function(){
		Route::group(array('before' => 'permit'), function(){
			Route::get('/', 'LegalizarController@index');
			Route::get('pendientes', 'LegalizarController@pendientes');
			Route::get('legalizadas', 'LegalizarController@legalizadas');
			Route::get('legalizar/{n1}/{n2}/{n3}', 'LegalizarController@legalizar')->where(array('n1'=>'[0-9]+','n2'=>'[0-9]+','n3'=>'[0-9]+'));
			Route::get('legalizada/{n1}/{n2}/{n3}', 'LegalizarController@legalizarM')->where(array('n1'=>'[0-9]+','n2'=>'[0-9]+','n3'=>'[0-9]+'));
			Route::post('docs/{n1}/{n2}/{n3}', 'DocsMatriculaController@requestDocs')->where(array('n1'=>'[0-9]+','n2'=>'[0-9]+','n3'=>'[0-9]+'));
			Route::post('filtro-matriculas/{type}', 'LegalizarController@matriculasList')->where('type','[0-9]+');
		});
	});
});
