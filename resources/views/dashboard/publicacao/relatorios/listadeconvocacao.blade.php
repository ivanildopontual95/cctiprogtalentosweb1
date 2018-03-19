@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    </div>

    @include('dashboard._caminho')

    <div class="row">
    </div>

    <h5 class="center">Lista de Classificados de {{$publicacao->titulo}}</h5>
    <div class="row">
    </div>
    <div class="card-panel white">
        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Cargo<th>
                        <th>Classificação</th>
                        <th>Pontuação</th>
                        <th>Convocação</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($inscricoes as $inscricao)
                    <tr>
                        <td>{{ $inscricao->id }}</td>
                        <td>{{ $inscricao->nomeCompleto }}</td>
                        <td>{{ $inscricao->cpf }}</td>
                        <td>{{ $inscricao->pivot->cargo_id }}</td>
                        <td>{{ $inscricao->classificacao }}</td>
                        <td>{{ $inscricao->pontuacao }}</td>
                        <td>{{ $inscricao->convocacao }}</td>
                        <td>
                            <a title="Convocação" class="btn blue" href="{{ route('publicacoes.relatorios.convocacao',[$publicacao->id, $inscricao->id]) }}"><i class="material-icons">assignment_turned_in</i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    <button class="btn green left">Baixar<i class="material-icons left">file_download</i></button>
</div>
@endsection