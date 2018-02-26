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
                                <h4>Cargos do Seletivo</h4>
                            </div>
                            <form action="{{route('inscricoes.cargo.store', $publicacao)}}" method="post">
                                {{ csrf_field() }}
                                <div class="input-field">
                                    <select name="cargo_id">
                                        @foreach($cargo as $valor)                                       
                                        <optgroup label="{{$valor->escolaridade}}">
                                            <option value="{{$valor->id}}">{{$valor->cargo}}</option>
                                        </optgroup>
                                        @endforeach
                                        
                                    </select>
                                    <button class="btn green">Confirmar</button>
                                </div>
                            </form>                      
                        <center> 
                    </div>
                </div>
            </div>
        </div>
    
@endsection