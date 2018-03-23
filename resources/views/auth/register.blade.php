@extends('layouts.app')

@section('content')
<div class="background-login">
    <div class="container">
        <div class="row">
        </div>
        <div class="row">
        </div>
        <div class="row">
            <div class="col s12 ">
                <div class="card-panel white">
                    <div class="row">
                        <center><img class="responsive-img" src="/images/cctibulb.png"</i><center>
                        <center><h6>Registre-se</h6></center>
                        <center><label>Cadastre seus dados para acesso!</label></center>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}

                            <div class="input-field col s12">
                                <input type="text" name="name" value="{{ old('name') }}" class="validate" autofocus>
                                <label>Nome</label>
                                @if ($errors->has('name'))
                                    <span>
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-field col s12">
                                <input type="text" name="email" value="{{ old('email') }}" class="validate">
                                <label>E-mail</label>
                                @if ($errors->has('email'))
                                    <span>
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-field col s12">
                                <input type="password"  name="password" value="{{ old('password') }}" class="validate">
                                <label>Senha</label>
                                @if ($errors->has('password'))
                                    <span>
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-field col s12">
                                <input type="password"  name="password_confirmation" value="{{ old('password_confirmation') }}" class="validate">
                                <label>Confirme a senha</label>
                                @if ($errors->has('password_confirmation'))
                                    <span>
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="row">
                            </div>
                            <center><button class="btn green">Cadastrar</button></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
