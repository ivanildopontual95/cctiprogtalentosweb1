@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <div class="card">
                <div class="card-stacked">
                    <div class="card-content">
                        <h5 class="header">{{$publicacao->titulo}}</h5>
                        <p>{{$publicacao->descricao}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
