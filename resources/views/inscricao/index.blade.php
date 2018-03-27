@extends('layouts.app') @section('content')

<div class="container">
    <div class="row">
    </div>
    <div class="row">
        <center>
            <div class="row">
            </div>
            <h4>Processo Seletivo</h4>
        </center>
        <div class="col s12">
            <div class="card-panel white">
                <div class="row">
                    <table>
                        <thead>
                            <tr>
                                <th>Seletivos</th>
                                <th>Inscrições</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($publicacoes as $publicacao)
                                <?php 
                                    $publicacao->status = false;
                                    $publicacao->periodo = false; 
                                    $publicacao->inscrito = false;
                                    $data = date('Y-m-d');
                                    $hora = date('H:i');                                 
                                ?>
                                @if($data == $publicacao->dataInicio && $hora >= $publicacao->horaInicio)
                                    <?php $publicacao->periodo = true; $publicacao->status = true; ?>
                                @endif
                                @if($data > $publicacao->dataInicio)
                                    <?php $publicacao->periodo = true; $publicacao->status = true; ?>
                                @endif
                                @if($data == $publicacao->dataTermino && $hora > $publicacao->horaTermino)
                                    <?php $publicacao->periodo = false; ?>
                                @endif
                                @if($data > $publicacao->dataTermino)
                                    <?php $publicacao->periodo = false; ?>
                                @endif
                                @if($publicacaoInscrito)
                                    @foreach($publicacaoInscrito as $value)
                                        @if($value->id == $publicacao->id)
                                            <?php $publicacao->inscrito = true; ?>
                                        @endif
                                    @endforeach
                                @endif
                                <tr>
                                    <td>{{ $publicacao->titulo }}</td>
                                    <td>{{date('d/m/Y', strtotime($publicacao->dataInicio))}} - {{date('H:i', strtotime($publicacao->horaInicio))}}h até {{date('d/m/Y', strtotime($publicacao->dataTermino))}}
                                        - {{date('H:i', strtotime($publicacao->horaTermino))}}h</td>

                                    <td>
                                        @if($publicacao->status)
                                            @if($publicacao->inscrito)
                                                <a class="btn disabled">Inscrito</a>
                                            @elseif($publicacao->periodo)
                                                <a title="Inscrever" class="btn green" href="{{route('inscricoes.create', $publicacao)}}">Inscrever</a>
                                            @else
                                                <a class="btn disabled">Encerrada</a>
                                            @endif
                                        @else
                                            <a class="btn disabled">Aguarde</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
            </div>
            <div class="row" align="center">
                {{ $publicacoes->links() }}
            </div>

        </div>
    </div>
</div>

@endsection