@extends('layouts.app')

@section('content')

        <div class="container">
            <div class="row">
            </div>
            <div class="row">
                <center><h4>Confirmação do Seletivo</h4></center>
                <div class="col s12">
                    <div class="card-panel white">
                    <center>
                        <div class="row">
                            <h5>{{$publicacao->titulo}}</h5>
                            <p>Inscrição realizada com sucesso!</p>
                        </div>
                    </center> 
                    </div>
                </div>
            </div>
        </div>
    
@endsection