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
                        <p><strong>Período de Inscrições:</strong> de {{$publicacao->dataInicio}} - {{$publicacao->horaInicio}}h até {{$publicacao->dataTermino}} - {{$publicacao->horaTermino}}h (Horário de Boa Vista).</p>
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
                    <div class="card-action">
                        <a href="{{route('login')}}">Inscreva-se!</a>
                    </div>
                </div>
            </div>
        </div>
        
        </div>
    </div>
</div>

@endsection
