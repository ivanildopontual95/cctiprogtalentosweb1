@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
	</div>

	@include('dashboard._caminho')
	
	<div class="row">
	</div>
	<h5 class="center">Relatórios de {{$publicacao->titulo}}</h5>
	<div class="row">
	</div>
	<div class="row">
		<div class="card-panel white">
			<div class="row">

					<div class="col s12">
						<ul class="tabs">                       
							<li class="tab col s3">
								<a href="#listadeinscritos" class="teal-text lighten-1-text">Lista de Inscrições</a>
							</li>
							<li class="tab col s3">
								<a href="#listadedeferimentos" class="teal-text lighten-1-text">Lista de Deferimentos</a>
							</li>
							<li class="tab col s3">
								<a href="#listadeclassificados" class="teal-text lighten-1-text">Lista de Classificação</a>
							</li>
							<li class="tab col s3">
								<a href="#listadeconvocacao" class="teal-text lighten-1-text">Lista de Convocação</a>
							</li>
							<div class="indicator teal lighten-1" style="z-index:1"></div> 
						</ul>
					</div>

					<div id="listadeinscritos" class="col s12">
						<div class="row">
						</div>
						<table>
							<thead>
								<tr>
									<th>Id</th>
									<th>Nome</th>
									<th>CPF</th>
									<th>Cargo<th>

								</tr>
							</thead>
							<tbody>
							@foreach($inscricoes as $inscricao)
								<tr>
									<td>{{ $inscricao->id }}</td>
									<td>{{ $inscricao->nomeCompleto }}</td>
									<td>{{ $inscricao->cpf }}</td>
									<td>{{ $inscricao->pivot->cargo_id }}</td>
								</tr>
							@endforeach
							</tbody>
						</table>
						<button class="btn green left">Baixar<i class="material-icons left">file_download</i></button>
					</div>
					<div id="listadedeferimentos" class="col s12">
							<div class="row">
							</div>
						<table>
							<thead>
								<tr>
									<th>Id</th>
									<th>Nome</th>
									<th>CPF</th>
									<th>Cargo<th>
									<th>Deferimento</th>
									<th>Ação</th>
								</tr>
							</thead>
							<tbody>
							@foreach($inscricoes as $inscricao)
								<tr>
									<td>{{ $inscricao->id }}</td>
									<td>{{ $inscricao->nomeCompleto }}</td>
									<td>{{ $inscricao->cpf }}</td>
									<td>{{ $inscricao->pivot->cargo_id }}</td>
									<td>{{ $inscricao->deferimento }}</td>
									<td>
										<a title="Deferimento" class="btn blue" href="{{ route('publicacoes.relatorio.deferimento',$inscricao->id) }}"><i class="material-icons">assignment_turned_in</i></a>
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
						<button class="btn green left">Baixar<i class="material-icons left">file_download</i></button>
					</div>

					<div id="listadeclassificados" class="col s12">
							<div class="row">
							</div>
						<table>
							<thead>
								<tr>
									<th>Id</th>
									<th>Nome</th>
									<th>CPF</th>
									<th>Cargo<th>
									<th>Classificação</th>
									<th>Pontuação</th>
									<th>Ação</th>
								</tr>
							</thead>
							<tbody>
							@foreach($inscricoes as $inscricao)
								<tr>
									<td>{{ $inscricao->id }}</td>
									<td>{{ $inscricao->nomeCompleto }}</td>
									<td>{{ $inscricao->cpf }}</td>
									<td>{{ $inscricao->pivot->cargo_id }}</td>
									<td>{{ $inscricao->classificacao }}</td>
									<td>{{ $inscricao->pontuacao }}</td>
									<td>
										<a title="Avaliação" class="btn blue" href="{{ route('publicacoes.relatorio.avaliacao',$inscricao->id) }}"><i class="material-icons">assignment</i></a>
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
						<button class="btn green left">Baixar<i class="material-icons left">file_download</i></button>
					</div>

					<div id="listadeconvocacao" class="col s12">
							<div class="row">
							</div>
						<table>
							<thead>
								<tr>
									<th>Id</th>
									<th>Nome</th>
									<th>CPF</th>
									<th>Cargo<th>
									<th>Classificação</th>
									<th>Pontuação</th>
									<th>Convocação</th>
									<th>Ação</th>
								</tr>
							</thead>
							<tbody>
							@foreach($inscricoes as $inscricao)
								<tr>
									<td>{{ $inscricao->id }}</td>
									<td>{{ $inscricao->nomeCompleto }}</td>
									<td>{{ $inscricao->cpf }}</td>
									<td>{{ $inscricao->pivot->cargo_id }}</td>
									<td>{{ $inscricao->classificacao }}</td>
									<td>{{ $inscricao->pontuacao }}</td>
									<td>{{ $inscricao->convocacao }}</td>
									<td>
										<a title="Deferimento" class="btn blue" href="{{ route('publicacoes.relatorio.convocacao',$inscricao->id) }}"><i class="material-icons">assignment_turned_in</i></a>
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
						<button class="btn green left">Baixar<i class="material-icons left">file_download</i></button>
					</div>
			</div>
		</div>
	</div>
</div>
@endsection