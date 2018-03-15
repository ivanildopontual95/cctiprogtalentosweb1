<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inscricao;
use App\Publicacao;
use App\Cargo;
use App\Qualificacao;
use App\Experiencia;
use DB;
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
        $publicacoes = Publicacao::orderBy("id","DESC")->paginate(10);

        return view('inscricao.index', compact( 'publicacoes'));        
    }

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

        if($id != null)
        {
            return redirect()->route('inscricoes.edit', compact('publicacao', 'id'));
        }
        else
        {
            return view('inscricao.cadastro', compact('publicacao','cargos'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InscricaoRequest $request, Publicacao $publicacao)
    {
        $user = Auth()->user();
        
        $dados = $request->all();
        $qualificacoes = [];
        $experiencias = [];


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

        $cargo = Cargo::find($dados['cargo_id']);
       
        $publicacao->inscricoes()->attach( $inscricao, ['cargo_id' => $cargo->cargo] );

        return redirect()->route('inscricoes.confirmacao', compact('publicacao')); 
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

        return view('inscricao.editar',compact('inscricao', 'publicacao', 'cargos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InscricaoRequest $request, $id, $idPublicacao)
    {
        DB::table('qualificacoes')->where('inscricao_id', $id)->delete();
        DB::table('experiencias')->where('inscricao_id', $id)->delete();

        $dados = $request->all();
        $qualificacoes = [];
        $experiencias = [];
        

        $inscricao = Inscricao::find($id);
        $inscricao->update($dados);
        $dados['inscricao_id'] = $inscricao->id;
        

        foreach($dados['qualificacoes'] as $q => $qualificacao){
            $qualificacoes[$q] = new Qualificacao($qualificacao);                      
        }
        $inscricao->qualificacoes()->saveMany($qualificacoes);  


        foreach($dados['experiencias'] as $i => $experiencia){
            $experiencias[$i] = new Experiencia($experiencia);                      
        }
        $inscricao->experiencias()->saveMany($experiencias);  

        
        $publicacao = Publicacao::find($idPublicacao); 


        $cargo = Cargo::find($dados['cargo_id']);
       
        $publicacao->inscricoes()->attach( $inscricao, ['cargo_id' => $cargo->cargo] );

        return redirect()->route('inscricoes.confirmacao', compact('publicacao'));
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
        return view('inscricao.confirmacao', compact('publicacao'));      
    }

}
