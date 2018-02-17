@extends('layouts.app')

@section('content')
<div class="container">
		<div class="row">
		</div>
		@include('dashboard._caminho')
	<div class="row">
		<form action="{{ route('papeis.update',$registro->id) }}" method="post">

		{{csrf_field()}}
		{{ method_field('PUT') }}
		@include('dashboard.papel._form')

		<button class="btn blue">Atualizar</button>

			
		</form>
			
	</div>
	
</div>
	

@endsection