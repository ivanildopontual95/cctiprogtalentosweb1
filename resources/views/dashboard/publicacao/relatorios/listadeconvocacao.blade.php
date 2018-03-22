@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    </div>
    @include('dashboard._caminho')
    <div class="row">
    </div>
    <h5 class="center">Lista de Convocação - {{$publicacao->titulo}}</h5>
    <div class="row">
    </div>
    <div class="card-panel white">
            <form class="form-horizontal" action="{{route('publicacoes.relatorios.pdflistadeconvocacao', $publicacao->id)}}">
            {{csrf_field()}}
            <div class="row">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Pontuação</th>
                            <th>Convocação</th>
                            <th>Cargo<th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($inscricoes as $inscricao)
                    <?php $inscricao->pivot->orderBy("pontuacao_inscrito","DESC")?>
                        @if($inscricao->pivot->classificacao == 'C')
                            <tr>
                                <td>{{ $inscricao->id }}</td>
                                <td>{{ $inscricao->nomeCompleto }}</td>
                                <td>{{ $inscricao->cpf }}</td>
                                <td>{{ $inscricao->pivot->pontuacao_inscrito }}</td>
                                <?php
                                switch ($inscricao->pivot->convocacao){
                                    case 'A':
                                        $inscricao->inscricao_status = 'Aguardando Convocação';
                                        break;
                                    case 'C':
                                        $inscricao->inscricao_status = 'Convocado';
                                        break;
                                    case 'L':
                                        $inscricao->inscricao_status = 'Lista de Espera';
                                        break;
                                }
                                ?>
                                <td>{{ $inscricao->inscricao_status }}</td>
                                <td>{{ $inscricao->pivot->cargo_id }}</td>
                                <td><a title="Convocação" class="btn blue" href="{{ route('publicacoes.relatorios.convocacao',[$publicacao->id, $inscricao->id]) }}"><i class="material-icons">assignment_ind</i></a></td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
                <div class="row">
                </div>
                <button class="btn green left">Baixar<i class="material-icons left">file_download</i></button>
            </div>
        </form>
    </div>
</div>
@endsection