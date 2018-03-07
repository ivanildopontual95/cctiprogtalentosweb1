@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
	</div>

	@include('dashboard._caminho')
	
	<div class="row">
	<h5 class="center">Relatórios de {{$publicacao->titulo}}</h5>
	</div>
	<div class="row">
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
									<a title="Visualizar Currículo" class="btn green" href="{{ route('publicacoes.relatorio.curriculo',$inscricao->id) }}"><i class="material-icons">work</i></a>
									<a title="Avaliar Inscrito" class="btn" href="{{ route('publicacoes.relatorio.avaliacao',$inscricao->id) }}"><i class="material-icons">assignment</i></a>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection