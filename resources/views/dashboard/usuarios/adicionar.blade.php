@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
    </div>
    @include('dashboard._caminho')
	<div class="card-panel white">
        <div class="row">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('usuarios.store') }}">
            {{ csrf_field() }}

                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="icon_prefix" type="text" name="name" value="{{ old('name') }}" class="validate" autofocus>
                    <label for="icon_prefix">Nome</label>
                    @if ($errors->has('name'))
                    <span>
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
                
                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input id="icon_prefix" type="email" name="email" value="{{ old('email') }}" class="validate">
                    <label for="icon_prefix">E-mail</label>
                    @if ($errors->has('email'))
                    <span>
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="input-field col s12">
                    <i class="material-icons prefix">lock_outline</i>
                    <input id="icon_prefix" type="password" name="password" value="{{ old('password') }}" class="validate">
                    <label for="icon_prefix">Senha</label>
                    @if ($errors->has('password'))
                        <span>
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="input-field col s12">
                    <i class="material-icons prefix">lock_outline</i>
                    <input id="icon_prefix" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="validate">
                    <label for="icon_prefix">Confirme a Senha</label>
                    @if ($errors->has('password_confirmation'))
                        <span>
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
                
                <button class="btn green">Cadastrar</button>
            </form>
        </div>
    </div>
</div>

@endsection