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

Route::resources([
    'personas' => 'personasController',
    'cargos'=> 'cargosController',
    'habilidades' => 'habilidadesController',
    'novedades' => 'novedadesController',
    'contratos' => 'contratosController',
    'empresas' => 'empresasController',
    'servicios' => 'serviciosController',
    'linea' => 'lineaController',
    'cliente' => 'clienteController',
    'gerente' => 'gerenteController',
    'recursosfisicos' => 'recursosFisicosController',
    'oficina' => 'oficinaController',
    'pershabil'=>'persHabilController'

]);

Route::get('redirect', function(){
    Alert::error('Registro agregado exitosamente!');
    return redirect('/');
});
Route::post('personas/search','personasController@search')->name('personas.search');//Busca personas por nombre o apellido
Route::post('pershabil/search','persHabilController@search')->name('pershabil.search');//Busca habilidades por persona

