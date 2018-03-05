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
Route::get('inscricoes/cargo', ['as'=> 'inscricoes.cargo.index','uses'=>'InscricaoController@indexSelectCargo']);
Route::post('inscricoes/cargo', ['as'=>'inscricoes.cargo.store','uses'=>'InscricaoController@storeSelectCargo']);
Route::get('inscricoes/confirmacao', ['as'=> 'inscricoes.confirmacao.index','uses'=>'InscricaoController@indexConfirmacao']);
Route::get('inscricoes/experiencia', ['as'=> 'inscricoes.experiencia.index','uses'=>'ExperienciaController@indexExperiencia']);
Route::resource('inscricoes', 'InscricaoController');
Route::resource('experiencias', 'ExperienciaController');
Route::get('pdf','PDFController@GerarPDF');
Route::get('gerarCurriculo/{id}',['as'=>'dashboard.publicacao.relatorios.PDFcurriculo','uses'=>'PDFController@GerarCurriculo']);

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
  
  //--------------------Perfis--------------------------

  Route::get('perfil', ['as'=>'perfil.perfil','uses'=>'Site\SiteController@perfil']);
  Route::put('perfil', ['as'=>'perfil.perfil.update','uses'=>'Site\SiteController@perfilUpdate']);
  
  
});