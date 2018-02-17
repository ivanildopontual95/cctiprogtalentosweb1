@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	</div>

		@include('dashboard._caminho')
		
		<div class="row">
			<form action="{{ route('publicacoes.cargo.store',$publicacao->id) }}" method="post">
				{{csrf_field()}}
				<div class="input-field col s3">
					<input  type="text" name="escolaridade" class="validate" value="{{ isset($cargo->escolaridade) && !old('escolaridade') ? $cargo->escolaridade : '' }}{{old('escolaridade')}}">
					<label for="escolaridade">Escolaridade</label>
				</div>
				<div class="input-field col s6">
					<input type="text" name="cargo" class="validate" value="{{ isset($cargo->cargo) && !old('cargo') ? $cargo->cargo : '' }}{{old('cargo')}}">
					<label for="cargo">Cargo</label>
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
						<th>Ação</th>

					</tr>
				</thead>

				<tbody>
					@foreach($publicacao->cargos as $cargo)
						<tr>

						<td>{{ $cargo->escolaridade }}</td>
						<td>{{ $cargo->cargo }}</td>

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

@endsection