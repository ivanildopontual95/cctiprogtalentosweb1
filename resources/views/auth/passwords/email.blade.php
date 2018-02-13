@extends('layouts.app')

@section('content')

        <div class="container">
            <div class="row">
                <div class="col s4 offset-s4">
                    <div class="card-panel white">
                        <center><img class="" src="/images/psswrd.png"</i><center>
                        <p>Recuperar Senha</p>
                        <label>Você receberá as instruções por e-mail.</label>
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
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
                            <div class="section">
                                <button class="btn green">Recuperar<i class="material-icons right">send</i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection
