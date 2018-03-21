@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    </div>

    @include('dashboard._caminho')

    <div class="row">
    </div>
    <h5 class="center">Pontuacao da Candidatura de {{$inscricao->nomeCompleto}}</h5>
    <div class="row">
    </div>
    <div class="row">
        <div class="card-panel white">
            <div class="row">
                <div class="col s12">
                    <form action="{{ route('pontuacao.update',[$publicacao->id, $inscricao->id]) }}" method="post">
                        {{csrf_field()}}
                        {{ method_field('PUT') }}

                        <div class="input-field col s12">
                            <label>Pontuação do Candidato</label>
                        </div>
                        <button class="btn blue">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection