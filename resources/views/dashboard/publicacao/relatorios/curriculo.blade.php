@extends('layouts.app') 

@section('content')

<div class="container">
    <div class="row">
    </div>
    
    @include('dashboard._caminho')
    
    <div class="row">
    <h5 class="left">Currículo de {{$inscricao->nomeCompleto}}</h5>
    </div>
        <div class="row">
            <div class="card-panel white">
                <div class="row">
                <form class="form-horizontal" action="{{route('publicacoes.relatorio.curriculo', $inscricao->id)}}">
                    {{csrf_field()}}

                    <div class="col s12">
                        <div class="input-field col s8">
                            <input id="disabled" type="text" name = "nomeCompleto" class="validate"  value="{{ isset($inscricao->nomeCompleto) && !old('nomeCompleto') ? $inscricao->nomeCompleto : '' }}{{old('nomeCompleto')}}">
                            <label >Nome Completo</label>
                        </div>
                        
                        <div class="input-field col s4">
                            <input id="disabled" type="text" name = "dataNascimento" class="datepicker" value="{{ isset($inscricao->dataNascimento) && !old('dataNascimento') ? $inscricao->dataNascimento : '' }}{{old('dataNascimento')}}">
                            <label >Data de Nascimento</label>                
                        </div>
                        </div>
                    
                    <div class="col s12">
                        <div class="input-field col s6">
                            <input id="disabled" type="text" name = "mae" class="validate" value="{{ isset($inscricao->mae) && !old('mae') ? $inscricao->mae : '' }}{{old('mae')}}">
                            <label>Nome da Mãe </label>
                        </div>

                        <div class="input-field col s6">
                            <input id="disabled" type="text" name = "pai" class="validate" value="{{ isset($inscricao->pai) && !old('pai') ? $inscricao->pai : '' }}{{old('pai')}}">
                            <label >Nome do Pai</label>
                        </div>
                    </div>
                    
                    <div class="col s12">
                        <div class="input-field col s12">
                            <input id="disabled" type="text" name = "escolaridade" class="validate" value="{{ isset($inscricao->escolaridade) && !old('escolaridade') ? $inscricao->escolaridade : '' }}{{old('escolaridade')}}">
                            <label >Escolaridade </label>
                        </div>
                    </div>
                    
                    <div class="col s12">
                        <div class="input-field col s3">
                            <select name= "sexo" >
                                <option value="{{ isset($inscricao->sexo) && !old('sexo') ? $inscricao->sexo : '' }}{{old('sexo')}}" selected >Selecione uma opção </option>
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                                <option value="Outros">Outros</option>
                            </select>
                            <label>Sexo</label>
                        </div>
                
                    <div class="input-field col s5">
                        <input type="text" name = "cpf" id="cpf" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}" class="validate" disabled value="{{ isset($inscricao->cpf) && !old('cpf') ? $inscricao->cpf : '' }}{{old('cpf')}}">
                            <label >CPF </label>
                        </div>

                    <div class="input-field col s4">
                        <input id="disabled" type="text" name = "identidade" class="validate" value="{{ isset($inscricao->identidade) && !old('identidade') ? $inscricao->identidade : '' }}{{old('identidade')}}">
                            <label >RG </label>
                        </div>
                    </div>                    

                    <div class="col s12">
                        <div class="input-field col s3">
                            <input id="disabled" type="text" name= "cep" id="cep" pattern="[0-9]{5}-[0-9]{3}" class="validate" value="{{ isset($inscricao->cep) && !old('cep') ? $inscricao->cep : '' }}{{old('cep')}}">
                            <label >CEP</label>
                        </div>

                        <div class="input-field col s6">
                            <input id="disabled" type="text" name= "cidade" id="cidade" class="validate" value="{{ isset($inscricao->cidade) && !old('cidade') ? $inscricao->cidade : '' }}{{old('cidade')}}">
                            <label >Cidade</label>
                        </div>
                
                        <div class="input-field col s3">
                            <input id="disabled" type="text" name = "estado" id="estado" class="validate" value="{{ isset($inscricao->estado) && !old('estado') ? $inscricao->estado : '' }}{{old('estado')}}">
                            <label >UF</label>
                        </div>
                    </div>

                    <div class="col s12">
                        <div class="input-field col s6">
                            <input id="disabled" type="text" name = "endereco" id="endereco"  class="validate" value="{{ isset($inscricao->endereco) && !old('endereco') ? $inscricao->endereco : '' }}{{old('endereco')}}">
                            <label >Endereço</label>
                        </div>

                        <div class="input-field col s4">
                            <input id="disabled" type="text" name = "bairro" id="bairro" class="validate" value="{{ isset($inscricao->bairro) && !old('bairro') ? $inscricao->bairro : '' }}{{old('bairro')}}">
                            <label >Bairro </label>
                        </div>

                        <div class="input-field col s2">
                            <input id="disabled" type="text" name = "numero" class="validate" value="{{ isset($inscricao->numero) && !old('numero') ? $inscricao->numero : '' }}{{old('numero')}}">
                            <label >Nº</label>
                        </div>                    
                    </div>

                    <div class="col s12">
                        <div class="input-field col s6">
                            <input id="disabled" type="text" name = "email" class="validate" value="{{ isset($inscricao->email) && !old('email') ? $inscricao->email : '' }}{{old('email')}}">
                            <label >Email </label>
                        </div>

                        <div class="input-field col s6">
                            <input id="disabled" type="text" name ="telefone" id="telefone" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" class='validate' value="{{ isset($inscricao->telefone) && !old('telefone') ? $inscricao->telefone : '' }}{{old('telefone')}}">
                            <label >Contato</label>
                        </div>
                    </div>
                    <button class="btn green">Baixar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection