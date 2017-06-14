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
Route::get('/reportes/{id}', 'ReporteTrimestralController@show')->name('reportes.show');

Route::get('/ingresos', 'ReporteIngresoController@index')->name('ingresos.index');
Route::get('/ingresos/{id}', 'ReporteIngresoController@show')->name('ingresos.show');
