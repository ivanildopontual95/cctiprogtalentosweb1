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
				<a class="text" href="http://ccti.boavista.rr.gov.br/novo/contato.php" target=_"blank">Lista de Inscritos</a>
			</div>
		</div>
	</div>
</div>
@endsection