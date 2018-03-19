<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Publicacao;
use App\Documento;
use App\Cargo;
use App\Relatorio;
use App\Inscricao;
use App\Experiencia;
use Validator;

use Illuminate\Support\Facades\Gate;
    
class PublicacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        if(Gate::denies('publicacoes-view')){
            abort(403,"Não autorizado!");
        }
        $publicacoes = Publicacao::orderBy("id","DESC")->paginate(10);
        $caminhos = [
            ['url'=>'/dashboard','titulo'=>'Painel Principal'],
            ['url'=>'','titulo'=> 'Publicações'],
        ];
        return view('dashboard.publicacao.index',compact ('publicacoes','caminhos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

   
    public function create()
    {
        if(Gate::denies('publicacoes-create')){
            abort(403,"Não autorizado!");
        }
        $caminhos = [
            ['url'=>'/dashboard','titulo'=>'Painel Principal'],
            ['url'=>route('publicacoes.index'),'titulo'=>'Publicações'],
            ['url'=>'','titulo'=>'Adicionar Publicação']
        ];

      return view('dashboard.publicacao.adicionar',compact('caminhos'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Gate::denies('publicacoes-create')){
            abort(403,"Não autorizado!");
        }
        $this->validate($request, [
            'titulo' => 'required',
            'descricao' => 'required',
            'dataInicio' => 'required',
            'horaInicio' => 'required',
            'dataTermino' => 'required',
            'horaTermino' => 'required'
        ]);
        Publicacao::create($request->all());
        return redirect()->route('publicacoes.index');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Gate::denies('publicacoes-edit')){
            abort(403,"Não autorizado!");
        }
        $publicacao = Publicacao::find($id);

      $caminhos = [
      ['url'=>'/dashboard','titulo'=>'Painel Principal'],
      ['url'=>route('publicacoes.index'),'titulo'=>'Publicações'],
      ['url'=>'','titulo'=>'Editar Publicação']
      ];

      return view('dashboard.publicacao.editar',compact('publicacao','caminhos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Gate::denies('publicacoes-edit')){
            abort(403,"Não autorizado!");
        }
        Publicacao::find($id)->update($request->all());
        return redirect()->route('publicacoes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::denies('publicacoes-delete')){
            abort(403,"Não autorizado!");
        }
        Publicacao::find($id)->delete();
        return redirect()->route('publicacoes.index');
    }

    //-------------------------------------------------------

    //--------------------Documentos--------------------------

    public function indexDocumentos($id){
        
        if(Gate::denies('publicacoes-edit')){
        abort(403,"Não autorizado!");
        }

        $publicacao = Publicacao::find($id);
        $documento = Documento::all();
        $caminhos = [
        ['url'=>'/dashboard','titulo'=>'Painel Principal'],
        ['url'=>route('publicacoes.index'),'titulo'=>'Publicações'],
        ['url'=>'','titulo'=>'Documentos']
        ];

        return view('dashboard.publicacao.documento',compact( 'publicacao','documento','caminhos'));      
    }
    


    public function storeDocumento(Request $request, $id){
       
        if(Gate::denies('publicacoes-edit')){
        abort(403,"Não autorizado!");
        }

        //  $this->validate($request,[
        //      'arquivo'=>'required|file'
        //  ]);

        $publicacao = Publicacao::find($id);
        
        if($request->hasFile('arquivos'))
        {
            $files = $request->arquivos;  

            $fileRegras = array(
            'arquivo' => 'required|file'
            );
  
            foreach($files as $file){
                $fileArray = array('arquivo' => $file);
                $fileValidator = Validator::make($fileArray, $fileRegras);
                if ($fileValidator->fails()) {
                return redirect()->route('publicacoes.documentos.index')
                            ->withErrors($fileValidator)
                            ->withInput();
                }
            }


            foreach ($files as $file) {
                $file_nome = time().$file->getClientOriginalName(); 
                $file->move("arquivos/",$file_nome);

                $auxNome = explode(".",$file->getClientOriginalName());
                $documento = Documento::create(["titulo"=>$auxNome[0],"url"=>"arquivos/".$file_nome]);
                $publicacao->adicionaDocumento($documento);


            }
        }
        
        return redirect()->back(); 
    }

    public function destroyDocumento($id, $documento_id)
    {
        if(Gate::denies('publicacoes-delete')){
            abort(403,"Nao autorizado!");
          }  
        $publicacao = Publicacao::find($id);
        $documento = Documento::find($documento_id);
        $publicacao->removeDocumento($documento);
        $documento->delete();
        return redirect()->back();

    }

    //-------------------------------------------------------

    //---------------Cargos-----------------------------------

    public function indexCargo($id){
        
        if(Gate::denies('publicacoes-edit')){
        abort(403,"Não autorizado!");
        }

        $publicacao = Publicacao::find($id);
        $cargo = Cargo::all();
        $caminhos = [
        ['url'=>'/dashboard','titulo'=>'Painel Principal'],
        ['url'=>route('publicacoes.index'),'titulo'=>'Publicações'],
        ['url'=>'','titulo'=>'Cargos']
        ];

        return view('dashboard.publicacao.cargo',compact( 'publicacao','cargo','caminhos'));      
    }
    
    public function storeCargo(Request $request, $id){
       
        if(Gate::denies('publicacoes-edit')){
        abort(403,"Não autorizado!");
        }

        $this->validate($request, [
            'cargo' => 'required',
            'escolaridade' => 'required',
            'pontuacao' => 'required'
      ]);

        $publicacao = Publicacao::find($id);
        $cargo = Cargo::create($request->all());
        $publicacao->adicionaCargo($cargo);
        return redirect()->back(); 
    }

    public function destroyCargo($id, $cargo_id)
    {
        if(Gate::denies('publicacoes-delete')){
            abort(403,"Nao autorizado!");
          }  
        $publicacao = Publicacao::find($id);
        $cargo = Cargo::find($cargo_id);
        $publicacao->removeCargo($cargo);
        $cargo->delete();
        return redirect()->back();

    }

    //-------------------------------------------------------

    //--------------------Relatórios--------------------------
    public function indexRelatorio($id){
        
        if(Gate::denies('publicacoes-edit')){
        abort(403,"Não autorizado!");
        }

        $publicacao = Publicacao::find($id);
        $inscricoes = $publicacao->inscricoes;
        $caminhos = [
        ['url'=>'/dashboard','titulo'=>'Painel Principal'],
        ['url'=>route('publicacoes.index'),'titulo'=>'Publicações'],
        ['url'=>'','titulo'=>'Relatórios']
        ];
        
        //dd($publicacao->inscricoes[0]->pivot->cargo_id);

        return view('dashboard.publicacao.relatorios.index',compact('publicacao','inscricao','caminhos'));      
    }

    public function listadeinscritosRelatorio($id){
        
        if(Gate::denies('publicacoes-edit')){
            abort(403,"Não autorizado!");
        }

        $publicacao = Publicacao::find($id);
        $inscricoes = $publicacao->inscricoes;
        $caminhos = [
        ['url'=>'/dashboard','titulo'=>'Painel Principal'],
        ['url'=>route('publicacoes.index'),'titulo'=>'Publicações'],
        ['url'=>'','titulo'=>'Relatórios'],
        ['url'=>'','titulo'=>'Lista de Inscritos']
        ];

        return view('dashboard.publicacao.relatorios.listadeinscritos',compact('publicacao','inscricoes','caminhos'));      
    }


    public function listadedeferimentosRelatorio($id){
        
        if(Gate::denies('publicacoes-edit')){
            abort(403,"Não autorizado!");
        }

        $publicacao = Publicacao::find($id);
        $inscricoes = $publicacao->inscricoes;
        $caminhos = [
        ['url'=>'/dashboard','titulo'=>'Painel Principal'],
        ['url'=>route('publicacoes.index'),'titulo'=>'Publicações'],
        ['url'=>'','titulo'=>'Relatórios'],
        ['url'=>'','titulo'=>'Lista de Deferimentos']
        ];

        return view('dashboard.publicacao.relatorios.listadedeferimentos',compact('publicacao','inscricoes','caminhos'));      
    }

    public function listadeclassificadosRelatorio($id){
        
        if(Gate::denies('publicacoes-edit')){
            abort(403,"Não autorizado!");
        }
        
        $publicacao = Publicacao::find($id);
        $inscricoes = $publicacao->inscricoes;
        $caminhos = [
        ['url'=>'/dashboard','titulo'=>'Painel Principal'],
        ['url'=>route('publicacoes.index'),'titulo'=>'Publicações'],
        ['url'=>'','titulo'=>'Relatórios'],
        ['url'=>'','titulo'=>'Lista de Classificados']
        ];
        return view('dashboard.publicacao.relatorios.listadeclassificados',compact('publicacao','inscricoes','caminhos'));

    }

    public function listadeconvocacaoRelatorio($id){
        
        if(Gate::denies('publicacoes-edit')){
            abort(403,"Não autorizado!");
        }
        
        $publicacao = Publicacao::find($id);
        $inscricoes = $publicacao->inscricoes;
        $caminhos = [
        ['url'=>'/dashboard','titulo'=>'Painel Principal'],
        ['url'=>route('publicacoes.index'),'titulo'=>'Publicações'],
        ['url'=>'','titulo'=>'Relatórios'],
        ['url'=>'','titulo'=>'Lista de Convocacao']
        ];
        return view('dashboard.publicacao.relatorios.listadeconvocacao',compact('publicacao','inscricoes','caminhos'));

    }

    public function deferimentoRelatorio($publicacao_id, $inscricao_id){
        if(Gate::denies('publicacoes-edit')){
            abort(403,"Não autorizado!");
        }

        $publicacao = Publicacao::find($publicacao_id);
        $inscricao = Inscricao::find($inscricao_id);
        $experiencia = Experiencia::where('inscricao_id', $inscricao_id);
        $caminhos = [
        ['url'=>'/dashboard','titulo'=>'Painel Principal'],
        ['url'=>route('publicacoes.index'),'titulo'=>'Publicações'],
        ['url'=>'','titulo'=>'Relatórios'],
        ['url'=>'','titulo'=>'Deferimentos'],
        ['url'=>'','titulo'=>'Deferimento']
        ];

        return view('dashboard.publicacao.relatorios.deferimento',compact('publicacao','inscricao','experiencia','caminhos')); 
    }

    public function avaliacaoRelatorio($publicacao_id, $inscricao_id){
        
        if(Gate::denies('publicacoes-edit')){
            abort(403,"Não autorizado!");
        }

        $publicacao = Publicacao::find($publicacao_id);
        $inscricao = Inscricao::find($inscricao_id);
        $experiencia = Experiencia::where('inscricao_id', $inscricao_id);
        $caminhos = [
        ['url'=>'/dashboard','titulo'=>'Painel Principal'],
        ['url'=>route('publicacoes.index'),'titulo'=>'Publicações'],
        ['url'=>'','titulo'=>'Relatórios'],
        ['url'=>'','titulo'=>'Lista de Classificados'],
        ['url'=>'','titulo'=>'Avaliação']
        ];

        return view('dashboard.publicacao.relatorios.avaliacao',compact('publicacao','inscricao','experiencia','caminhos'));      
    }

    public function convocacaoRelatorio($publicacao_id, $inscricao_id){
        if(Gate::denies('publicacoes-edit')){
            abort(403,"Não autorizado!");
        }

        $publicacao = Publicacao::find($publicacao_id);
        $inscricao = Inscricao::find($inscricao_id);
        $experiencia = Experiencia::where('inscricao_id', $inscricao_id);
        $caminhos = [
        ['url'=>'/dashboard','titulo'=>'Painel Principal'],
        ['url'=>route('publicacoes.index'),'titulo'=>'Publicações'],
        ['url'=>'','titulo'=>'Relatórios'],
        ['url'=>'','titulo'=>'Lista de Convocação'],
        ['url'=>'','titulo'=>'Convocação']
        ];

        return view('dashboard.publicacao.relatorios.convocacao',compact('publicacao','inscricao','experiencia','caminhos'));      
    }
    //-------------------------------------------------------
}