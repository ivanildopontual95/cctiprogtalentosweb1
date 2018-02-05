@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <h2>Painel do Administrador</h2>
    </div>    
    
    @include('admin._caminho')

    <div class="row">

        <div class="col s12 m6">
          <div class="card purple darken-2">
            <div class="card-content white-text">
              <span class="card-title">Usuários</span>
              <p>Usuários do Sistema.</p>
            </div>
            <div class="card-action">
              <a href="{{route('usuarios.index')}}">Visualizar</a>
            </div>
          </div>
        </div>

        <div class="col s12 m6">
          <div class="card blue">
            <div class="card-content white-text">
              <span class="card-title">Publicações</span>
              <p>Lista de Publicações.</p>
            </div>
            <div class="card-action">
              <a href="#">Visualizar</a>
            </div>
          </div>
        </div>

        <div class="col s12 m6">
          <div class="card green">
            <div class="card-content white-text">
              <span class="card-title">Perfil</span>
              <p>Alterar Dados do Perfil.</p>
            </div>
            <div class="card-action">
              <a href="#">Visualizar</a>
            </div>
          </div>
        </div>

        <div class="col s12 m6">
          <div class="card orange darken-4">
            <div class="card-content white-text">
              <span class="card-title">Papéis</span>
              <p>Listar Papéis do Sistema.</p>
            </div>
            <div class="card-action">
              <a href="{{route('papeis.index')}}">Visualizar</a>
            </div>
          </div>
        </div>

      </div>

    
</div>
@endsection
