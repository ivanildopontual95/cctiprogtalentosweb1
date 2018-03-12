<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inscricao;
use App\Publicacao;
use App\Cargo;
use App\Qualificacao;
use App\Experiencia;
use App\Http\Requests\InscricaoRequest;

class InscricaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$user = Auth()-> user();
        //dd('index', $publicacao);
        $publicacoes = Publicacao::all();
        return view('inscricao.index', compact( 'publicacoes'));        
    }

    //--------------Seleciona Cargo -------------------------------------//
    /*public function indexSelectCargo($id)
    {
        $publicacao = Publicacao::find($id);
        $cargos = $publicacao->cargos;
        return view('inscricao.cargo', compact('publicacao','cargos'));      
    } 

    public function storeSelectCargo(Request $request, $id)
    {
        $user = Auth()->user();
        
        $dados = $request->all();
        $cargo = Cargo::find($dados['cargo_id']);


        $user->selecionaCargo($cargo);
        
        return redirect()->route('experiencias.create', compact('id'));
        //return redirect()->route('inscricoes.create', compact('id')); 
    }*/
    //-------------------------------------------------------------------//

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Publicacao $publicacao)
    {
        $user = Auth()->user();

        $cargos = $publicacao->cargos;

        $id = $user->inscricao_id;

        if($id != null){
            return redirect()->route('inscricoes.edit', compact('publicacao', 'id'));
        }
        else{
            return view('inscricao.cadastroTeste', compact('publicacao','cargos'));
        }

       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(InscricaoRequest $request, Publicacao $publicacao)
    public function store(Request $request, Publicacao $publicacao)
    {
        $user = Auth()->user();
        
        $dados = $request->all();

        $inscricao = Inscricao::create($dados);
        $dados['inscricao_id'] = $inscricao->id;


        $user->inscricao_id = $dados['inscricao_id'];
        $user->save();


        foreach($dados['qualificacoes'] as $q => $qualificacao){
            $qualificacoes[$q] = new Qualificacao($qualificacao);                      
        }
        $inscricao->qualificacoes()->saveMany($qualificacoes);  


        foreach($dados['experiencias'] as $i => $experiencia){
            $experiencias[$i] = new Experiencia($experiencia);                      
        }
        $inscricao->experiencias()->saveMany($experiencias);  

       
        $publicacao->inscricoes()->attach( $inscricao, ['cargo_id' => $dados['cargo_id']] );


        return redirect()->route('confirmacao.index', compact('publicacao')); 
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
    public function edit( $id, Publicacao $publicacao)
    {
        $inscricao = Inscricao::find($id);
        $cargos = $publicacao->cargos;
        
        return view('inscricao.editarTeste',compact('inscricao', 'publicacao', 'cargos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function update(InscricaoRequest $request, $id, Publicacao $publicacao)
    public function update(Request $request, $id, Publicacao $publicacao)
    {
        Inscricao::find($id)->update($request->all());

        return redirect()->route('confirmacao.index', compact('publicacao'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        //
    }

    //--------------Confirmação Inscrição ------------------------

    public function indexConfirmacao(Publicacao $publicacao)
    {
        /*$user = Auth()->user();
        $inscricao = $user->inscricoes[0];
        $publicacao = Publicacao::find($id);
        $publicacao->adicionaInscricao($inscricao);*/

        return view('inscricao.confirmacao', compact('publicacao'));      
    }

}
