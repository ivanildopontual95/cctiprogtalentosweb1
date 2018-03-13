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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', ['as'=>'home','uses'=>'Site\SiteController@home']);
Route::get('/publicacoes/{publicacao}/{titulo?}', ['as'=>'detalhes','uses'=>'Site\SiteController@detalhes']);

//-------------------------Inscrições--------------------------------------------

Route::group(['as'=> 'inscricoes.', 'prefix' =>'inscricoes'], function(){

  Route::get('', ['as'=>'index','uses'=>'InscricaoController@index']);
  Route::get('{publicacao}/criar', ['as'=> 'create','uses'=>'InscricaoController@create']);
  Route::post('{publicacao}/salvar', ['as'=> 'store','uses'=>'InscricaoController@store']);
  Route::get('{id}/{publicacao}/editar', ['as'=> 'edit','uses'=>'InscricaoController@edit']);
  Route::put('{publicacao}/atualizar', ['as'=> 'update','uses'=>'InscricaoController@update']);

  Route::get('{publicacao}/confirmacao', ['as'=> 'confirmacao.index','uses'=>'InscricaoController@indexConfirmacao']); 
});

Auth::routes();

Route:: group (['middleware' => 'auth', 'prefix' =>'dashboard'], function () {

  Route::get('/', 'Admin\AdminController@index');
  Route::resource('usuarios', 'Admin\UsuarioController');

  Route::get('usuarios/papel/{id}', ['as'=>'usuarios.papel','uses'=>'Admin\UsuarioController@papel']);
  Route::post('usuarios/papel/{papel}', ['as'=>'usuarios.papel.store','uses'=>'Admin\UsuarioController@papelStore']);
  Route::delete('usuarios/papel/{usuario}/{papel}', ['as'=>'usuarios.papel.destroy','uses'=>'Admin\UsuarioController@papelDestroy']);
  
  //--------------------------------------Papéis-------------------------------------

  Route::Resource('papeis', 'Admin\PapelController');

  Route::get('papeis/permissao/{id}', ['as'=>'papeis.permissao','uses'=>'Admin\PapelController@permissao']);
  Route::post('papeis/permissao/{permissao}', ['as'=>'papeis.permissao.store','uses'=>'Admin\PapelController@permissaoStore']);
  Route::delete('papeis/permissao/{papeis}/{permissao}', ['as'=>'papeis.permissao.destroy','uses'=>'Admin\PapelController@permissaoDestroy']);
  
  //------------------------------------Documentos-----------------------------------

  Route::resource('publicacoes', 'Admin\PublicacaoController');

  Route::get('publicacoes/{id}/documentos/', ['as'=> 'publicacoes.documentos.index','uses'=>'Admin\PublicacaoController@indexDocumentos']);
  Route::post('publicacoes/documentos/{documento}', ['as'=> 'publicacoes.documentos.store','uses'=>'Admin\PublicacaoController@storeDocumento']);
  Route::delete('publicacoes/documentos/{publicacoes}/{documento}', ['as'=> 'publicacoes.documentos.destroy','uses'=>'Admin\PublicacaoController@destroyDocumento']);

  //---------------------------------------Cargos------------------------------------

  Route::get('publicacoes/{id}/cargo/', ['as'=> 'publicacoes.cargo.index','uses'=>'Admin\PublicacaoController@indexCargo']);
  Route::post('publicacoes/cargo/{cargo}', ['as'=> 'publicacoes.cargo.store','uses'=>'Admin\PublicacaoController@storeCargo']);
  Route::delete('publicacoes/cargo/{publicacoes}/{cargo}', ['as'=> 'publicacoes.cargo.destroy','uses'=>'Admin\PublicacaoController@destroyCargo']);

  //--------------------------------------Relatórios---------------------------------

  Route::get('publicacoes/{id}/relatorios/', ['as'=> 'publicacoes.relatorio.index','uses'=>'Admin\PublicacaoController@indexRelatorio']);
  Route::get('publicacoes/{id}/relatorios//deferimento', ['as'=> 'publicacoes.relatorio.deferimento','uses'=>'Admin\PublicacaoController@deferimentoRelatorio']);
  Route::get('publicacoes/{id}/relatorios//avaliacao', ['as'=> 'publicacoes.relatorio.avaliacao','uses'=>'Admin\PublicacaoController@avaliacaoRelatorio']);
  Route::get('publicacoes/{id}/relatorios//convocacao', ['as'=> 'publicacoes.relatorio.convocacao','uses'=>'Admin\PublicacaoController@convocacaoRelatorio']);
  Route::get('publicacoes/{id}/relatorios//gerarcurriculopdf/',['as'=>'publicacoes.relatorio.pdfcurriculo','uses'=>'PDFController@pdfCurriculoRelatorio']);
  
  //---------------------------------------Perfis--------------------------

  Route::get('perfil', ['as'=>'perfil.perfil','uses'=>'Site\SiteController@perfil']);
  Route::put('perfil', ['as'=>'perfil.perfil.update','uses'=>'Site\SiteController@perfilUpdate']);
  
});