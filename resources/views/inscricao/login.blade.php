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
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}
                            <div class="input-field {{$errors->has('cpf') ? 'has-error' : ''}}">
                                <input type="text" name="cpf" id="cpf" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}" value="{{ old('cpf') }}" class="validate" autofocus>
                                <label>Insira o seu CPF</label>
                                @if ($errors->has('cpf'))
                                    <span class = "red-text">
                                        <text>{{ $errors->first('cpf') }}</text>
                                    </span>
                                @endif
                            </div>
                            <div class="row">
                            </div>
                                <button class="btn green">Entrar</button>
                        </form>

                        <div class="row">
                            </div>
              
                        <div class="row">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nome Completo</th>
                                        <th>CPF</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($inscricoes as $inscricao)
                                    <tr>
                                        <td>{{ $inscricao->id }}</td>
                                        <td>{{ $inscricao->nomeCompleto }}</td>
                                        <td>{{ $inscricao->cpf }}</td>

                                        <td>

                                            <a title="Editar" class="btn orange" href="{{ route('inscricoes.edit',$inscricao->id) }}"><i class="material-icons">mode_edit</i></a>
                                              
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                            <a class="btn green" href="{{route('inscricoes.create')}}">Criar cadastro</a>
                    <center> 
                    </div>
                </div>
            </div>
        </div>
    
@endsection