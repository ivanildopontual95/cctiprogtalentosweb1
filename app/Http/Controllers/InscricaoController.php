<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inscricao;
use App\Publicacao;
use App\Cargo;

class InscricaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inscricoes = Inscricao::orderBy("id","DESC")->paginate(10);
        return view('inscricao.login', compact('inscricoes'));       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inscricao.cadastro');
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
            'escolaridade'=>'required|string|max:60',
            'identidade'=>'required|numeric',
            'cpf'=>'required|cpf|unique:inscricoes',
            'cep'=>'required',
            'estado'=>'required|string|max:2',
            'cidade'=>'required|string|max:40',
            'endereco'=>'required|string|max:60',
            'bairro'=>'required|string|max:40',
            'numero'=>'required|numeric',
            'email'=>'required|string|email|max:255',
            'telefone'=>'required',  
            
       ]);
       Inscricao::create($request->all());
       return redirect()->route('inscricoes.confirmacao.index');

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
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nomeCompleto'=>'required|string|max:255',
            'dataNascimento'=>'required',
            'pai'=>'required|string|max:255',
            'mae'=>'required|string|max:255',
            'sexo'=>'required',
            'escolaridade'=>'required|string|max:60',
            'identidade'=>'required|numeric',
            'cep'=>'required',
            'estado'=>'required|string|max:2',
            'cidade'=>'required|string|max:40',
            'endereco'=>'required|string|max:60',
            'bairro'=>'required|string|max:40',
            'numero'=>'required|numeric',
            'email'=>'required|string|email|max:255',
            'telefone'=>'required', 
          ]);

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
    public function indexConfirmacao()
    {
        return view('inscricao.confirmacao');      
    }

   
}
