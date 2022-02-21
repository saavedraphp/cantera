<?php
use Illuminate\Support\Facades\Route;

Auth::routes();

 

Route::get('/register', 'Auth\RegisterController@register')->name('register');
Route::post('/register', 'Auth\RegisterController@create');
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');


//MODULO DE EMPRESA
Route::resource('cancha/reservar', 'ReservasCanchasController');

Route::get('/cancha/{id}', 'ReservasCanchasController@cancha')->name('cancha');
 
Route::get('/cancha/fecha/{cancha}/{fecha}', 'ReservasCanchasController@buscarFecha');
Route::get('/cancha/reservar/{cancha}/{fecha}/{hora}', 'ReservasCanchasController@reservarCancha')->name('reserva');
 







Route::get('admin/actas/create-despacho', 'ActaController@create_despacho');
Route::post('admin/actas/store-despacho', 'ActaController@store_despacho');

Route::resource('admin/actas', 'ActaController');

Route::resource('admin/clientes', 'ClienteController');



Route::resource('admin/empresas', 'EmpresaController');
Route::get('/admin/empresas/images/{id}', 'EmpresaController@images')->name('imagesHead');
Route::post('/admin/empresas/images/{id}', 'EmpresaController@upload_mages')->name('upload_mages');
Route::get('/admin/empresas/deleteImages/{id}', 'EmpresaController@eliminar_imagen')->name('dropImages');

Route::get('/admin/empresas/casillas/{id}', 'CasillasEmpresaController@asignar_casillas')->name('casillas_add');



Route::resource('admin/productos', 'ProductosController');
Route::resource('admin/racks', 'RackController');
Route::resource('admin/casillas', 'RackCasillaController');

Route::get('usuario/kardex/', 'KardexController@index');








Route::get('racks/obtenerCasillas/', 'RackCasillaController@obenerCasillasIdRack');

Route::get('productos/empresa/', 'ProductosController@ObtenerProductosEmpresa');

Route::get('ciudades/estado/', 'UsuarioController@getCiudadesByEstado');


Route::get('reporte_acta/id/{id}/','ActaController@pdfReporteRecepcion')->name('reporteRecepcion.pdf');

route::get('user-list-pdf','UsuarioController@exportarPdf')->name('users.pdf');






Route::resource('admin/tasks', 'admin\TaskController',['except' => 'show', 'create', 'edit']);

Route::get('admin/tasks',function(){
    return view('admin.task.index');
    });




Route::get('admin/ejemplos',function(){
    return view('pruebas.lista');
    });

        
Route::get('rollback','PruebaController@index');


Route::get('/clear', function() {

    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";
    });