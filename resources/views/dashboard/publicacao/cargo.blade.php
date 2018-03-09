@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	</div>

	@include('dashboard._caminho')

	<div class="row">
	</div>
	<h5 class="center">Cargos de {{$publicacao->titulo}}</h5>
	<div class="row">
	</div>
	<div class="row">
		<div class="card-panel white">
			<div class="row">
				<form action="{{ route('publicacoes.cargo.store',$publicacao->id) }}" method="post">
					{{csrf_field()}}
					<div class="input-field col s3">
						<input  type="text" name="escolaridade" class="validate" value="{{ isset($cargo->escolaridade) && !old('escolaridade') ? $cargo->escolaridade : '' }}{{old('escolaridade')}}">
						<label for="escolaridade">Escolaridade</label>
					</div>
					<div class="input-field col s6">
						<input type="text" name="cargo" class="autocomplete" class="validate" value="{{ isset($cargo->cargo) && !old('cargo') ? $cargo->cargo : '' }}{{old('cargo')}}">
						<label for="cargo">Cargo</label>
					</div>
					<div class="input-field col s2">
						<input type="number" name="pontuacao" min="0" max="10" class="validate" value="{{ isset($pontuacao->pontuacao) && !old('pontuacao') ? $pontuacao->pontuacao : '' }}{{old('pontuacao')}}">
						<label for="pontuacao">Pontuação</label>
					</div>
					<div class="input-field col s3">
					<button  class="btn green">Adicionar</button>
					</div>	
				</form>
			</div>

			<div class="row">
				<table>
					<thead>
						<tr>

							<th>Escolaridade</th>
							<th>Cargo</th>
							<th>Pontuação</th>
							<th>Ação</th>

						</tr>
					</thead>

					<tbody>
						@foreach($publicacao->cargos as $cargo)
							<tr>

							<td>{{ $cargo->escolaridade }}</td>
							<td>{{ $cargo->cargo }}</td>
							<td>{{ $cargo->pontuacao }}</td>

							<td>
								<form action="{{route('publicacoes.cargo.destroy',[$publicacao->id,$cargo->id])}}" method="post">
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