@extends('layouts.app') @section('content')

<div class="container">
    <div class="row">
    </div>

    @include('dashboard._caminho')

    <div class="row">
    </div>

    <h5 class="center">Lista de Inscritos - {{$publicacao->titulo}}</h5>
    <div class="row">
    </div>
    <div class="row">
        <div class="card-panel white">
            <form class="form-horizontal" action="{{route('publicacoes.relatorios.pdflistadeinscritos', $publicacao->id)}}">
                {{csrf_field()}}
                <div class="row">
                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Cargo
                                    <th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inscricoes as $inscricao)
                            <tr>
                                <td>{{ $inscricao->id }}</td>
                                <td>{{ $inscricao->nomeCompleto }}</td>
                                <td>{{ $inscricao->cpf }}</td>
                                <td>{{ $inscricao->pivot->cargo_id }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button class="btn green left">Baixar
                        <i class="material-icons left">file_download</i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection