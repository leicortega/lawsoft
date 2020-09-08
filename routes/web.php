<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('home');

// Rutas para crear procesos
Route::group(['middleware' => ['permission:penal|civil|familia|laboral|seguridad social|administrativo|universal']], function () {
    Route::get('/procesos/crear', 'ProcesosController@crear')->name('crear-proceso');
    Route::post('/procesos/create', 'ProcesosController@create');
    Route::get('/procesos/searh/{id}', 'ProcesosController@search');
    Route::get('/procesos/ver/{id}', 'ProcesosController@ver')->name('ver-proceso');
    Route::post('/procesos/agregar_actuacion', 'ProcesosController@agregar_actuacion');
    Route::get('/buscar/{buscar}', 'ProcesosController@buscar');
    Route::get('/buscar', 'ProcesosController@buscar_view');
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

// Rutas para Procesos Penal
Route::group(['middleware' => ['permission:clientes|universal']], function () {
    Route::get('/clientes', 'ClientesController@index')->name('clientes');
    Route::get('/clientes/ver/{id}', 'ClientesController@ver')->name('ver-cliente');
    Route::get('/clientes/crear', 'ClientesController@crear');
    Route::post('/clientes/create', 'ClientesController@create');

    Route::post('/clientes/add-cedula', 'ClientesController@add_cedula');
    Route::post('/clientes/add-eps', 'ClientesController@add_eps');
    Route::post('/clientes/add-arl', 'ClientesController@add_arl');
    Route::post('/clientes/add-afp', 'ClientesController@add_afp');
});

// Rutas para Administradores
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/administrador/usuarios', 'AdminController@usuarios')->name('usuarios');
    Route::post('/administrador/usuarios/create', 'AdminController@usuarios_create');
});