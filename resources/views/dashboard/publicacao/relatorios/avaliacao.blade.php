@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
    </div>

@include('dashboard._caminho')

    <div class="card-panel white">
        <div class="row">
            <div class="input-field col s12">
                <select>
                    <option value="1">Aguardando Avaliação</option>
                    <option value="2">Deferido</option>
                    <option value="3">Indeferido</option>
                </select>
                <label>Estado da Candidatura</label>
            </div>
        </div>
    </div>
</div>
@endsection