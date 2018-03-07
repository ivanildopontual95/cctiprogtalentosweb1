@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	</div>

	@if (count($errors) > 0)
		<div class="row">
        <div class="col s12">
          <div class="card red darken-1">
            <div class="card-content white-text">
              <span class="card-title">Erro</span>
							@foreach ($errors->all() as $message)
					        <li>{{$message}}</li>
					    @endforeach
            </div>
          </div>
        </div>
      </div>
	@endif
	
	@if (session('status') > 0)
		<div class="row">
        <div class="col s12">
          <div class="card red darken-1">
            <div class="card-content white-text">
              <span class="card-title">Status</span>
							<p>{{session('status')}}</p>
            </div>
          </div>
        </div>
      </div>
	@endif
	
	@include('dashboard._caminho')

	
	<div class="row">
		<h5 class="center">Editar Perfil</h5>
	</div>
	<div class="row">
	<div class="card-panel white">
		<div class="row">
			<form action="{{ route('perfil.perfil.update') }}" method="post">
					{{csrf_field()}}
					{{ method_field('PUT') }}
					<div class="input-field col s12">
							<i class="material-icons prefix">account_circle</i>
							<input id="icon_prefix" type="text" name="name" class="validate" value="{{ isset($user->name) && !old('name') ? $user->name : '' }}{{old('name')}}">
							<label for="icon_prefix">Nome</label>
					</div>

					<div class="input-field col s12">
						<i class="material-icons prefix">email</i>
						<input id="icon_prefix" type="email" name="email" class="validate" value="{{ isset($user->email) && !old('email') ? $user->email : '' }}{{old('email')}}">
						<label for="icon_prefix">E-mail</label>
					</div>

				<div class="input-field col s12">
						<i class="material-icons prefix">lock_outline</i>
						<input id="icon_prefix" type="password" name="password" class="validate">
						<label for="icon_prefix">Senha</label>
				</div>

					<div class="input-field col s12">
							<i class="material-icons prefix">lock_outline</i>
							<input id="icon_prefix" type="password" name="password_confirmation" class="validate">
							<label for="icon_prefix">Confirme a Senha</label>
					</div>
					</div>
						<button class="btn blue">Atualizar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection
