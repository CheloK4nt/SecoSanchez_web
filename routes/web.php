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

Route::get('locale/{locale}',function ($locale){
    session()->put('locale',$locale);
    return Redirect::back();
});


// -------------------- U S U A R I O S -------------------- //

//PANEL USUARIOS REGISTRADOS
Route::get('/panel','UsuarioController@panel')->name('usuarios.panel');
Route::get('/panel/edit','UsuarioController@panelEdit')->name('usuarios.panelEdit');
Route::post('/panel/edit','UsuarioController@panelEditPost')->name('usuarios.panelEditPost');

// DOSSIER
Route::get('/dossier','DossierController@index')->name('dossier.index');
/* Route::get('/dossier', 'DossierController@getDossier')->name('dossier.getDossier'); */


// CONTACTO
Route::get('/contacto','ContactoController@index')->name('contacto.index');
Route::post('/home/contacto', 'ContactoController@email')->name('contacto.email');

// LOGIN
Route::view('/login','usuarios.login')->name('login');
Route::post('/usuarios/login', 'UsuarioController@login')->name('usuarios.login');

//RECUPERACION CONTRASEÑA
Route::get('/recuperar','UsuarioController@recuperar')->name('usuarios.recuperar');
Route::post('/usuarios/recuperar','UsuarioController@postRecuperar')->name('usuarios.postrecuperar');
Route::get('/reset','UsuarioController@reset')->name('usuarios.reset');
Route::put('/postReset','UsuarioController@postReset')->name('post.reset');

//LOGOUT
Route::get('/usuarios/logout', 'UsuarioController@logout')->name('usuarios.logout');

// REGISTER
Route::get('/register','UsuarioController@register')->name('usuarios.register');
Route::post('/usuarios/register','UsuarioController@store')->name('usuarios.store');

// --------------- F I N    U S U A R I O S ------------------ //

// TIENDA
Route::get('/tienda','TiendaController@getTienda')->name('tienda');
Route::get('/tienda/cuadros','TiendaController@getTiendaCuadros')->name('tienda.cuadros');
Route::get('/tienda/poleras','TiendaController@getTiendaPoleras')->name('tienda.poleras');
Route::get('/tienda/sprays','TiendaController@getTiendaSprays')->name('tienda.sprays');

// DOSSIER
Route::get('/dossier','DossierController@index')->name('dossier.index');

// PRODUCTOS
Route::get('/product/{id_prod}', 'ProductoController@getProducto');


// Ajax Api Routers
Route::get('/md/api/load/products/{section}','ApiJsController@getProductsSection');
Route::post('/md/api/load/user/favorites','ApiJsController@postUserFavorites');
Route::post('/md/api/favorites/add/{id_prod}','ApiJsController@postFavoriteAdd');
Route::get('/md/api/favorites/remove/{id_prod}','ApiJsController@getFavoriteRemove');