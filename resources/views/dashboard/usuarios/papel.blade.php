@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
		</div>

		@include('dashboard._caminho')
		<div class="row">
		<h5 class="center">Papel de {{$usuario->name}}</h5>
		</div>
		<div class="row">
			<div class="card-panel white">
				<div class="row">
					<form action="{{route('usuarios.papel.store',$usuario->id)}}" method="post">
					{{ csrf_field() }}
					<div class="input-field col s5">
						<select name="papel_id">
							@foreach($papel as $valor)
							<option value="{{$valor->id}}">{{$valor->nome}}</option>
							@endforeach
						</select>
						<button class="btn blue">Adicionar</button>
					</div>
					</form>
				</div>

			<div class="row">
				<table>
					<thead>
						<tr>

							<th>Papel</th>
							<th>Descrição</th>
							<th>Ação</th>
						</tr>
					</thead>
					<tbody>
					@foreach($usuario->papeis as $papel)
						<tr>
							<td>{{ $papel->nome }}</td>
							<td>{{ $papel->descricao }}</td>

							<td>

								<form action="{{route('usuarios.papel.destroy',[$usuario->id,$papel->id])}}" method="post">
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
</div>
@endsection
