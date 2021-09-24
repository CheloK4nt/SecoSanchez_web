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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::view('','home.index')->name('inicio');

// LOGIN
Route::view('/login','usuarios.login')->name('login');
Route::post('/usuarios/login', 'UsuarioController@login')->name('usuarios.login');

// REGISTER
Route::get('/usuarios/register','UsuarioController@create')->name('usuarios.create');
Route::post('/usuarios','UsuarioController@store')->name('usuarios.store');
