<div class="input-field">
	<input type="text" name="titulo" class="validade" value="{{ isset($registro->titulo) ? $registro->titulo : '' }}">
	<label>Titulo da publicação</label>
</div>

<div class="input-field">
	<input type="text" name="descricao" class="validade" value="{{ isset($registro->descricao) ? $registro->descricao : '' }}">
	<label>Descrição</label>
</div>

