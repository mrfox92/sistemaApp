<?php

use Illuminate\Support\Facades\Route;
use App\Paciente;
use App\Consulta;
use App\Propietario;

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

// Route::get('/', function () {
//     return view('inicio');
// });



//Rutas consulta

Route::get('/', 'ConsultaController@inicio');

Route::get('/inicio', 'ConsultaController@inicio');

//  Busqueda principal
Route::group(['prefix' => 'busqueda'], function () {

    Route::get('/', 'ConsultaController@buscar');
    Route::post('/', 'ConsultaController@buscar')->name('inicio.buscar');
});
 

Route::group(['prefix' => 'propietarios'], function () {
    Route::get('/', 'PropietarioController@index')->name('propietarios.index');
    Route::post('/', 'PropietarioController@store')->name('propietarios.store');
    Route::get('/prueba', 'PropietarioController@prueba')->name('propietarios.prueba');
    Route::post('/prueba', 'PropietarioController@crear')->name('propietarios.crear');
    Route::get('/prueba/{propietario}/detalle', 'PropietarioController@show')->name('propietarios.show');
    Route::get('/prueba/{propietario}/editar', 'PropietarioController@edit')->name('propietarios.edit');
    Route::post('/prueba/{propDeleted}/restaurar', 'PropietarioController@restaurar')->name('propietarios.restaurar');
    Route::delete('/prueba/{propietario}/delete', 'PropietarioController@destroy')->name('propietarios.destroy');

});

Route::get('/nueva-consulta', 'ConsultaController@nuevaConsulta');



Route::post('/nueva-consulta', 'ConsultaController@store')->name('consulta.store');

Route::get('/nueva-consulta-paciente-actual', 'ConsultaController@nuevaconsultaPA');
Route::post('/nueva-consulta-paciente-actual', 'ConsultaController@llenarNuevaConsultaPA');
Route::post('/agenda-hora', 'ConsultaController@agendaHoras');


Route::get('/listar', 'ConsultaController@lista');

//Rutas paciente

// Route::group(['middleware' => 'auth'], function () {

// });

Route::get('/{paciente}/historialpaciente', 'PacienteController@historialPaciente')->name('pacientes.historial');
//  cargar form edicion paciente
Route::get('/{paciente}/editar', 'PacienteController@edit')->name('pacientes.editar')->middleware('auth');
//  editar paciente
Route::put('/{paciente}/update', 'PacienteController@update')->name('pacientes.actualizar');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
