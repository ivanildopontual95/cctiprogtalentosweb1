@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    </div>
    <div class="row">
        <div class="col s4 offset-s4">
            <div class="card-panel white"> 
                <center><img class="" src="/images/user.png"</i><center>
                <p>Login</p>
                <label>Insira suas Credenciais</label>
                    @if (session('status'))
                        <div class="card">
                            {{ session('status') }}
                        </div>
                    @endif
      
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                        <div class="input-field">
                            <input type="text" name="email" value="{{ old('email') }}" class="validate" autofocus>
                            <label>E-mail</label>
                            @if ($errors->has('email'))
                                <span>
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-field">
                            <input type="password"  name="password" value="{{ old('password') }}" class="validate">
                            <label>Senha</label>
                            @if ($errors->has('password'))
                                <span>
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="checkbox">
                                <input type="checkbox" id="remember" {{ old('remember') ? 'checked' : '' }}/>
                                <label for="remember">Lembrar-me</label>
                            </div>
                        </div>
                        <div class="row">
                            <center><a href="{{ url('/password/reset') }}">Esqueceu sua Senha?</a><center>
                        </div>
                        <div class="row">
                            <button class="btn blue">Entrar</button>
                        </div>
                    </form>
                    <div class="divider">ou</div>
                    <div class="row">
                    </div>
                <a title="Registrar" class="btn green" href="{{ url('/register') }}">Registre-se</a>
            </div>
        </div>
    </div>
</div>
    
@endsection