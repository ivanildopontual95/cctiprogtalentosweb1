<div class="row">
    @foreach($lista as $key => $value)
        <div class="col s12 m3">
            @component('componentes.cartao',[
                'titulo'=>$value->titulo,
                'descricao'=>$value->descricao,
                'url'=>$value->url
                ])
            @endcomponent
        </div>
    @endforeach

</div>