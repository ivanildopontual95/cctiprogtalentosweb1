@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    </div>
    @include('dashboard._caminho')

    <div class="row">
    @can('perfil-view')
        <div class="col s12 m6">
          <div class="card green darken-2">
            <div class="card-content white-text">
              <span class="card-title">Perfil</span>
              <p>Alterar Dados de Perfil</p>
            </div>
            <div class="card-action">
              <a href="{{route('perfil.perfil')}}">Visualizar</a>
            </div>
          </div>
        </div>
      @endcan
      @can('publicacoes-view')
        <div class="col s12 m6">
          <div class="card grey darken-2">
            <div class="card-content white-text">
              <span class="card-title">Publicações</span>
              <p>Gerenciar Publicações</p>
            </div>
            <div class="card-action">
              <a href="{{route ('publicacoes.index')}}">Visualizar</a>
            </div>
          </div>
        </div>
      @endcan
      @can('usuario-view')
        <div class="col s12 m6">
          <div class="card cyan darken-2">
            <div class="card-content white-text">
              <span class="card-title">Usuários</span>
              <p>Gerenciar Usuários do Sistema</p>
            </div>
            <div class="card-action">
              <a href="{{route('usuarios.index')}}">Visualizar</a>
            </div>
          </div>
        </div>
      @endcan
      @can('papel-view')  
        <div class="col s12 m6">
          <div class="card teal darken-2">
            <div class="card-content white-text">
              <span class="card-title">Papéis</span>
              <p>Configurações de Acesso</p>
            </div>
            <div class="card-action">
              <a href="{{route('papeis.index')}}">Visualizar</a>
            </div>
          </div>
        </div>
      @endcan
      @can('perfil-view')
        <div class="col s12 m6">
          <div class="card indigo darken-2">
            <div class="card-content white-text">
              <span class="card-title">Processos Seletivos</span>
              <p>Acessar os Processos Seletivos</p>
            </div>
            <div class="card-action">
              <a href="{{route('inscricoes.index')}}">Visualizar</a>
            </div>
          </div>
        </div>
      @endcan
    </div>
    
</div>
@endsection
