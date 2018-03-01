@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
		</div>
		@include('dashboard._caminho')

		<div class="row">
			<div class="row">
				<h5 class="left">Lista de Inscritos - {{$publicacao->titulo}}</h5>
			</div>
			<div class="card-panel white">
				<div class="row">
					<table>
						<thead>
							<tr>
								<th>Id</th>
								<th>Nome</th>
								<th>CPF</th>
								<th>Ação</th>
							</tr>
						</thead>
						<tbody>
						@foreach($inscricoes as $inscricao)
							<tr>
								<td>{{ $inscricao->id }}</td>
								<td>{{ $inscricao->nomeCompleto }}</td>
								<td>{{ $inscricao->cpf }}</td>

								<td>

									<a title="Editar" class="btn orange" href="#!"><i class="material-icons">mode_edit</i></a>
									<a title="Editar" class="btn green" href="#!"><i class="material-icons">person_add</i></a>
									<a title="Editar" class="btn blue" href="#!"><i class="material-icons">attach_file</i></a>
									<a title="Editar" class="btn" href="#!"><i class="material-icons">assignment</i></a>
									<a title="Editar" class="btn red" href="#!"><i class="material-icons">delete</i></a>
									
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div> 
@endsection