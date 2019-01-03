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

// Route::get('asignacion/proyecto/{proyecto}/{factura}','asignacionController@show')->name('asignacion.name');

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
    'pershabil'=>'persHabilController',
    'cargpers'=>'CargPersController',
    'proyecto'=>'proyectoController',
    'factproyec'=>'factProyecController',
    'asignacion'=>'asignacionController',
    'roles'=>'RoleController',
    'usuarios' =>'UsersControllers',
    'rolusuarios'=>'RoleUserController',
    'jquery'=>'jqueryController',
    'perscontr'=>'persContrController',
    'asigpers'=>'asigPersController',
    'roluser'=>'RoleUserController',
    

]);

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/register', function () {
    return view('auth.register');
});
// Route::get('personas/retirar','personasController@retirar')->name('personas.retiro');
Route::get('personas/retirar/{id}','personasController@retirar')->name('personas.retiro');
//Actualiza las habilidades
Route::put('pershabil/actualizar/habilidades','persHabilController@actualizar')->name('pershabil.actualizar');
Route::get('/home', function () {
    return view('welcome');
});


Route::get('redirect', function(){
    Alert::error('Registro agregado exitosamente!');
    return redirect('/');
});

Route::POST('usuarios/actualizar','RoleUserController@actualizar')->name('roleuser.actualizar');

//Validar porque seguramente toque borrar estas rutas
Route::GET('personas/search/{busqueda}','personasController@search')->name('personas.search');//Busca personas por nombre o apellido
Route::GET('pershabil/search/{busqueda}','persHabilController@search')->name('pershabil.search');//Busca habilidades por persona
Route::GET('habilidades/search/{busqueda}','habilidadesController@search')->name('habilidades.search');//Busca habilidades por persona
Route::GET('cargos/search/{busqueda}','cargosController@search')->name('cargos.search');//Busca habilidades por persona
//Hasta aquí

//
//Envía al controlador principal para que realice la verificación y posteriormente redireccione a los controladores para realizar la busqueda

//Borrar esta ruta
Route::get('search','Controller@search');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('log','LogController');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
