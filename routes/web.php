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


Route:: group (['middleware' => 'auth', 'prefix' =>'admin'], function () {

    Route::get('/', 'Admin\AdminController@index');
    Route::resource('usuarios', 'Admin\UsuarioController');

  Route::get('usuarios/papel/{id}', ['as'=>'usuarios.papel','uses'=>'Admin\UsuarioController@papel']);
  Route::post('usuarios/papel/{papel}', ['as'=>'usuarios.papel.store','uses'=>'Admin\UsuarioController@papelStore']);
  Route::delete('usuarios/papel/{usuario}/{papel}', ['as'=>'usuarios.papel.destroy','uses'=>'Admin\UsuarioController@papelDestroy']);


});