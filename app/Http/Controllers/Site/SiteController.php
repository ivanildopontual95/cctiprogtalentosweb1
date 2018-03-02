<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Publicacao;
use App\Cargo;


class SiteController extends Controller
{
    
    public function perfil() {
      if(Gate::denies('perfil-view')){
        abort(403,"Não autorizado!");
      }
      $user = Auth()->user();

      $caminhos = [
      ['url'=>'/dashboard','titulo'=>'Painel Principal'],
      ['url'=>'','titulo'=>'Perfil']
      ];

      return view('dashboard.perfil.perfil',compact('user','caminhos'));

    }

    public function perfilUpdate(Request $request){
      if(Gate::denies('perfil-view')){
        abort(403,"Não autorizado!");
      }
      $user = Auth()->user();
      
      $this->validate($request,[
        'name'=>'required',
        'email'=>'required|email|unique:users,email,'.$user->id
      ]);

      $dados = $request->all();

      if(isset($dados['password']) && $dados['password'] != ''){
        $this->validate($request, [
          'password' => 'required|min:6|confirmed',
        ]);
        $dados['password'] = bcrypt($dados['password']);
      }else{
        unset($dados['password']);
      }

      $user->update($dados);

      return redirect()->route('perfil.perfil')->with('status', 'Perfil atualizado!');
    }

    //--------------Home------------------------------------
    public function home()
    {
      $publicacoes = Publicacao::orderBy("id","DESC")->paginate(10);
      return view('home',compact('seletivos','publicacoes'));
    }

    //--------------Detalhes------------------------------------
    public function detalhes(Publicacao $publicacao, $titulo = null)
    {
      //$publicacao = Publicacao::find($id);
      return view('detalhes',compact('publicacao'));
    }

    //--------------Inscrever------------------------------------
    public function indexInscrever(Publicacao $publicacao)
    {
        return view('inscrever', compact('publicacao'));       
    }

     //--------------Seleciona Cargo ------------------------
    public function indexCargo(Publicacao $publicacao)
    {
        $cargo = Cargo::all();
        //dd($cargo);
        return view('inscricao.cargo', compact('publicacao','cargo'));      
    } 

    public function storeCargo(Request $request, Publicacao $publicacao, Inscricao $inscricao)
    {
        //$publicacao = Publicacao::find($id);
        $cargo = Cargo::create($request->all());
        //$publicacao->adicionaCargo($cargo, $inscricao);
        return redirect()->back();
        
    }
}
