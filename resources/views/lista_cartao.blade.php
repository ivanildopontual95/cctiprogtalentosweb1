<div class="row">
    @foreach($lista as $key => $value)
        <div class="col s12 m12">
            @component('cartao',[
                'titulo'=>$value->titulo,
                'descricao'=>$value->descricao,
                'dataInicio'=>$value->dataInicio,
                'horaInicio'=>$value->horaInicio,
                'dataTermino'=>$value->dataTermino,
                'horaTermino'=>$value->horaTermino,
                'url'=>route('detalhes',[$value->id,str_slug($value->titulo)])
            ])
            @endcomponent
        </div>
    @endforeach
</div>