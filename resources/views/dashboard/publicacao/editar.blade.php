@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	</div>
	@include('dashboard._caminho')
	<div class="row">
		<h5 class="center">Editar {{$publicacao->titulo}}</h5>
		</div>
	<div class="row">
		<div class="card-panel white">
			<form action="{{ route('publicacoes.update',$publicacao->id) }}" method="post">
			{{csrf_field()}}
			{{ method_field('PUT') }}
			@include('dashboard.publicacao._form')
			<button class="btn blue">Atualizar</button>
			</form>
		</div>
	</div>
</div>
@endsection