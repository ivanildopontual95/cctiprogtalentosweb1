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

//-------------------------Inscricoes--------------------------------------------
Route::group(['as'=> 'inscricoes.', 'prefix' =>'inscricoes'], function(){

  Route::get('', ['as'=>'index','uses'=>'InscricaoController@index']);
  Route::get('criar/{id}', ['as'=> 'create','uses'=>'InscricaoController@create']);
  Route::post('salvar/{id}', ['as'=> 'store','uses'=>'InscricaoController@store']);
  Route::get('{id}/editar', ['as'=> 'edit','uses'=>'InscricaoController@edit']);
  Route::post('{id}/atualizar', ['as'=> 'update','uses'=>'InscricaoController@update']);
  
  Route::get('cargo/{id}', ['as'=> 'cargo.index','uses'=>'InscricaoController@indexSelectCargo']);
  Route::post('cargo/{id}', ['as'=>'cargo.store','uses'=>'InscricaoController@storeSelectCargo']);

  Route::get('confirmacao/{id}', ['as'=> 'confirmacao.index','uses'=>'InscricaoController@indexConfirmacao']); 
});

//---------------------------------Experiencias----------------------------------
Route::group(['as'=> 'experiencias.', 'prefix' =>'experiencias'], function(){

  Route::get('criar/{id}', ['as'=> 'create','uses'=>'ExperienciaController@create']);
  Route::post('salvar/{id}', ['as'=> 'store','uses'=>'ExperienciaController@store']);
  Route::get('{id}/editar', ['as'=> 'edit','uses'=>'ExperienciaController@edit']);
  Route::post('{id}/atualizar', ['as'=> 'update','uses'=>'ExperienciaController@update']);
});

Route::get('pdf','PDFController@GerarPDF');
Route::get('gerarCurriculo/{id}',['as'=>'publicacao.relatorios.PDFcurriculo','uses'=>'PDFController@GerarCurriculo']);

Auth::routes();

Route:: group (['middleware' => 'auth', 'prefix' =>'dashboard'], function () {

  Route::get('/', 'Admin\AdminController@index');
  Route::resource('usuarios', 'Admin\UsuarioController');

  Route::get('usuarios/papel/{id}', ['as'=>'usuarios.papel','uses'=>'Admin\UsuarioController@papel']);
  Route::post('usuarios/papel/{papel}', ['as'=>'usuarios.papel.store','uses'=>'Admin\UsuarioController@papelStore']);
  Route::delete('usuarios/papel/{usuario}/{papel}', ['as'=>'usuarios.papel.destroy','uses'=>'Admin\UsuarioController@papelDestroy']);
  
  //--------------------Papéis--------------------------

  Route::Resource('papeis', 'Admin\PapelController');

  Route::get('papeis/permissao/{id}', ['as'=>'papeis.permissao','uses'=>'Admin\PapelController@permissao']);
  Route::post('papeis/permissao/{permissao}', ['as'=>'papeis.permissao.store','uses'=>'Admin\PapelController@permissaoStore']);
  Route::delete('papeis/permissao/{papeis}/{permissao}', ['as'=>'papeis.permissao.destroy','uses'=>'Admin\PapelController@permissaoDestroy']);
  
  //--------------------Documentos--------------------------

  Route::resource('publicacoes', 'Admin\PublicacaoController');

  Route::get('publicacoes/{id}/documento/', ['as'=> 'publicacoes.documento.index','uses'=>'Admin\PublicacaoController@indexDocumento']);
  Route::post('publicacoes/documento/{documento}', ['as'=> 'publicacoes.documento.store','uses'=>'Admin\PublicacaoController@storeDocumento']);
  Route::delete('publicacoes/documento/{publicacoes}/{documento}', ['as'=> 'publicacoes.documento.destroy','uses'=>'Admin\PublicacaoController@destroyDocumento']);

  //--------------------Cargos--------------------------

  Route::get('publicacoes/{id}/cargo/', ['as'=> 'publicacoes.cargo.index','uses'=>'Admin\PublicacaoController@indexCargo']);
  Route::post('publicacoes/cargo/{cargo}', ['as'=> 'publicacoes.cargo.store','uses'=>'Admin\PublicacaoController@storeCargo']);
  Route::delete('publicacoes/cargo/{publicacoes}/{cargo}', ['as'=> 'publicacoes.cargo.destroy','uses'=>'Admin\PublicacaoController@destroyCargo']);

  //--------------------Relatórios----------------------

  Route::get('publicacoes/{id}/relatorios/', ['as'=> 'publicacoes.relatorio.index','uses'=>'Admin\PublicacaoController@indexRelatorio']);
  Route::post('publicacoes/relatorios/{relatorio}', ['as'=> 'publicacoes.relatorio.store','uses'=>'Admin\PublicacaoController@storeRelatorio']);
  Route::delete('publicacoes/relatorios/{publicacoes}/{relatorio}', ['as'=> 'publicacoes.relatorio.destroy','uses'=>'Admin\PublicacaoController@destroyRelatorio']);

  //--------------------ListadeInscritos----------------

  Route::get('publicacoes/{id}/relatorios/listadeinscritos', ['as'=> 'publicacoes.relatorio.listadeinscritos','uses'=>'Admin\PublicacaoController@listadeinscritosRelatorio']);

  //--------------------Currículo-----------------------

  Route::get('publicacoes/{id}/relatorios/listadeinscritos/curriculo', ['as'=> 'publicacoes.relatorio.curriculo','uses'=>'Admin\PublicacaoController@curriculoListadeinscritos']);
  Route::get('publicacoes/{id}/relatorios/listadeinscritos/avaliacao', ['as'=> 'publicacoes.relatorio.avaliacao','uses'=>'Admin\PublicacaoController@avaliacaoInscrito']);
  
  //--------------------Perfis--------------------------

  Route::get('perfil', ['as'=>'perfil.perfil','uses'=>'Site\SiteController@perfil']);
  Route::put('perfil', ['as'=>'perfil.perfil.update','uses'=>'Site\SiteController@perfilUpdate']);
  
});