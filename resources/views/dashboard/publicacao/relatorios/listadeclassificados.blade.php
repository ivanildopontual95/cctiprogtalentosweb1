@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    </div>
    @include('dashboard._caminho')
    <div class="row">
    </div>
    <h5 class="center">Lista de Classificados - {{$publicacao->titulo}}</h5>
    <div class="row">
    </div>
        <div class="card-panel white">
            <form class="form-horizontal" action="{{route('publicacoes.relatorios.pdflistadeclassificados', $publicacao->id)}}">
            {{csrf_field()}}
            <div class="row">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Classificação</th>
                        <th>Cargo<th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($inscricoes as $inscricao)
                    @if($inscricao->pivot->deferimento == 'D')
                        <tr>
                            <td>{{ $inscricao->id }}</td>
                            <td>{{ $inscricao->nomeCompleto }}</td>
                            <td>{{ $inscricao->cpf }}</td>
                            <?php
                                switch ($inscricao->pivot->classificacao){
                                    case 'A':
                                        $inscricao->inscricao_status = 'Aguardando Classificação';
                                        break;
                                    case 'C':
                                        $inscricao->inscricao_status = 'Classificado';
                                        break;
                                    case 'D':
                                        $inscricao->inscricao_status = 'Desclassificado';
                                        break;
                                }
                            ?>
                            <td>{{ $inscricao->inscricao_status }}</td>
                            <td>{{ $inscricao->pivot->cargo_id }}</td>
                            <td>
                                <a title="Avaliação" class="btn blue" href="{{ route('publicacoes.relatorios.classificacao',[$publicacao->id, $inscricao->id]) }}"><i class="material-icons">assignment</i></a>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            <button class="btn green left">Baixar<i class="material-icons left">file_download</i></button>
        </div>
    </form>
    </div>
</div>
@endsection