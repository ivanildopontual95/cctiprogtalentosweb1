@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
		</div>

		@include('dashboard._caminho')
		<h5 class="center">Lista de Permissões de {{$papel->nome}}</h4>
		<div class="card-panel white">
			<div class="row">
				<form action="{{route('papeis.permissao.store',$papel->id)}}" method="post">
				{{ csrf_field() }}
				<div class="input-field col s5">
					<select name="permissao_id">
						@foreach($permissao as $valor)
							<option value="{{$valor->id}}">{{$valor->nome}}</option>
						@endforeach
					</select>
				</div>
					<div class="input-field col s3">
						<button class="btn blue">Adicionar</button>
					</div>
				</form>


			</div>

			<div class="row">
				<table>
					<thead>
						<tr>

							<th>Permissao</th>
							<th>Descrição</th>
							<th>Ação</th>
						</tr>
					</thead>
					<tbody>
					@foreach($papel->permissoes as $permissao)
						<tr>
							<td>{{ $permissao->nome }}</td>
							<td>{{ $permissao->descricao }}</td>

							<td>

								<form action="{{route('papeis.permissao.destroy',[$papel->id,$permissao->id])}}" method="post">
										{{ method_field('DELETE') }}
										{{ csrf_field() }}
										<button title="Deletar" class="btn red"><i class="material-icons">delete</i></button>
								</form>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>

			</div>
		</div>
	</div>

@endsection
