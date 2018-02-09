@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
		</div>
		@include('admin._caminho')
		<div class="row">
			<table>
				<thead>
					<tr>
						<th>Id</th>
						<th>Titulo</th>
						<th>Descrição</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($registros as $registro)
					<tr>
						<td>{{ $registro->id }}</td>
						<td>{{ $registro->titulo }}</td>
						<td>{{ $registro->descricao }}</td>

						<td>


							<form action="{{route('publicacao.destroy',$registro->id)}}" method="post">
								@can('publicacoes-edit')
								<a title="Editar" class="btn orange" href="{{ route('publicacao.edit',$registro->id) }}"><i class="material-icons">mode_edit</i></a>
								<a title="Documentos" class="btn blue" href="{{ route('publicacao.documento.index',$registro)}}"><i class="material-icons">note_add</i></a>
								@endcan				
								@can('publicacoes-delete')
									{{ method_field('DELETE') }}
									{{ csrf_field() }}
									<button title="Deletar" class="btn red"><i class="material-icons">delete</i></button>
								@endcan

							</form>








						</td>
					</tr>
				@endforeach
				</tbody>
			</table>

		</div>
		<div class="row">
			<a class="btn blue" href="{{route('publicacao.create')}}">Adicionar</a>
		</div>
	</div>

@endsection
