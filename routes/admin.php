<?php

Route::prefix('/admin')->group(function(){
    Route::get('/', 'Admin\DashboardController@getDashboard')->name('admin.dashboard');
    
    // modulo productos
    Route::get('/productos/{status}', 'Admin\ProductoController@getProductos')->name('admin.productos');
    Route::get('/producto/agregar', 'Admin\ProductoController@getProductoAgregar')->name('producto.agregar');
    Route::post('/producto/search', 'Admin\ProductoController@postProductoSearch')->name('producto.search');
    Route::post('/producto/store', 'Admin\ProductoController@store')->name('producto.store');
    Route::get('/producto/{id}/edit', 'Admin\ProductoController@getProductoEdit')->name('producto.edit');
    Route::get('/producto/{id}/restore', 'Admin\ProductoController@getProductoRestore')->name('producto.restore');
    Route::put('/producto/{id}/update', 'Admin\ProductoController@update')->name('producto.update');
    Route::get('/producto/{id}/delete', 'Admin\ProductoController@destroy')->name('producto.destroy');

    Route::post('/producto/{id}/galeria/agregar', 'Admin\ProductoController@postProductoGaleriaAgregar')->name('producto.galeria.agregar');
    Route::get('/producto/{id}/galeria/{gid}/eliminar', 'Admin\ProductoController@getProductoGaleriaEliminar')->name('producto.galeria.eliminar');

    // modulo categorias
    Route::get('/categorias', 'Admin\CategoriaController@getCategorias')->name('admin.categorias');
    Route::post('/categoria/store', 'Admin\CategoriaController@store')->name('categoria.store');
    Route::get('/categoria/{id}/edit', 'Admin\CategoriaController@getCategoriaEdit')->name('categoria.edit');
    Route::put('/categoria/{id}/update', 'Admin\CategoriaController@update')->name('categoria.update');
    Route::get('/categoria/{id}/delete', 'Admin\CategoriaController@destroy')->name('categoria.destroy');

    // modulo dossier
    Route::get('/dossier', 'Admin\DossierController@getDossier')->name('admin.dossier');
    /* Route::get('/dossier/agregar', 'Admin\DossierController@getDossierAgregar')->name('dossier.agregar'); */
    Route::post('/dossier/store', 'Admin\DossierController@store')->name('dossier.store');
    Route::get('/dossier/{id}/delete', 'Admin\DossierController@destroy')->name('dossier.destroy');
    Route::get('/dossier/{id}/edit', 'Admin\DossierController@getDossierEdit')->name('dossier.edit');
    Route::put('/dossier/{id}/update', 'Admin\DossierController@update')->name('dossier.update');
    Route::post('/dossier/{id}/galeria/agregar', 'Admin\DossierController@postDossierGaleriaAgregar')->name('dossier.galeria.agregar');

    /* Route::post('/producto/search', 'Admin\ProductoController@postProductoSearch')->name('producto.search');
    Route::get('/producto/{id}/restore', 'Admin\ProductoController@getProductoRestore')->name('producto.restore');
    
    Route::post('/producto/{id}/galeria/agregar', 'Admin\ProductoController@postProductoGaleriaAgregar')->name('producto.galeria.agregar');
    Route::get('/producto/{id}/galeria/{gid}/eliminar', 'Admin\ProductoController@getProductoGaleriaEliminar')->name('producto.galeria.eliminar'); */
});