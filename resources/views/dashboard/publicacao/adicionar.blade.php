@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	</div>

	@include('dashboard._caminho')
	<div class="card-panel white">
		<div class="row">
			<form action="{{ route('publicacoes.store') }}" method="post">

				{{csrf_field()}}
				@include('dashboard.publicacao._form')
				<div class="row">
				</div>

				<button class="btn blue">Adicionar</button>
		
			</form>
				
		</div>
	</div>	
</div>
	

@endsection