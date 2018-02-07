<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Publicacao;
class PublicacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        $registros = Publicacao::all();
        $caminhos = [
            ['url'=>'/admin','titulo'=>'Admin'],
            ['url'=>'','titulo'=> 'Publicação'],
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
        $caminhos = [
            ['url'=>'/admin','titulo'=>'Admin'],
            ['url'=>route('publicacao.index'),'titulo'=>'Publicacao'],
            ['url'=>'','titulo'=>'Adicionar']
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
        $registro = Publicacao::find($id);

      $caminhos = [
      ['url'=>'/admin','titulo'=>'Admin'],
      ['url'=>route('publicacao.index'),'titulo'=>'Publicacao'],
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
        Publicacao::find($id)->delete();
        return redirect()->route('publicacao.index');
    }
}
