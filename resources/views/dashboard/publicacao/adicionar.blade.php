@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	</div>
	@include('dashboard._caminho')
	<div class="card-panel white">
			<form action="{{ route('publicacoes.store') }}" method="post">
			{{csrf_field()}}
			@include('dashboard.publicacao._form')
			<button class="btn blue">Adicionar</button>
			</form>
	</div>	
</div>	

@endsection