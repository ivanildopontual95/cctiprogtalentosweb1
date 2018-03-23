@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
    </div>

        <div class="col s12">
            <div class="card">
                <div class="card-stacked">
                    <div class="card-content">
                        <h5>{{$publicacao->titulo}}</h5>
                        <div class="row">
                        </div>
                        <p><strong>Descrição:</strong> {{$publicacao->descricao}}</p>
                        <div class="row">
                        </div>
                        <p><strong>Período de Inscrições:</strong> de {{date('d/m/Y', strtotime($publicacao->dataInicio))}} - {{$publicacao->horaInicio}}h até {{date('d/m/Y', strtotime($publicacao->dataTermino))}} - {{$publicacao->horaTermino}}h (Horário de Boa Vista).</p>
                        <div class="row">
                        </div>
                        <div class="divider"></div>
                        <div class="row">
                        </div>
                        <h5>Editais</h5>
                        <div class="row">
                        </div>
                        @foreach($publicacao->documentos as $documento)
                            <p>{{ $documento->titulo }}</p>
                            <div class="row">
                            </div>
                            <a title="Baixar" class="btn green" href="{{ $documento->url }}" download>Baixar<i class="material-icons left">file_download</i></a>                         
                        @endforeach
                    </div>
                        <?php
                            $publicacao->status = false; 
                            $publicacao->periodo = false;
                            $data = date('d/m/Y');
                            $hora = date('h:i');                                 
                        ?>
                        @if($data >= $publicacao->dataInicio && $hora >= $publicacao->horaInicio)
                            <?php $publicacao->periodo = true; $publicacao->status = true; ?>
                        @endif
                        @if($data >= $publicacao->dataTermino && $hora > $publicacao->horaTermino)
                            <?php $publicacao->periodo = false; ?>
                        @endif
                    <div class="card-action">
                        @if($publicacao->status)
                            @if($publicacao->periodo)
                                <a href="{{route('login')}}">Inscreva-se!</a>
                            @else
                                <a>Inscrições encerradas!</a>
                            @endif    
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        </div>
    </div>
</div>

@endsection
