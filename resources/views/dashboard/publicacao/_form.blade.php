<div class="input-field">
	<input type="text" name="titulo" class="validate" value="{{ isset($publicacao->titulo) && !old('titulo') ? $publicacao->titulo : '' }}{{old('titulo')}}">
	<label>Titulo da publicação</label>
</div>

<div class="input-field">
	<input type="text" name="descricao" class="validate" value="{{ isset($publicacao->descricao) && !old('descricao') ? $publicacao->descricao : '' }}{{old('descricao')}}">
	<label>Descrição</label>
</div>

<div class="input-field">  
	<text>Periodo de Inscrição:</text>
</div>

<div class="input-field col s2">
	<input type="text" name="dataInicio" class="datepicker" value="{{ isset($publicacao->dataInicio) && !old('dataInicio') ? $publicacao->dataInicio : '' }}{{old('dataInicio')}}">   
	<label>Data de início</label>
</div>

<div class="input-field col s2">
	<input type="text" name="horaInicio" class="timepicker" value="{{ isset($publicacao->horaInicio) && !old('horaInicio') ? $publicacao->horaInicio : '' }}{{old('horaInicio')}}">   
	<label>Horário de início</label>
</div>

<div class="input-field col s1">  
</div>

<div class="input-field col s2">
	<input type="text" name="dataTermino" class="datepicker" value="{{ isset($publicacao->dataTermino) && !old('dataTermino') ? $publicacao->dataTermino : '' }}{{old('dataTermino')}}">   
	<label>Data de término</label>
</div>

<div class="input-field col s2">
	<input type="text" name="horaTermino" class="timepicker" value="{{ isset($publicacao->horaTermino) && !old('horaTermino') ? $publicacao->horaTermino : '' }}{{old('horaTermino')}}">   
	<label>Horário de término</label>
</div>