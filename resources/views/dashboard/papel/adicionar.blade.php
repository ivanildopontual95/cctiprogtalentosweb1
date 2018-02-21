@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	</div>

	@include('dashboard._caminho')
	<div class="card-panel white">
		<div class="row">
			<form action="{{ route('papeis.store') }}" method="post">

			{{csrf_field()}}
			@include('dashboard.papel._form')

			<button class="btn green">Adicionar</button>

				
			</form>
				
		</div>
	</div>
		
</div>
	

@endsection