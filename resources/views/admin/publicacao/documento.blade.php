@extends('layouts.app')

@section('content')
	<div class="container">
		<h2 class="center">Lista de Arquivos</h2>

		@include('admin._caminho')
		<div class="row">
			<table>
				<thead>
					<tr>
						<th>Id</th>
						<th>Titulo</th>
						<th>Ordem</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
				
				</tbody>
			</table>

		</div>
		<div class="row">
			<a class="btn blue" href="#">Adicionar</a>
		</div>
	</div>

@endsection
