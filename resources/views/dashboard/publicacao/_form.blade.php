<div class="row">
	<div class="input-field col s12">
		<i class="material-icons prefix">mode_edit</i>
		<input id="icon_prefix" type="text" name="titulo"  data-length="110" class="validate" data-length="75" value="{{ isset($publicacao->titulo) && !old('titulo') ? $publicacao->titulo : '' }}{{old('titulo')}}">
		<label for="icon_prefix">Título da Publicação</label>
		@if($errors->has('titulo'))
			<span class="red-text col">
				<text>{{$errors->first('titulo')}}</text>
			</span>
		@endif
	</div>

	<div class="input-field col s12">
		<i class="material-icons prefix">short_text</i>
		<input id="icon_prefix" type="text" name="descricao" data-length="280" class="validate" value="{{ isset($publicacao->descricao) && !old('descricao') ? $publicacao->descricao : '' }}{{old('descricao')}}">
		<label for="icon_prefix">Descrição</label>
		@if($errors->has('descricao'))
			<span class="red-text col">
				<text>{{$errors->first('descricao')}}</text>
			</span>
		@endif
	</div>

	<div class="col s12">
		<text>Periodo de Inscrição:<i class="material-icons left">schedule</i></text>
	</div>
		
	<div class="col s12">
		<div class="col"></div>
		<div class="input-field col s2">
			<input type="date" name="dataInicio" class="datepicker" value="{{ isset($publicacao->dataInicio) && !old('dataInicio') ? $publicacao->dataInicio : '' }}{{old('dataInicio')}}">   
			<label>Data de Início</label>
			@if($errors->has('dataInicio'))
				<span class="red-text col">
					<text>{{$errors->first('dataInicio')}}</text>
				</span>
			@endif
		</div>

		<div class="input-field col s2">
			<input type="text" name="horaInicio" class="timepicker" value="{{ isset($publicacao->horaInicio) && !old('horaInicio') ? $publicacao->horaInicio : '' }}{{old('horaInicio')}}">   
			<label>Horário de Início</label>
			@if($errors->has('horaInicio'))
				<span class="red-text col">
					<text>{{$errors->first('horaInicio')}}</text>
				</span>
			@endif
		</div>

		<div class="input-field col s2">
			<input type="date" name="dataTermino" class="datepicker" value="{{ isset($publicacao->dataTermino) && !old('dataTermino') ? $publicacao->dataTermino : '' }}{{old('dataTermino')}}">   
			<label>Data de Término</label>
			@if($errors->has('dataTermino'))
				<span class="red-text col">
					<text>{{$errors->first('dataTermino')}}</text>
				</span>
			@endif
		</div>

		<div class="input-field col s2">
			<input type="text" name="horaTermino" class="timepicker" value="{{ isset($publicacao->horaTermino) && !old('horaTermino') ? $publicacao->horaTermino : '' }}{{old('horaTermino')}}">   
			<label>Horário de Término</label>
			@if($errors->has('horaTermino'))
				<span class="red-text col">
					<text>{{$errors->first('horaTermino')}}</text>
				</span>
			@endif
		</div>
	</div>
</div>