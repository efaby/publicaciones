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

	Route::get('/inicio', function () {
	    return view('index');
	});

	Route::get('/home', function () {
		return view('inicio');
	});
	
	Route::get('/login', function () {
		return view('login');
	});

	Route::get('/publicaciones', function () {
			return view('publicaciones.listado');
		});
		
		
	Route::get('facultades/getFacultades', 'Catalogos\FacultadController@getFacultades');
	Route::get('facultades/getFacultadByID/{id}', 'Catalogos\FacultadController@getFacultadByID');
	Route::resource('facultades', 'Catalogos\FacultadController');
        
	// Area de Conocimiento
	Route::get('areasconocimientos/getAreaConocimiento', 'Catalogos\AreaConocimientoController@getAreaConocimiento');
	Route::get('areasconocimientos/getAreaConocimientoByID/{id}', 'Catalogos\AreaConocimientoController@getAreaConocimientoByID');
        Route::resource('areasconocimientos', 'Catalogos\AreaConocimientoController');
        
        //Líneas de Conocimiento
        Route::get('lineasinvestigaciones/getLineasInvestigacion', 'Catalogos\LineasInvestigacionController@getLineasInvestigacion');
	Route::get('lineasinvestigaciones/getLineasInvestigacionByID/{id}', 'Catalogos\LineasInvestigacionController@getLineasInvestigacionByID');
        Route::resource('lineasinvestigaciones', 'Catalogos\LineasInvestigacionController');
        
         //Grupo de Investigación
        Route::get('gruposinvestigaciones/getGrupoInvestigacion', 'Catalogos\GrupoInvestigacionController@getGrupoInvestigacion');
	Route::get('gruposinvestigaciones/getGrupoInvestigacionByID/{id}', 'Catalogos\GrupoInvestigacionController@getGrupoInvestigacionByID');
        Route::resource('gruposinvestigaciones', 'Catalogos\GrupoInvestigacionController');