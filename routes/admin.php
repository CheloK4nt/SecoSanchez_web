<?php

Route::prefix('/admin')->group(function(){
    Route::get('/', 'Admin\DashboardController@getDashboard')->name('admin.dashboard');
    
    // modulo productos
    Route::get('/productos', 'Admin\ProductoController@getProductos')->name('admin.productos');
    Route::get('/producto/agregar', 'Admin\ProductoController@getProductoAgregar')->name('producto.agregar');
    Route::post('/producto/store', 'Admin\ProductoController@store')->name('producto.store');
    Route::get('/producto/{id}/edit', 'Admin\ProductoController@getProductoEdit')->name('producto.edit');
    Route::put('/producto/{id}/update', 'Admin\ProductoController@update')->name('producto.update');
    Route::get('/producto/{id}/delete', 'Admin\ProductoController@destroy')->name('producto.destroy');

    // modulo categorias
    Route::get('/categorias', 'Admin\CategoriaController@getCategorias')->name('admin.categorias');
    Route::post('/categoria/store', 'Admin\CategoriaController@store')->name('categoria.store');
    Route::get('/categoria/{id}/edit', 'Admin\CategoriaController@getCategoriaEdit')->name('categoria.edit');
    Route::put('/categoria/{id}/update', 'Admin\CategoriaController@update')->name('categoria.update');
    Route::get('/categoria/{id}/delete', 'Admin\CategoriaController@destroy')->name('categoria.destroy');
});