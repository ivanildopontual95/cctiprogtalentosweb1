@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	</div>

	@include('admin._caminho')
	
	<div class="row">
		<form action="{{ route('publicacoes.store') }}" method="post">

		{{csrf_field()}}
		@include('admin.publicacao._form')

		<button class="btn green">Adicionar</button>

			
		</form>
			
	</div>
	
</div>
	

@endsection