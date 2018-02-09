<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Publicacao;
use App\Documento;
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

        $registros = Publicacao::all();
        $caminhos = [
            ['url'=>'/admin','titulo'=>'Painel Principal'],
            ['url'=>'','titulo'=> 'Publicações'],
        ];
        return view('admin.publicacao.index',compact ('registros','caminhos'));
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
            ['url'=>'/admin','titulo'=>'Painel Principal'],
            ['url'=>route('publicacao.index'),'titulo'=>'Publicações'],
            ['url'=>'','titulo'=>'Adicionar Publicação']
        ];

      return view('admin.publicacao.adicionar',compact('caminhos'));
    
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
        
          Publicacao::create($request->all());
          return redirect()->route('publicacao.index');
       
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
        $registro = Publicacao::find($id);

      $caminhos = [
      ['url'=>'/admin','titulo'=>'Painel Principal'],
      ['url'=>route('publicacao.index'),'titulo'=>'Publicações'],
      ['url'=>'','titulo'=>'Editar']
      ];

      return view('admin.publicacao.editar',compact('registro','caminhos'));
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
        return redirect()->route('publicacao.index');
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
        return redirect()->route('publicacao.index');
    }


    //---------------------------------------------------------------
    public function indexDocumento(Publicacao $publicacao){
        
        if(Gate::denies('publicacoes-edit')){
        abort(403,"Não autorizado!");
        }

        $registros = $publicacao;

        $caminhos = [
        ['url'=>'/admin','titulo'=>'Painel Principal'],
        ['url'=>route('publicacao.index'),'titulo'=>'Publicações'],
        ['url'=>'','titulo'=>'Documentos']
        ];

        return view('admin.publicacao.documento',compact('registros','caminhos', 'publicacao'));      
    }
    


   public function storeDocumento(Request $request, Publicacao $publicacao){
       
        if(Gate::denies('publicacoes-edit')){
        abort(403,"Não autorizado!");
        }

        //  $this->validate($request,[
        //      'arquivo'=>'required|file'
        //  ]);

        
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
                return redirect()->route('publicacao.documento.index')
                            ->withErrors($fileValidator)
                            ->withInput();
                }
            }


            foreach ($files as $file) {
                $file_nome = time().$file->getClientOriginalName(); 
                $file->move("arquivos/",$file_nome);

                $auxNome = explode(".",$file->getClientOriginalName());
                $documento = Documento::create(["titulo"=>$auxNome[0],"url"=>"arquivos/".$file_nome]);
                //$publicacao->adicionaDocumento($documento);


            }
        }
        
        return redirect()->back(); 
    }

    

}