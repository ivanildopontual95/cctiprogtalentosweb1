@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    </div>
    @include('dashboard._caminho')
    <div class="row">
    </div>
    <h5 class="center">Lista de Deferimentos - {{$publicacao->titulo}}</h5>
    <div class="row">
    </div>
    <div class="card-panel white">
        <form class="form-horizontal" action="{{route('publicacoes.relatorios.pdflistadedeferimentos', $publicacao->id)}}">
        {{csrf_field()}}
        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Deferimento</th>
                        <th>Cargo<th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($inscricoes as $inscricao)
                    <tr>
                        <td>{{ $inscricao->id }}</td>
                        <td>{{ $inscricao->nomeCompleto }}</td>
                        <td>{{ $inscricao->cpf }}</td>
                        <?php
                            switch ($inscricao->pivot->deferimento){
                                case 'A':
                                    $inscricao->inscricao_status = 'Aguardando Deferimento';
                                    break;
                                case 'D':
                                    $inscricao->inscricao_status = 'Deferido';
                                    break;
                                case 'I':
                                    $inscricao->inscricao_status = 'Indeferido';
                                    break;
                            }
                        ?>
                        <td>{{ $inscricao->inscricao_status }}</td>
                        <?php 
                            $cargos = $publicacao->cargos()->where('id',$inscricao->pivot->cargo_id)->get();
                            foreach($cargos as $cargo){
                                $inscricao->cargo = $cargo->cargo; 
                            }
                        ?>
                        <td>{{ $inscricao->cargo }}</td>
                        <td>
                            <a title="Deferimento" class="btn blue" href="{{ route('publicacoes.relatorios.deferimento',[$publicacao->id , $inscricao->id]) }}"><i class="material-icons">assignment_turned_in</i></a>
                        </td>
                    </tr>
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