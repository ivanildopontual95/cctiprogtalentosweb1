@extends('layouts.app') @section('content')

<div class="container">
    <div class="row"></div>
    <div class="row">
        <h4 class="center">Formulário de Inscrição</h4>
    </div>

    <div class="row">
        <form class="form-horizontal" id="regForm" action="{{route('inscricoes.store', $publicacao)}}" method="post">
            {{csrf_field()}}
            <div class="card-panel white">
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s3">
                                <a href="#cadastrodocandidato" class="teal-text lighten-1-text">Dados pessoais</a>
                            </li>
                            <li class="tab col s3">
                                <a href="#qualificacao" class="teal-text lighten-1-text">Qualificações</a>
                            </li>
                            <li class="tab col s3">
                                <a href="#experiencias" class="teal-text lighten-1-text">Experiências</a>
                            </li>
                            <li class="tab col s3">
                                <a href="#cargos" class="teal-text lighten-1-text">Escolha do Cargo </a>
                            </li>
                            <div class="indicator teal lighten-1" style="z-index:1"></div> 
                        </ul>
                    </div>

                    <!-- Cadastro do candidado -->
                    <div id="cadastrodocandidato" >
                        <div class="tab" >
                        <div class="row"></div>

                        <div class="col s12">
                                <div class="input-field col s8 {{$errors->has('nomeCompleto') ? 'has-error' : ''}}">
                                    <input type="text" name = "nomeCompleto" class="validate"  value = "{{old('nomeCompleto')}}">
                                    <label >Nome Completo</label>
                                    @if($errors->has('nomeCompleto'))
                                        <span class = "red-text">
                                            <text>{{$errors->first('nomeCompleto')}}</text>
                                        </span>        
                                    @endif                       
                                </div>
                                
                                <div class="input-field col s4 {{$errors->has('dataNascimento') ? 'has-error' : ''}}">
                                    <input type="text" name = "dataNascimento" class="datepicker" value = "{{old('dataNascimento')}}">
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
                                    <input type="text" name = "mae" class="validate" value = "{{old('mae')}}">
                                    <label>Nome da Mãe </label>
                                    @if($errors->has('mae'))
                                        <span class = "red-text">
                                            <text>{{$errors->first('mae')}}</text>
                                        </span>        
                                    @endif
                                </div>
        
                                <div class="input-field col s6 {{$errors->has('pai') ? 'has-error' : ''}}">
                                <input type="text" name = "pai" class="validate" value = "{{old('pai')}}">
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
                                    <input type="text" name = "escolaridade" class="validate" value = "{{old('escolaridade')}}">
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
                                        <option value="{{old('sexo')}}" disabled selected >Selecione uma opção </option>
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
                                <input type="text" name = "cpf" id="cpf" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}" class="validate" value = "{{old('cpf')}}">
                                    <label >CPF </label>
                                    @if($errors->has('cpf'))
                                        <span class = "red-text">
                                            <text>{{$errors->first('cpf')}}</text>
                                        </span>        
                                    @endif
                                </div>
        
                                <div class="input-field col s4 {{$errors->has('identidade') ? 'has-error' : ''}}">
                                <input type="text" name = "identidade" class="validate" value = "{{old('identidade')}}">
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
                                    <input type="text" name= "cep" id="cep" pattern="[0-9]{5}-[0-9]{3}" class="validate" value="{{old('cep')}}">
                                    <label >CEP</label>
                                    @if($errors->has('cep'))
                                        <span class = "red-text">
                                            <text>{{$errors->first('cep')}}</text>
                                        </span>        
                                    @endif
                                </div>
        
                                <div class="input-field col s6 {{$errors->has('cidade') ? 'has-error' : ''}}">
                                    <input type="text" name= "cidade" id="cidade" class="validate" value = "{{old('cidade')}}">
                                    <label >Cidade</label>
                                    @if($errors->has('cidade'))
                                        <span class = "red-text">
                                            <div>{{$errors->first('cidade')}}</div>
                                        </span>        
                                    @endif
                                </div>
                        
                                <div class="input-field col s3 {{$errors->has('estado') ? 'has-error' : ''}}">
                                <input type="text" name = "estado" id="estado" class="validate" value = "{{old('estado')}}">
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
                                    <input type="text" name = "endereco" id="endereco"  class="validate" value = "{{old('endereco')}}">
                                    <label >Endereço</label>
                                    @if($errors->has('endereco'))
                                        <span class = "red-text">
                                            <text>{{$errors->first('endereco')}}</text>
                                        </span>        
                                    @endif
                                </div>
        
                                <div class="input-field col s4 {{$errors->has('bairro') ? 'has-error' : ''}}">
                                    <input type="text" name = "bairro" id="bairro" class="validate" value = "{{old('bairro')}}">
                                    <label >Bairro </label>
                                    @if($errors->has('bairro'))
                                        <span class = "red-text">
                                            <text>{{$errors->first('bairro')}}</text>
                                        </span>        
                                    @endif
                                </div>
        
                                <div class="input-field col s2 {{$errors->has('numero') ? 'has-error' : ''}}">
                                    <input type="text" name = "numero" class="validate" value="{{old('numero')}}">
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
                                    <input type="text" name = "email" class="validate" value="{{old('email')}}">
                                    <label >Email </label>
                                    @if($errors->has('email'))
                                        <span class = "red-text">
                                            <text>{{$errors->first('email')}}</text>
                                        </span>        
                                    @endif
                                </div>
        
                                <div class="input-field col s6 {{$errors->has('telefone') ? 'has-error' : ''}}">
                                    <input type="text" name ="telefone" id="telefone" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" class='validate' value="{{old('telefone')}}">
                                    <label >Contato</label>
                                    @if($errors->has('telefone'))
                                        <span class = "red-text">
                                            <text>{{$errors->first('telefone')}}</text>
                                        </span>        
                                    @endif
                                </div>
                            </div>               
                            <div class="row"></div>
                        </div>
                    </div>

                    <!-- Qualificacao -->
                    <div id="qualificacao">
                        <div class="tab" >
                        <div class="row"></div>
                        <div class="col s12">
                            <a class="input-field col s12">Cursos Profissionalizantes</a>
                            
                            <div id="listas_qualificacoes">
                                <div class="input-field col s6 {{$errors->has('instituicao') ? 'has-error' : ''}}">
                                    <input type="text" name="qualificacoes[0][instituicao]" class="validate" value="{{old('qualificacoes.0.instituicao')}}">
                                    <label>Instituição </label>
                                    @if($errors->has('instituicao'))
                                    <span class="red-text">
                                        <text>{{$errors->first('instituicao')}}</text>
                                    </span>
                                    @endif
                                </div>

                                <div class="input-field col s6 {{$errors->has('curso') ? 'has-error' : ''}}">
                                    <input type="text" name="qualificacoes[0][curso]" class="validate" value="{{old('qualificacoes.0.curso')}}">
                                    <label>Curso</label>
                                    @if($errors->has('curso'))
                                    <span class="red-text">
                                        <text>{{$errors->first('curso')}}</text>
                                    </span>
                                    @endif
                                </div>

                                <div class="input-field col s12">
                                    <p>Período</p>
                                </div>

                                <div class="input-field col s3 {{$errors->has('dataInI') ? 'has-error' : ''}}">
                                    <input type="text" name="qualificacoes[0][dataInI]" class="datepicker" value="{{old('qualificacoes.0.dataInI')}}">
                                    <label>Data de inicio</label>
                                    @if($errors->has('dataInI'))
                                    <span class="red-text">
                                        <text>{{$errors->first('dataInI')}}</text>
                                    </span>
                                    @endif
                                </div>

                                <div class="input-field col s3 {{$errors->has('dataTermI') ? 'has-error' : ''}}">
                                    <input type="text" name="qualificacoes[0][dataTermI]" class="datepicker" value="{{old('qualificacoes.0.dataTermI')}}">
                                    <label>Data de fim</label>
                                    @if($errors->has('dataTermI'))
                                    <span class="red-text">
                                        <text>{{$errors->first('dataTermI')}}</text>
                                    </span>
                                    @endif
                                </div>

                                <div class="input-field col s6 {{$errors->has('cargaHora') ? 'has-error' : ''}}">
                                    <input type="text" name="qualificacoes[0][cargaHora]" class="validate" value="{{old('qualificacoes.0.cargaHora')}}">
                                    <label>Carga horária</label>
                                    @if($errors->has('cargaHora'))
                                    <span class="red-text">
                                        <text>{{$errors->first('cargaHora')}}</text>
                                    </span>
                                    @endif
                                </div>

                                <div class="col s12">
                                    <button class="btn blue" id="add_field_qualificacoes">Adicionar</button>
                                </div>
                                <div class="row"></div>
                            </div>
                        </div>
                        </div>
                    </div>

                    <!-- Experiencia -->
                    <div id="experiencias" >
                        <div class="tab" >
                        <div class="row"></div>

                        <div class="col s12">

                            <a class="input-field col s12">Experiências Profissionais</a>

                            <div id="listas_experiencias">
                                
                                <div class="input-field col s6 {{$errors->has('empresa') ? 'has-error' : ''}}">
                                    <input type="text" name="experiencias[0][empresa]" class="validate" value="{{old('experiencias.0.empresa')}}">
                                    <label >Empresa</label>
                                    @if($errors->has('empresa'))
                                        <span class = "red-text">
                                            <text>{{$errors->first('empresa')}}</text>
                                        </span>        
                                    @endif                       
                                </div>
        
                                <div class="input-field col s6 {{$errors->has('funcao') ? 'has-error' : ''}}">
                                    <input type="text" name="experiencias[0][funcao]" class="validate"  value = "{{old('experiencias.0.funcao')}}">
                                    <label >Função</label>
                                    @if($errors->has('funcao'))
                                        <span class = "red-text">
                                            <text>{{$errors->first('funcao')}}</text>
                                        </span>        
                                    @endif                       
                                </div>
                                
                                <div class="input-field col s12">
                                    <p>Período</p>
                                </div>

                                <div class="input-field col s3 {{$errors->has('dataInE') ? 'has-error' : ''}}">
                                    <input type="text" name="experiencias[0][dataInE]" class="datepicker" value="{{old('experiencias.0.dataInE')}}">
                                    <label>Data de inicio</label>
                                    @if($errors->has('dataInE'))
                                    <span class="red-text">
                                        <text>{{$errors->first('dataInE')}}</text>
                                    </span>
                                    @endif
                                </div>

                                <div class="input-field col s3 {{$errors->has('dataTermE') ? 'has-error' : ''}}">
                                    <input type="text" name="experiencias[0][dataTermE]" class="datepicker" value="{{old('experiencias.0.dataTermE')}}">
                                    <label>Data de fim</label>
                                    @if($errors->has('dataTermE'))
                                    <span class="red-text">
                                        <text>{{$errors->first('dataTermE')}}</text>
                                    </span>
                                    @endif
                                </div>

                                <div class="input-field col s6 {{$errors->has('atividade') ? 'has-error' : ''}}">
                                    <input type="text" name="experiencias[0][atividade]" class="validate" value="{{old('experiencias.0.atividade')}}">
                                    <label>Atividades Desempenhadas</label>
                                    @if($errors->has('atividade'))
                                    <span class="red-text">
                                        <text>{{$errors->first('atividade')}}</text>
                                    </span>
                                    @endif
                                </div>

                                <div class="col s12">
                                        <button class="btn blue" id="add_field_experiencias">Adicionar</button>
                                </div>
                                <div class="row"></div>
                            </div>                                
                        </div>
                        </div>
                    </div>

                    <!-- Cargos -->
                    <div id="cargos" >
                        <div class="tab" >
                        <div class="row"></div>
                        <div class="input-field col s6 offset-s3 {{$errors->has('cargo_id') ? 'has-error' : ''}}">
                            <select name="cargo_id">
                                    <option value="{{old('cargo_id')}}" disabled selected>Selecione um cargo</option>
                                @foreach($cargos as $valor)                              
                                    <optgroup label="{{$valor->escolaridade}}">
                                        <option value="{{$valor->id}}">{{$valor->cargo}}</option>
                                    </optgroup>
                                @endforeach
                            </select>
                            <label>Cargo</label>
                            @if($errors->has('cargo_id'))
                                    <span class="red-text">
                                        <text>{{$errors->first('cargo_id')}}</text>
                                    </span>
                            @endif
                        </div>
                        <div class="row"></div>
                    </div>
                    </div>

                    <div class="row"></div>
                    <div class="col s12">
                        <button class="btn green btn-info right">Confirmar</button>
                    </div>
                        
                </div>                
            </div>
        </form>
    </div>
</div>

@endsection