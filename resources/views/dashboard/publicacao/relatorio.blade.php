@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	</div>
	@include('dashboard._caminho')
	<div class="card-panel white">
		<form action="{{ route('publicacoes.update',$publicacao->id) }}" method="post">
		{{csrf_field()}}
		{{ method_field('PUT') }}
		@include('dashboard.publicacao._form')
		<button class="btn blue">Atualizar</button>
		</form>
	</div>
</div>
@endsection