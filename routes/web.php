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

Route::view('/welcome','welcome')->name('welcome');

// Route::get('/welcome', function () {
//     return view('welcome');
// });

Route::view('','home.index')->name('inicio');


// -------------------- U S U A R I O S -------------------- //
// LOGIN
Route::view('/login','usuarios.login')->name('login');
Route::post('/usuarios/login', 'UsuarioController@login')->name('usuarios.login');

//LOGOUT
Route::get('/usuarios/logout', 'UsuarioController@logout')->name('usuarios.logout');

// REGISTER
Route::get('/register','UsuarioController@register')->name('usuarios.register');
Route::post('/usuarios/register','UsuarioController@store')->name('usuarios.store');
// --------------- F I N    U S U A R I O S ------------------ //
