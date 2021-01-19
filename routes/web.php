<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('home');

Route::post('/app/sistema/get/departamentos', 'AdminController@departamentos');
Route::post('/app/sistema/get/municipios', 'AdminController@municipios');

Route::get('/calendario', 'HomeController@calendario')->name('calendario');
Route::post('/notificaciones', 'HomeController@notificaciones')->name('notificaciones');
Route::post('/notificaciones/load', 'HomeController@cargar_notificaciones')->name('cargar_notificaciones');
Route::post('/get_procesos_for_day', 'HomeController@get_procesos_for_day');
Route::post('/get_procesos_for_type', 'HomeController@get_procesos_for_type');
Route::post('/get_terceros', 'HomeController@get_terceros');

// RUTAS PARA EL ChAT
Route::get('/chat', 'ChatController@index');
Route::get('/chat/crear', 'ChatController@crear');
Route::get('/chat/mensajes/{id}', 'ChatController@mensajes');
Route::post('/chat/mensajes/enviar', 'ChatController@enviar');

// Rutas para crear procesos
Route::group(['middleware' => ['permission:penal|civil|familia|laboral|seguridad social|administrativo|universal']], function () {
    Route::get('/procesos/crear', 'ProcesosController@crear')->name('crear-proceso');
    Route::post('/procesos/create', 'ProcesosController@create');
    Route::get('/procesos/searh/{id}', 'ProcesosController@search');
    Route::get('/procesos/ver/{id}', 'ProcesosController@ver')->name('ver-proceso');
    Route::post('/procesos/agregar_actuacion', 'ProcesosController@agregar_actuacion');
    Route::get('/buscar/{buscar}', 'ProcesosController@buscar');
    Route::get('/buscar', 'ProcesosController@buscar_view');
    Route::post('/procesos/update', 'ProcesosController@update');
    Route::post('/procesos/delete', 'ProcesosController@delete');
    Route::post('/procesos/delete_actuacion', 'ProcesosController@delete_actuacion');
    Route::post('/procesos/update_actuacion', 'ProcesosController@update_actuacion');
    Route::post('/procesos/update_actuacion_post', 'ProcesosController@update_actuacion_post');
    Route::post('/procesos/add-proceso', 'ProcesosController@add_proceso');
    Route::post('/procesos/agg_audiencia', 'ProcesosController@agg_audiencia');
    Route::post('/procesos/update_audiencia', 'ProcesosController@update_audiencia');
    Route::get('/procesos/searh/demandado/{identificacion}', 'ProcesosController@search_demandado');
    Route::get('/procesos/searh/abogado/{identificacion}', 'ProcesosController@search_abogado');
    Route::post('/procesos/agregar_demandado', 'ProcesosController@agregar_demandado');
    Route::post('/procesos/searh/detalle_proceso', 'ProcesosController@detalle_proceso');
    Route::post('/procesos/delete/detalle_proceso', 'ProcesosController@delete_detalle_proceso');
    Route::get('/procesos/generar_informe/{id}', 'ProcesosController@generar_informe');
    Route::post('/procesos/juzgado', 'ProcesosController@juzgado');
    Route::get('/procesos/ver/acceso/{id}', 'ProcesosController@acceso');
    Route::post('/procesos/agregar_acceso', 'ProcesosController@agregar_acceso');
    Route::post('/procesos/delete_acceso', 'ProcesosController@delete_acceso');
});

// Rutas para Procesos Civil
Route::group(['middleware' => ['permission:civil|universal']], function () {
    Route::get('/procesos/civil', 'ProcesosController@civil')->name('civil');
});

// Rutas para Procesos Familia
Route::group(['middleware' => ['permission:familia|universal']], function () {
    Route::get('/procesos/familia', 'ProcesosController@familia')->name('familia');
});

// Rutas para Procesos Laboral
Route::group(['middleware' => ['permission:laboral|universal']], function () {
    Route::get('/procesos/laboral', 'ProcesosController@laboral')->name('laboral');
});

// Rutas para Procesos Seguridad Social
Route::group(['middleware' => ['permission:seguridad social|universal']], function () {
    Route::get('/procesos/seguridad-social', 'ProcesosController@seguridad_social')->name('seguridad-social');
});

// Rutas para Procesos Administrativo
Route::group(['middleware' => ['permission:administrativo|universal']], function () {
    Route::get('/procesos/administrativo', 'ProcesosController@administrativo')->name('administrativo');
});

// Rutas para Procesos Penal
Route::group(['middleware' => ['permission:penal|universal']], function () {
    Route::get('/procesos/penal', 'ProcesosController@penal')->name('penal');
});

// Rutas para Procesos Otros
Route::group(['middleware' => ['permission:penal|universal']], function () {
    Route::get('/procesos/otros', 'ProcesosController@otros')->name('otros');
});

// Rutas para Clientes
Route::group(['middleware' => ['permission:clientes|universal']], function () {
    Route::get('/clientes', 'ClientesController@index')->name('clientes');
    Route::get('/clientes/ver/{id}', 'ClientesController@ver')->name('ver-cliente');
    Route::get('/clientes/crear', 'ClientesController@crear');
    Route::post('/clientes/create', 'ClientesController@create');
    Route::post('/clientes/update', 'ClientesController@update');
    Route::post('/clientes/delete', 'ClientesController@delete');
    Route::post('/clientes/enviar_mensaje', 'ClientesController@enviar_mensaje');
    Route::get('/clientes/search/{search}', 'ClientesController@search');
    Route::get('/clientes/ver/{id}/search', 'ClientesController@search_proceso');

    Route::post('/clientes/add-cedula', 'ClientesController@add_cedula');
    Route::post('/clientes/add-contrato', 'ClientesController@add_contrato');
});

// Rutas para Demandados
Route::group(['middleware' => ['permission:demandados|universal']], function () {
    Route::get('/demandados', 'DemandadosController@index')->name('demandados');
    Route::get('/demandados/ver/{id}', 'DemandadosController@ver')->name('ver-demandado');
    Route::post('/demandados/agregar_demandado', 'DemandadosController@agregar_demandado');
    Route::post('/demandados/delete', 'DemandadosController@delete');
    Route::post('/demandados/update', 'DemandadosController@update');
});

// Rutas para Consultas
Route::group(['middleware' => ['permission:clientes|universal']], function () {
    Route::get('/consultas', 'ConsultasController@index')->name('consultas');
    Route::get('/consultas/contestadas', 'ConsultasController@contestadas');
    Route::get('/consultas/conversaciones', 'ConsultasController@contestadas');
    Route::get('/consultas/ver/{id}', 'ConsultasController@ver')->name('ver-consulta');
    Route::post('/consultas/responder', 'ConsultasController@responder');
    Route::get('/consultas/correo/prueba', 'ConsultasController@prueba');
});

// Rutas para Administradores
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/administrador/usuarios', 'AdminController@usuarios')->name('usuarios');
    Route::post('/administrador/usuarios/create', 'AdminController@usuarios_create');
});
