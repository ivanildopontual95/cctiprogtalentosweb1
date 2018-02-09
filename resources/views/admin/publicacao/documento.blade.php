@extends('layouts.app')

@section('content')
	<div class="container">
			<div class="row">
				</div>

		@include('admin._caminho')
		
		
		  <div class="row">

			<form action="{{ route('publicacao.documento.store',$publicacao->id) }}" method="post" enctype="multipart/form-data" >
			
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
	
							<th>Id</th>
							<th>Titulo</th>
							<th>Ação</th>
						</tr>
					</thead>
					<tbody>
					
					</tbody>
				</table>
	
			</div>
	
	</div>

@endsection
