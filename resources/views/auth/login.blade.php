@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="row">
           
        <div class="col s6 offset-s3">
        <center><i class="large material-icons">account_circle </i><center>
        <h3 class="center">CCTI Seletivos</h3>
        <p class="center">Insira suas Credenciais e Faça Login</p>          
      @if (session('status'))
          <div class="card">
              {{ session('status') }}
          </div>
      @endif
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}

            <div class="input-field col s12">
              <input type="text" name="email" value="{{ old('email') }}" class="validate" autofocus>
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

            <div class="col s12">
              <p>
                <input type="checkbox" id="lembrarSenha" name="remember" {{ old('remember') ? 'checked' : ''}} />
                <label for="lembrarSenha">Lembrar senha?</label>
              </p>
            </div>
            <div class="col s12">
              <br/>
              <button class="btn green">Entrar</button>
              <!--<a href="{{ url('/password/reset') }}"  class="btn orange">Recuperar senha</a>-->
            </div>
          </form>
      </div>
  </div>
</div>
</div>

@endsection
