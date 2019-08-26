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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//->middleware('administrador')
Route::get('/cities', 'CityController@showCities')->name('home');

Route::middleware(['administrador'])->group(function () {
    Route::get('/pasatiempos', 'HobbyController@index');
    Route::get('/pasatiempos/crear/{id?}', 'HobbyController@edit');
    Route::post('/pasatiempos/add/', 'HobbyController@create');
});

Route::middleware(['usuario'])->prefix('/user')->group(function () {
    Route::get('pasatiempos', 'UserHobbyController@index');
    Route::get('pasatiempos/crear/{id?}', 'UserHobbyController@edit');
    Route::post('pasatiempos/add/', 'UserHobbyController@create');
});

Route::middleware(['auth'])->prefix('/admin')->group(function () {
    Route::get('usuarios', 'UserController@index');
    Route::get('usuarios/crear/{id?}', 'UserController@edit');
    Route::post('usuarios/add/', 'UserController@create');
});