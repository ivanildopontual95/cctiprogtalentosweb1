<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inscricao;
class InscricaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('inscricao',compact('caminhos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
            'nomeCompleto'=>'required|string|max:255',
            'dataNascimento'=>'required',
            'pai'=>'required|string|max:255',
            'mae'=>'required|string|max:255',
            'sexo'=>'required',
            'escolaridade'=>'required|string|max:255',
            'identidade'=>'required|numeric',
            'cpf'=>'required|cpf|unique:inscricoes',
            'estado'=>'required|string',
            'cidade'=>'required|string',
            'endereco'=>'required',
            'cep'=>'required|numeric',
            'bairro'=>'required',
            'numero'=>'required|numeric',
            'email'=>'required|string|email|max:255|unique:inscricoes',
            'telefone'=>'required',  
            
       ]);
       Inscricao::create($request->all());
       return redirect()->route('inscricoes.index');

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
        //
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
        //
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
}
