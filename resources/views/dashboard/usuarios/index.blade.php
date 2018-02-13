@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
		</div>

		@include('admin._caminho')

		<div class="card-panel white">
		<div class="row">
			<table>
				<thead>
					<tr>
						<th>Id</th>
						<th>Nome</th>
						<th>E-mail</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($usuarios as $usuario)
					<tr>
						<td>{{ $usuario->id }}</td>
						<td>{{ $usuario->name }}</td>
						<td>{{ $usuario->email }}</td>
						<td>

							
							<form action="{{route('usuarios.destroy',$usuario->id)}}" method="post">
								<a title="Papel" class="btn blue" href="{{route('usuarios.papel',$usuario->id)}}"><i class="material-icons">lock_outline</i></a>				
								@can('usuario-delete')
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
	</div>
</div>

@endsection
