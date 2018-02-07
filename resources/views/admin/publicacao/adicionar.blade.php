@extends('layouts.app')

@section('content')
<div class="container">
	<h2 class="center">Adicionar Publicação</h2>

	@include('admin._caminho')
	
	<div class="row">
		<form action="{{ route('publicacao.store') }}" method="post">

		{{csrf_field()}}
		@include('admin.publicacao._form')

		<button class="btn green">Adicionar</button>

			
		</form>
			
	</div>
	
</div>
	

@endsection