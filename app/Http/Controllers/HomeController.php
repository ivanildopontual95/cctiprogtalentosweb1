<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->papeis[0]->nome == 'Admin' || $user->papeis[0]->nome == 'Gerente do Departamento' ||  $user->papeis[0]->nome == 'Auxiliar do Departamento' ) 
        {
            return view('dashboard.index');
        }elseif($user->papeis[0]->nome == 'Usuário')
        {
            return redirect()->route('inscricoes.index');
        }
    }
}
