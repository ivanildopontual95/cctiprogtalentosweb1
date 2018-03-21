@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    </div>

    @include('dashboard._caminho')

    <div class="row">
    </div>
    <h5 class="center">Convocação da Candidatura de {{$inscricao->nomeCompleto}}</h5>
    <div class="row">
    </div>
    <div class="row">
        <div class="card-panel white">
            <div class="row">
                <div class="col s12">
                    <form action="{{ route('convocacao.update',[$publicacao->id, $inscricao->id]) }}" method="post">
                        {{csrf_field()}}
                        {{ method_field('PUT') }}

                        <div class="input-field col s12">
                            <select name= "convocacao" >
                                <option value="" disabled selected >Selecione uma opção </option>
                                <option value="A" {{ old('convocacao', $status) == 'A' ? 'selected' : '' }} >Aguardando Convocação</option>
                                <option value="C" {{ old('convocacao', $status) == 'C' ? 'selected' : '' }} >Convocado</option>
                                <option value="L" {{ old('convocacao', $status) == 'L' ? 'selected' : '' }} >Lista de Espera</option>
                            </select>
                            <label>Estado da Convocação</label>
                        </div>
                        <button class="btn blue">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection