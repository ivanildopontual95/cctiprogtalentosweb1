@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	</div>
	@include('dashboard._caminho')
	<div class="row">
	</div>
	<h5 class="center">Lista de Publicações</h5>
	<div class="row">
	</div>
		<div class="card-panel white">
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
					@foreach($publicacoes as $publicacao)
						<tr>
							<td>{{ $publicacao->id }}</td>
							<td>{{ $publicacao->titulo }}</td>
							<td>{{ $publicacao->descricao }}</td>

							<td>


								<form action="{{route('publicacoes.destroy',$publicacao->id)}}" method="post">
									@can('publicacoes-edit')
									<a title="Editar" class="btn orange" href="{{ route('publicacoes.edit',$publicacao->id) }}"><i class="material-icons">mode_edit</i></a>
									<a title="Cargos" class="btn" href="{{ route('publicacoes.cargo.index',$publicacao->id)}}"><i class="material-icons">person_add</i></a>
									<a title="Documentos" class="btn blue" href="{{ route('publicacoes.documentos.index',$publicacao->id)}}"><i class="material-icons">attach_file</i></a>
									<a title="Relatórios" class="btn green" href="{{ route('publicacoes.relatorios.index',$publicacao->id)}}"><i class="material-icons">list</i></a>
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
		<a class="btn blue" href="{{route('publicacoes.create')}}">Adicionar</a>
	</div>
	<div class="row">
	</div>
	<div class="row" align="center">
		{{ $publicacoes->links() }}
	</div>
</div>  
@endsection
