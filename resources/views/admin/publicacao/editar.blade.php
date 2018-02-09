@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	</div>
	@include('admin._caminho')
	<div class="row">
		<form action="{{ route('publicacao.update',$registro->id) }}" method="post">

		{{csrf_field()}}
		{{ method_field('PUT') }}
		@include('admin.publicacao._form')

		<button class="btn blue">Atualizar</button>

			
		</form>
			
	</div>
	
</div>
	

@endsection