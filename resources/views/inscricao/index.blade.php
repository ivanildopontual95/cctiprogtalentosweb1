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
                                <th>Seletivo</th>
                                <th>Inscrições</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($publicacoes as $publicacao)
                                <?php $publicacao->inscrito = false; ?>
                                @if($publicacaoInscrito)
                                    @foreach($publicacaoInscrito as $value)
                                        @if($value->id == $publicacao->id)
                                            <?php $publicacao->inscrito = true; ?>
                                        @endif
                                    @endforeach
                                @endif
                            <tr>
                                <td>{{ $publicacao->titulo }}</td>
                                <td>{{$publicacao->dataInicio}} - {{$publicacao->horaInicio}}h até {{$publicacao->dataTermino}}
                                    - {{$publicacao->horaTermino}}h</td>

                                <td>
                                    @if($publicacao->inscrito)
                                        <a class="btn disabled">Inscrito</a>
                                    @else
                                        <a title="Inscrever" class="btn green" href="{{route('inscricoes.create', $publicacao)}}">Inscrever</a>
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
                {{ $publicacoes->links('layouts.pagination') }}
            </div>

        </div>
    </div>
</div>

@endsection