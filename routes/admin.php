<?php

Route::prefix('/admin')->group(function(){
    Route::get('/', 'Admin\DashboardController@getDashboard')->name('admin.dashboard');
    
    // modulo productos
    Route::get('/productos', 'Admin\ProductoController@getMenuProductos')->name('admin.productos.menu');

    // productos polera
    Route::get('/productos/poleras/{status}', 'Admin\ProductoController@getProductosPoleras')->name('admin.productos.poleras'); // Inicio Poleras //
    Route::post('/productos/polera/search', 'Admin\ProductoController@postPoleraSearch')->name('polera.search'); // Search Polera //
    Route::get('/productos/polera/agregar', 'Admin\ProductoController@getPoleraAgregar')->name('productos.polera.agregar'); // Agregar Polera //    
    Route::post('/producto/polera/store', 'Admin\ProductoController@poleraStore')->name('polera.store'); // Store Polera - Producto //
    Route::get('/producto/polera/{id}/edit', 'Admin\ProductoController@getPoleraEdit')->name('polera.edit'); // Editar Polera //
    Route::put('/producto/polera/{id}/update', 'Admin\ProductoController@poleraUpdate')->name('polera.update'); // Update Polera //
    Route::post('/producto/polera/{id}/galeria/agregar', 'Admin\ProductoController@postPoleraGaleriaAgregar')->name('polera.galeria.agregar'); // Agregar galeria polera //
    Route::get('/producto/polera/{id}/galeria/{gid}/eliminar', 'Admin\ProductoController@getPoleraGaleriaEliminar')->name('polera.galeria.eliminar'); // Eliminar galeria polera //
    Route::get('/producto/polera/{id}/delete', 'Admin\ProductoController@destroyPolera')->name('polera.destroy'); // eliminar polera //
    Route::get('/producto/polera/{id}/restore', 'Admin\ProductoController@getPoleraRestore')->name('polera.restore'); // restaurar polera //

    // galeria
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

    // modulo slider
    Route::get('/slider', 'Admin\SliderController@getSlider')->name('admin.slider');
    Route::post('/slide/store', 'Admin\SliderController@store')->name('slide.store');
    Route::get('/slide/{id}/edit', 'Admin\SliderController@getSlideEdit')->name('slide.edit');
    Route::get('/slide/{id}/delete', 'Admin\SliderController@destroy')->name('slide.destroy');
    Route::put('/slide/{id}/update', 'Admin\SliderController@update')->name('slide.update');
});