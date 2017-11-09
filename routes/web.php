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

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/reportes', 'ReporteTrimestralController@index')->name('reportes.index');
Route::get('/reportes/{reporteT}', 'ReporteTrimestralController@show')->name('reportes.show');
Route::delete('/reportes/{reporteT}', 'ReporteTrimestralController@destroy')->name('reportes.destroy')->middleware('can:delete,reporteT');

Route::get('/ingresos', 'ReporteIngresoController@index')->name('ingresos.index');
Route::get('/ingresos/{reporteIngreso}', 'ReporteIngresoController@show')->name('ingresos.show');

Route::get('/egresos', 'ReporteEgresoController@index')->name('egresos.index');
Route::get('/egresos/{reporteEgreso}', 'ReporteEgresoController@show')->name('egresos.show');

Route::get('/graficos', 'GraficoController@index')->name('graficos.index');

Route::get('/usuarios', 'UserController@index')->name('usuarios.index')->middleware('can:index,App\User');
Route::delete('/usuarios/{usuario}', 'UserController@destroy')->name('usuarios.destroy')->middleware('can:delete,usuario');
