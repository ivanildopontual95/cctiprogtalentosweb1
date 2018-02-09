<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Gate;


class SiteController extends Controller
{
    
    public function perfil() {
      if(Gate::denies('perfil-view')){
        abort(403,"Não autorizado!");
      }
      $user = Auth()->user();

      $caminhos = [
      ['url'=>'/admin','titulo'=>'perfil'],
      ['url'=>'','titulo'=>'Editar Perfil']
      ];

      return view('site.perfil',compact('user','caminhos'));

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

      return redirect()->route('site.perfil')->with('status', 'Perfil atualizado!');
    }
}
