@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	</div>
	
	@include('dashboard._caminho')
	<div class="row">
	<h5 class="left">Relatórios de {{$publicacao->titulo}}</h5>
	</div>
	<div class="row">
		<div class="card-panel white">
			<div class="row">
					<div class="collection">
						<a href="{{ route('publicacoes.relatorio.listadeinscritos',$publicacao->id) }}" class="collection-item">Lista de Inscritos</a>
						<a href="#!" class="collection-item">#!</a>
						<a href="#!" class="collection-item">#!</a>
						<a href="#!" class="collection-item">#!</a>
					</div>
			</div>
		</div>
	</div>
</div>
@endsection