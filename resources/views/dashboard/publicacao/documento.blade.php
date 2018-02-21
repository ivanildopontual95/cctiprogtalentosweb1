@extends('layouts.app')

@section('content')
	<div class="container">
			<div class="row">
			</div>

			@include('dashboard._caminho')
		
			<div class="card-panel white">
				<div class="row">
					<form action="{{ route('publicacoes.documento.store',$publicacao->id) }}" method="post" enctype="multipart/form-data" >
				
					{{csrf_field()}}
				
					<div class="file-field input-field">
						<div class="btn">
							<span>Carregar arquivos</span>
							<input type="file" multiple name="arquivos[]">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text">
						</div>
					</div>
				
						<button  class="btn blue">Adicionar</button>
				
					</form>
				
				</div>

				<div class="row">
					<table>
						<thead>
							<tr>
		
								<th>Titulo</th>
								<th>Ação</th>
		
							</tr>
						</thead>

						<tbody>
							@foreach($publicacao->documentos as $documento)
								<tr>
			
									<td>{{ $documento->titulo }}</td>

									<td>
										<form action="{{route('publicacoes.documento.destroy',[$publicacao->id,$documento->id])}}" method="post">
												<a title="Baixar" class="btn green" href="{{ $documento->url }}" download><i class="material-icons">file_download</i></a>
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
