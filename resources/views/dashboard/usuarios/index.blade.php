@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
		</div>
		@include('dashboard._caminho')
		<div class="row">
		<h5 class="left">Usuários do Sistema</h5>
		</div>
		<div class="row">
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
								<a title="Papel" class="btn blue" href="{{route('usuarios.papel',$usuario->id)}}"><i class="material-icons">visibility</i></a>				
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
		<a class="btn blue" href="{{route('usuarios.create')}}">Adicionar</a>
	</div>
</div>

@endsection
