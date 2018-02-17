<div class="input-field">
	<input type="text" name="titulo" class="validade" value="{{ isset($publicacao->titulo) && !old('titulo') ? $publicacao->titulo : '' }}{{old('titulo')}}">
	<label>Titulo da publicação</label>
</div>

<div class="input-field">
	<input type="text" name="descricao" class="validade" value="{{ isset($publicacao->descricao) && !old('descricao') ? $publicacao->descricao : '' }}{{old('descricao')}}">
	<label>Descrição</label>
</div>

<div class="input-field">  
	<text>Periodo de Inscrição:</text>
</div>

<div class="input-field col s3">
	<input type="text" name="dataInicio" class="datepicker" value="{{ isset($publicacao->dataInicio) && !old('dataInicio') ? $publicacao->dataInicio : '' }}{{old('dataInicio')}}">   
	<label>Data de início</label>
</div>

<div class="input-field col s3">
	<input type="text" name="dataTermino" class="datepicker" value="{{ isset($publicacao->dataTermino) && !old('dataTermino') ? $publicacao->dataTermino : '' }}{{old('dataTermino')}}">   
	<label>Data de termino</label>
</div>
