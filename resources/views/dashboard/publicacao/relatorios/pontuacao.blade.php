@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    </div>

    @include('dashboard._caminho')

    <div class="row">
    </div>
    <h5 class="center">Pontuação da Candidatura de {{$inscricao->nomeCompleto}}</h5>
    <div class="row">
    </div>
    <div class="row">
        <div class="card-panel white">
            <div class="row">
                <div class="col s12">
                    <?php 
                        $cargos = $publicacao->cargos()->where('id',$inscricao->pivot->cargo_id)->get();
                        foreach($cargos as $cargo){
                            $pontuacao = $cargo->pontuacao; 
                        }
                    ?>
                    <form action="{{ route('pontuacao.update',[$publicacao->id, $inscricao->id]) }}" method="post">
                        {{csrf_field()}}
                        {{ method_field('PUT') }}

                        <div class="input-field col s12">
                            <input type="text" name="pontuacao_inscrito" value="{{ old('pontuacao_inscrito', $status) }}" class="validate" autofocus>
                        <label>Pontuação do Candidato Pontução maxima: {{$pontuacao}}</label>
                        </div>
                        


                        <div class="col s12">
                            <button class="btn blue">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection