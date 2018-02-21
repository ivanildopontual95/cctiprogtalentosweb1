@extends('layouts.app') 

@section('content')

<div class="container">
    <div class="row">
        <div class="col s12">
            <div class="card-panel white">
                <h1 class="center">Formulário de Inscrição</h1>
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form  class="form-horizontal" action="{{route('inscricoes.store')}}" method="post">
                    {{csrf_field()}}

                    <div class="input-field {{$errors->has('nomeCompleto') ? 'has-error' : ''}}">
                        <input type="text" name = "nomeCompleto" class="validate"  value = "{{old('nomeCompleto')}}">
                        <label >Nome Completo</label>
                        @if($errors->has('nomeCompleto'))
                            <span class = "help-block">
                                <strong>{{$errors->first('nomeCompleto')}}</strong>
                            </span>        
                        @endif
                       
                    </div>

                    <div class="input-field {{$errors->has('dataNascimento') ? 'has-error' : ''}}">
                        <input type="text" name = "dataNascimento" class="datepicker" value = "{{old('dataNascimento')}}">
                        <label >Data de Nascimento</label>
                        @if($errors->has('dataNascimento'))
                            <span class = "help-block">
                                <strong>{{$errors->first('dataNascimento')}}</strong>
                            </span>        
                        @endif
                        
                    </div>

                     <div class="input-field {{$errors->has('pai') ? 'has-error' : ''}}">
                       <input type="text" name = "pai" class="validate" value = "{{old('pai')}}">
                        <label >Nome do Pai</label>
                        @if($errors->has('pai'))
                            <span class = "help-block">
                                <strong>{{$errors->first('pai')}}</strong>
                            </span>        
                        @endif
                    </div>

                    <div class="input-field  {{$errors->has('mae') ? 'has-error' : ''}}">
                        <input type="text" name = "mae" class="validate" value = "{{old('mae')}}">
                        <label>Nome da Mae </label>
                        @if($errors->has('mae'))
                            <span class = "help-block">
                                <strong>{{$errors->first('mae')}}</strong>
                            </span>        
                        @endif
                    </div>

                    <div class="input-field {{$errors->has('sexo') ? 'has-error' : ''}}">
                        <select name= "sexo" >
                            <option value="{{old('sexo')}}"disabled selected>Selecione uma opção abaixo </option>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                            <option value="Outros">Outros</option>
                        </select>
                        <label class="col-mod-4 control label">Sexo</label>
                        @if($errors->has('sexo'))
                            <span class = "help-block">
                                <strong>{{$errors->first('sexo')}}</strong>
                            </span>        
                        @endif
                    </div>
            


                    <div class="input-field  {{$errors->has('escolaridade') ? 'has-error' : ''}}">
                        <input type="text" name = "escolaridade" class="validate" value = "{{old('escolaridade')}}">
                        <label >Escolaridade </label>
                        @if($errors->has('escolaridade'))
                            <span class = "help-block">
                                <strong>{{$errors->first('escolaridade')}}</strong>
                            </span>        
                        @endif
                    </div>

                    <div class="input-field {{$errors->has('identidade') ? 'has-error' : ''}}">
                       <input type="text" name = "identidade" class="validate" value = "{{old('identidade')}}">
                        <label >RG </label>
                        @if($errors->has('identidade'))
                            <span class = "help-block">
                                <strong>{{$errors->first('identidade')}}</strong>
                            </span>        
                        @endif
                        </div>


                    <div class="input-field {{$errors->has('cpf') ? 'has-error' : ''}}">
                       <input type="text" name = "cpf" class="validate" value = "{{old('cpf')}}">
                        <label >CPF </label>
                        @if($errors->has('cpf'))
                            <span class = "help-block">
                                <strong>{{$errors->first('cpf')}}</strong>
                            </span>        
                        @endif
                    </div>

                    <div class="input-field {{$errors->has('estado') ? 'has-error' : ''}}">
                       <input type="text" name = "estado" class="validate" value = "{{old('estado')}}">
                        <label >Estado </label>
                        @if($errors->has('estado'))
                            <span class = "help-block">
                                <strong>{{$errors->first('estado')}}</strong>
                            </span>        
                        @endif
                    </div>


                    <div class="input-field  {{$errors->has('cidade') ? 'has-error' : ''}}">
                        <input type="text" name = "cidade" class="validate" value = "{{old('cidade')}}">
                        <label >Cidade </label>
                        @if($errors->has('cidade'))
                            <span class = "help-block">
                                <strong>{{$errors->first('cidade')}}</strong>
                            </span>        
                        @endif
                    </div>

                    <div class="input-field {{$errors->has('endereco') ? 'has-error' : ''}}">
                         <input type="text" name = "endereco" class="validate" value = "{{old('endereco')}}">
                        <label >Endereco </label>
                        @if($errors->has('endereco'))
                            <span class = "help-block">
                                <strong>{{$errors->first('endereco')}}</strong>
                            </span>        
                        @endif
                    </div>

                    <div class="input-field {{$errors->has('cep') ? 'has-error' : ''}}">
                        <input type="text" name = "cep" class="validate" value = "{{old('cep')}}">
                        <label >CEP </label>
                        @if($errors->has('cep'))
                            <span class = "help-block">
                                <strong>{{$errors->first('cep')}}</strong>
                            </span>        
                        @endif
                    </div>

                    <div class="input-field {{$errors->has('bairro') ? 'has-error' : ''}}">
                        <input type="text" name = "bairro" class="validate" value = "{{old('bairro')}}">
                        <label >Bairro </label>
                        @if($errors->has('bairro'))
                            <span class = "help-block">
                                <strong>{{$errors->first('bairro')}}</strong>
                            </span>        
                        @endif
                    </div>

                    <div class="input-field {{$errors->has('numero') ? 'has-error' : ''}}">
                        <input type="text" name = "numero" class="validate" value = "{{old('numero')}}">
                        <label >Nº </label>
                        @if($errors->has('numero'))
                            <span class = "help-block">
                                <strong>{{$errors->first('numero')}}</strong>
                            </span>        
                        @endif
                    </div>

                    <div class="input-field {{$errors->has('email') ? 'has-error' : ''}}">
                         <input type="text" name = "email" class="validate" value = "{{old('email')}}">
                        <label >Email </label>
                        @if($errors->has('email'))
                            <span class = "help-block">
                                <strong>{{$errors->first('email')}}</strong>
                            </span>        
                        @endif
                    </div>

                    <div class="input-field {{$errors->has('telefone') ? 'has-error' : ''}}">
                        <input type="text" name = "telefone" class="validate" value = "{{old('telefone')}}">
                        <label >Contatos </label>
                        @if($errors->has('telefone'))
                            <span class = "help-block">
                                <strong>{{$errors->first('telefone')}}</strong>
                            </span>        
                        @endif
                    </div>


                    <div class="row">
                    </div>
                    <div class="row">
                        <button class="btn btn-info right">Salvar</button>
                    </div>
                   
                </form>
            </div>
        </div>
    </div>
</div>
@endsection