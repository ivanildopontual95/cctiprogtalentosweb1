@extends('layouts.app')

@section('content')

        <div class="container">
            <div class="row">
            </div>
            <div class="row">
                <div class="col s6 offset-s3">
                    <div class="card-panel white">
                    <center>
                        <div class="row">
                            <h4>Inscrição do Seletivo</h4>
                        </div>
                            <a class="btn green" href="{{route('inscricoes.create')}}">Criar cadastro</a>
                            <a class="btn green" href="{{route('inscricoes.cargo.index')}}">Cargo</a>     
                            <a class="btn red" href="{{route('experiencias.create')}}">Experiencia</a>                   
                    <center> 
                    </div>
                </div>
            </div>
        </div>
    
@endsection