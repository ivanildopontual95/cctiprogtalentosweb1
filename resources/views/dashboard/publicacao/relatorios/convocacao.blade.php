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
                    <form action="{{ route('inscricoes.update',$inscricao->id) }}" method="post">
                        {{csrf_field()}}
                        {{ method_field('PUT') }}
                            
                        <div class="input-field col s12">
                            <select>
                                <option value="1">Aguardando Convocação</option>
                                <option value="2">Convocado</option>
                                <option value="3">Lista de Espera</option>
                            </select>
                            <label>Estado da Convocação</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="icon_prefix" type="text" name="descricao" data-length="280" class="validate" value="{{ isset($publicacao->descricao) && !old('descricao') ? $inscricao->descricao : '' }}{{old('descricao')}}">
                            <label>Obs.:</label>
                        </div>
                        <button class="btn blue">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection