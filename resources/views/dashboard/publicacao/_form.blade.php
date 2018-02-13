<div class="input-field">
	<input type="text" name="titulo" class="validade" value="{{ isset($publicacao->titulo) ? $publicacao->titulo : '' }}">
	<label>Titulo da publicação</label>
</div>

<div class="input-field">
	<input type="text" name="descricao" class="validade" value="{{ isset($publicacao->descricao) ? $publicacao->descricao : '' }}">
	<label>Descrição</label>
</div>

