@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
	</div>
	@include('dashboard._caminho')
	<div class="row">
	</div>
	<h5 class="center">Relatórios de {{$publicacao->titulo}}</h5>
	<div class="row">
  </div>
  
    <div class="row">
      <div class="col s12">
        <div class="card green darken-1">
          <div class="card-content white-text">
            <span class="card-title">Lista de Inscritos</span>
            <p>Gerenciar Lista de Inscrições da Publicação</p>
          </div>
          <div class="card-action">
            <a href="{{route('publicacoes.relatorios.listadeinscritos', $publicacao->id)}}">Visualizar</a>
          </div>
        </div>
      </div>

      <div class="col s12">
        <div class="card light-blue darken-4">
          <div class="card-content white-text">
            <span class="card-title">Deferimentos</span>
            <p>Realizar Deferimentos de Candidaturas</p>
          </div>
          <div class="card-action">
            <a href="{{route ('publicacoes.relatorios.listadedeferimentos',$publicacao->id)}}">Visualizar</a>
          </div>
        </div>
      </div>

      <div class="col s12">
        <div class="card purple darken-2">
          <div class="card-content white-text">
            <span class="card-title">Lista de Classificados</span>
            <p>Gerenciar Lista de Classificados</p>
          </div>
          <div class="card-action">
            <a href="{{route('publicacoes.relatorios.listadeclassificados',$publicacao->id)}}">Visualizar</a>
          </div>
        </div>
      </div>

      <div class="col s12">
        <div class="card teal lighten-1">
          <div class="card-content white-text">
            <span class="card-title">Lista de Pontuação</span>
            <p>Gerenciar Lista de Pontuação</p>
          </div>
          <div class="card-action">
            <a href="{{route('publicacoes.relatorios.listadepontuacao',$publicacao->id)}}">Visualizar</a>
          </div>
        </div>
      </div>

      <div class="col s12">
        <div class="card deep-orange accent-3">
          <div class="card-content white-text">
            <span class="card-title">Lista de Convocação</span>
            <p>Listar Convocação de Aprovados na Publicação</p>
          </div>
          <div class="card-action">
            <a href="{{route('publicacoes.relatorios.listadeconvocacao',$publicacao->id)}}">Visualizar</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection