<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inscricao;
use App\Publicacao;
use App\Cargo;
use App\Qualificacao;
use App\Experiencia;
use DB;
use PDF;
use Illuminate\Support\Facades\Gate;
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
        if(Gate::denies('perfil-view')){
            abort(403,"Não autorizado!");
        }

        $user = Auth()->user();
        $inscricao = Inscricao::find($user->inscricao_id);
        
        $publicacaoInscrito = null;
        if($inscricao != null){
            if($inscricao->publicacoes()->count()){
                $publicacaoInscrito = $inscricao->publicacoes()->get();
            }else{
                $publicacaoInscrito = null;
            }
        }
        
        $publicacoes = Publicacao::orderBy("id","DESC")->paginate(5);

        return view('inscricao.index', compact( 'publicacoes', 'publicacaoInscrito'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Publicacao $publicacao)
    {
        if(Gate::denies('perfil-view')){
            abort(403,"Não autorizado!");
        }

        $user = Auth()->user();

        $cargos = $publicacao->cargos;

        $id = $user->inscricao_id;

        if($id != null)
        {
            return redirect()->route('inscricoes.edit', compact('publicacao'));
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
        if(Gate::denies('perfil-view')){
            abort(403,"Não autorizado!");
        }

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

       
        $publicacao->inscricoes()->attach( $inscricao, ['cargo_id' => $dados['cargo_id']] );

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
    public function edit(Publicacao $publicacao)
    {
        if(Gate::denies('perfil-view')){
            abort(403,"Não autorizado!");
        }

        $user = Auth()->user();
        $inscricao = Inscricao::find($user->inscricao_id);
        
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
    public function update(InscricaoRequest $request, $idPublicacao)
    {
        if(Gate::denies('perfil-view')){
            abort(403,"Não autorizado!");
        }
        $user = Auth()->user();
        
        DB::table('qualificacoes')->where('inscricao_id', $user->inscricao_id)->delete();
        DB::table('experiencias')->where('inscricao_id', $user->inscricao_id)->delete();

        $dados = $request->all();
        $qualificacoes = [];
        $experiencias = [];
        
        $inscricao = Inscricao::find($user->inscricao_id);
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
               
        $publicacao->inscricoes()->attach( $inscricao, ['cargo_id' => $dados['cargo_id']] );

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
        if(Gate::denies('perfil-view')){
            abort(403,"Não autorizado!");
        }

        $user = Auth()->user();
        $inscricoes = $publicacao->inscricoes;
        foreach($inscricoes as $inscricao){
            $inscricao->where('id','=',$user->inscricao_id)->get();
        }
        $cargo = $publicacao->cargos()->where('id','=',$inscricao->pivot->cargo_id)->first();
        return view('inscricao.confirmacao', compact('inscricao','publicacao','cargo'));      
    }

}
