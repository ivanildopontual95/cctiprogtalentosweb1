<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Papel;
use Illuminate\Support\Facades\Gate;
class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('usuario-view')){
          abort(403,"Não autorizado!");
        }
        $usuarios = User::all();
        $caminhos = [
            ['url'=>'/dashboard','titulo'=>'Painel Principal'],
            ['url'=>'','titulo'=>'Usuários'],
        ];
        return view('dashboard.usuarios.index',compact('usuarios','caminhos'));
    }

    public function papel($id)
    {
        if(Gate::denies('usuario-edit')){
          abort(403,"Não autorizado!");
        }  
        $usuario = User::find($id);
        $papel = Papel::all();
        $caminhos = [
            ['url'=>'/dashboard','titulo'=>'Painel Principal'],
            ['url'=>route('usuarios.index'),'titulo'=>'Usuários'],
            ['url'=>'','titulo'=>'Papel'],
        ];
      return view('dashboard.usuarios.papel',compact('usuario','papel','caminhos'));
    }

    public function papelStore(Request $request,$id)
    {
        if(Gate::denies('usuario-edit')){
          abort(403,"Não autorizado!");
        }
        $usuario = User::find($id);
        $dados = $request->all();
        $papel = Papel::find($dados['papel_id']);
        $usuario->adicionaPapel($papel);
        return redirect()->back();
    }

    public function papelDestroy($id,$papel_id)
    {
      if(Gate::denies('usuario-edit')){
          abort(403,"Não autorizado!");
        }  
      $usuario = User::find($id);
      $papel = Papel::find($papel_id);
      $usuario->removePapel($papel);
      return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        if(Gate::denies('usuario-create')){
            abort(403,"Não autorizado!");
        }
        $user = Auth()->user();

        $caminhos = [
            ['url'=>'/dashboard','titulo'=>'Painel Principal'],
            ['url'=>route('usuarios.index'),'titulo'=>'Usuários'],
            ['url'=>'','titulo'=>'Adicionar Usuário']
        ];

        return view('dashboard.usuarios.adicionar',compact('user','caminhos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    /**
     * 
     * Define validação de campos.
     * 
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * 
     * Permite criar usuário.
     * 
     */

    protected function store(Request $request)
    {
        if(Gate::denies('usuario-create')){
          abort(403,"Não autorizado!");
        }

        $data = ($request->all());

        $user = Auth()->user();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    
        if(User:: all()->count ()== 0){
            $user->adicionaPapel('Admin');
        }

        $user->adicionaPapel('Usuário');
        return redirect()->route('usuarios.index');
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
       if(Gate::denies('usuario-edit')){
          abort(403,"Nao autorizado!");
        }
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
        if(Gate::denies('usuario-edit')){
          abort(403,"Nao autorizado!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
        User::find($id)->delete();
        return redirect()->route('usuarios.index');
    }
}
