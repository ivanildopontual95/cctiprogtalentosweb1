@extends('layouts.app') 

@section('content')

<div class="container">
    <div class="row">
        <div class="col s12">
            <div class="card-panel white">
                <h4 class="center">Formulário de Edição</h4>
                
                <form class="form-horizontal" action="{{route('inscricoes.update', $inscricao->id)}}" method="post">
                    {{csrf_field()}}
                    {{ method_field('PUT') }}

                    <div class="col s12">
                        <div class="input-field col s8 {{$errors->has('nomeCompleto') ? 'has-error' : ''}}">
                            <input type="text" name = "nomeCompleto" class="validate"  value="{{ isset($inscricao->nomeCompleto) && !old('nomeCompleto') ? $inscricao->nomeCompleto : '' }}{{old('nomeCompleto')}}">
                            <label >Nome Completo</label>
                            @if($errors->has('nomeCompleto'))
                                <span class = "red-text">
                                    <text>{{$errors->first('nomeCompleto')}}</text>
                                </span>        
                            @endif                       
                        </div>
                        
                        <div class="input-field col s4 {{$errors->has('dataNascimento') ? 'has-error' : ''}}">
                            <input type="text" name = "dataNascimento" class="datepicker" value="{{ isset($inscricao->dataNascimento) && !old('dataNascimento') ? $inscricao->dataNascimento : '' }}{{old('dataNascimento')}}">
                            <label >Data de Nascimento</label>
                            @if($errors->has('dataNascimento'))
                                <span class = "red-text">
                                    <text>{{$errors->first('dataNascimento')}}</text>
                                </span>        
                            @endif                        
                        </div>
                    </div>
                    
                    <div class="col s12">
                        <div class="input-field col s6 {{$errors->has('mae') ? 'has-error' : ''}}">
                            <input type="text" name = "mae" class="validate" value="{{ isset($inscricao->mae) && !old('mae') ? $inscricao->mae : '' }}{{old('mae')}}">
                            <label>Nome da Mãe </label>
                            @if($errors->has('mae'))
                                <span class = "red-text">
                                    <text>{{$errors->first('mae')}}</text>
                                </span>        
                            @endif
                        </div>

                        <div class="input-field col s6 {{$errors->has('pai') ? 'has-error' : ''}}">
                        <input type="text" name = "pai" class="validate" value="{{ isset($inscricao->pai) && !old('pai') ? $inscricao->pai : '' }}{{old('pai')}}">
                            <label >Nome do Pai</label>
                            @if($errors->has('pai'))
                                <span class = "red-text">
                                    <text>{{$errors->first('pai')}}</text>
                                </span>        
                            @endif
                        </div>
                    </div>
                    
                    <div class="col s12">
                        <div class="input-field col s12 {{$errors->has('escolaridade') ? 'has-error' : ''}}">
                            <input type="text" name = "escolaridade" class="validate" value="{{ isset($inscricao->escolaridade) && !old('escolaridade') ? $inscricao->escolaridade : '' }}{{old('escolaridade')}}">
                            <label >Escolaridade </label>
                            @if($errors->has('escolaridade'))
                                <span class = "red-text">
                                    <text>{{$errors->first('escolaridade')}}</text>
                                </span>        
                            @endif
                        </div>
                    </div>
                    
                    <div class="col s12">
                        <div class="input-field col s3 {{$errors->has('sexo') ? 'has-error' : ''}}">
                            <select name= "sexo" >
                                <option value="{{ isset($inscricao->sexo) && !old('sexo') ? $inscricao->sexo : '' }}{{old('sexo')}}" selected >Selecione uma opção </option>
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                                <option value="Outros">Outros</option>
                            </select>
                            <label>Sexo</label>
                            @if($errors->has('sexo'))
                                <span class = "red-text">
                                    <text>{{$errors->first('sexo')}}</text>
                                </span>        
                            @endif
                        </div>
                
                    <div class="input-field col s5 {{$errors->has('cpf') ? 'has-error' : ''}}">
                        <input type="text" name = "cpf" id="cpf" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}" class="validate" disabled value="{{ isset($inscricao->cpf) && !old('cpf') ? $inscricao->cpf : '' }}{{old('cpf')}}">
                            <label >CPF </label>
                            @if($errors->has('cpf'))
                                <span class = "red-text">
                                    <text>{{$errors->first('cpf')}}</text>
                                </span>        
                            @endif
                        </div>

                        <div class="input-field col s4 {{$errors->has('identidade') ? 'has-error' : ''}}">
                        <input type="text" name = "identidade" class="validate" value="{{ isset($inscricao->identidade) && !old('identidade') ? $inscricao->identidade : '' }}{{old('identidade')}}">
                            <label >RG </label>
                            @if($errors->has('identidade'))
                                <span class = "red-text">
                                    <text>{{$errors->first('identidade')}}</text>
                                </span>        
                            @endif
                        </div>
                    </div>                    

                    <div class="col s12">
                        <div class="input-field col s3 {{$errors->has('cep') ? 'has-error' : ''}}">
                            <input type="text" name= "cep" id="cep" pattern="[0-9]{5}-[0-9]{3}" class="validate" value="{{ isset($inscricao->cep) && !old('cep') ? $inscricao->cep : '' }}{{old('cep')}}">
                            <label >CEP</label>
                            @if($errors->has('cep'))
                                <span class = "red-text">
                                    <text>{{$errors->first('cep')}}</text>
                                </span>        
                            @endif
                        </div>

                        <div class="input-field col s6 {{$errors->has('cidade') ? 'has-error' : ''}}">
                            <input type="text" name= "cidade" id="cidade" class="validate" value="{{ isset($inscricao->cidade) && !old('cidade') ? $inscricao->cidade : '' }}{{old('cidade')}}">
                            <label >Cidade</label>
                            @if($errors->has('cidade'))
                                <span class = "red-text">
                                    <div>{{$errors->first('cidade')}}</div>
                                </span>        
                            @endif
                        </div>
                
                        <div class="input-field col s3 {{$errors->has('estado') ? 'has-error' : ''}}">
                        <input type="text" name = "estado" id="estado" class="validate" value="{{ isset($inscricao->estado) && !old('estado') ? $inscricao->estado : '' }}{{old('estado')}}">
                            <label >UF</label>
                            @if($errors->has('estado'))
                                <span class = "red-text">
                                    <text>{{$errors->first('estado')}}</text>
                                </span>        
                            @endif
                        </div>
                    </div>

                    <div class="col s12">
                        <div class="input-field col s6 {{$errors->has('endereco') ? 'has-error' : ''}}">
                            <input type="text" name = "endereco" id="endereco"  class="validate" value="{{ isset($inscricao->endereco) && !old('endereco') ? $inscricao->endereco : '' }}{{old('endereco')}}">
                            <label >Endereço</label>
                            @if($errors->has('endereco'))
                                <span class = "red-text">
                                    <text>{{$errors->first('endereco')}}</text>
                                </span>        
                            @endif
                        </div>

                        <div class="input-field col s4 {{$errors->has('bairro') ? 'has-error' : ''}}">
                            <input type="text" name = "bairro" id="bairro" class="validate" value="{{ isset($inscricao->bairro) && !old('bairro') ? $inscricao->bairro : '' }}{{old('bairro')}}">
                            <label >Bairro </label>
                            @if($errors->has('bairro'))
                                <span class = "red-text">
                                    <text>{{$errors->first('bairro')}}</text>
                                </span>        
                            @endif
                        </div>

                        <div class="input-field col s2 {{$errors->has('numero') ? 'has-error' : ''}}">
                            <input type="text" name = "numero" class="validate" value="{{ isset($inscricao->numero) && !old('numero') ? $inscricao->numero : '' }}{{old('numero')}}">
                            <label >Nº</label>
                            @if($errors->has('numero'))
                                <span class = "red-text">
                                    <text>{{$errors->first('numero')}}</text>
                                </span>        
                            @endif
                        </div>                    
                    </div>

                    <div class="col s12">
                        <div class="input-field col s6 {{$errors->has('email') ? 'has-error' : ''}}">
                            <input type="text" name = "email" class="validate" value="{{ isset($inscricao->email) && !old('email') ? $inscricao->email : '' }}{{old('email')}}">
                            <label >Email </label>
                            @if($errors->has('email'))
                                <span class = "red-text">
                                    <text>{{$errors->first('email')}}</text>
                                </span>        
                            @endif
                        </div>

                        <div class="input-field col s6 {{$errors->has('telefone') ? 'has-error' : ''}}">
                            <input type="text" name ="telefone" id="telefone" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" class='validate' value="{{ isset($inscricao->telefone) && !old('telefone') ? $inscricao->telefone : '' }}{{old('telefone')}}">
                            <label >Contato</label>
                            @if($errors->has('telefone'))
                                <span class = "red-text">
                                    <text>{{$errors->first('telefone')}}</text>
                                </span>        
                            @endif
                        </div>
                    </div>               
                  
                    <div class="row">
                    </div>

                     <div class="row">
                        <button class="btn btn-info right">Atualizar</button>
                    </div>
                   
                </form>
               
            </div>
        </div>
    </div>
</div>
@endsection