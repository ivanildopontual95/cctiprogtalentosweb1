<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inscricao;
use App\Publicacao;
use App\Cargo;
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
    public function indexSelectCargo($id)
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


        //$user->selecionaCargo($cargo);
        
        return redirect()->route('inscricoes.create', compact('id')); 
    }
    //-------------------------------------------------------------------//

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('inscricao.cadastro', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InscricaoRequest $request, $id)
    {
        $user = Auth()->user();
        
        $inscricao = Inscricao::create($request->all());
        
        $user->adicionaFormulario($inscricao);

        return redirect()->route('experiencias.create', compact('id'));
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
        $inscricao = Inscricao::find($id);
        return view('inscricao.editar',compact('inscricao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InscricaoRequest $request)
    {
        Inscricao::find($id)->update($request->all());
        return redirect()->route('inscricoes.index');
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

    public function indexConfirmacao($id)
    {
        $user = Auth()->user();
        $inscricao = $user->inscricoes;
        $publicacao = Publicacao::find($id);
        //$publicacao->adicionaInscricao($inscricao);
        
        return view('inscricao.confirmacao', compact('publicacao'));      
    }

}
