@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    </div>

    @include('dashboard._caminho')

    <div class="row">
    </div>
    <h5 class="center">Deferimento da Candidatura de {{$inscricao->nomeCompleto}}</h5>
    <div class="row">
    </div>
    <div class="row">
        <div class="card-panel white">
            <form class="form-horizontal" action="{{route('publicacoes.relatorios.pdfcurriculo', $inscricao->id)}}">
                {{csrf_field()}}
            <div class="row">
                <div class="col s12">
                    <ul class="tabs">                       
                        <li class="tab col s3">
                            <a href="#dadosdocandidato" class="teal-text lighten-1-text">Dados do Candidato</a>
                        </li>
                        <li class="tab col s3">
                            <a href="#qualificacoes" class="teal-text lighten-1-text">Qualificações</a>
                        </li>
                        <li class="tab col s3">
                            <a href="#experiencias" class="teal-text lighten-1-text">Experiências</a>
                        </li>
                        <li class="tab col s3">
                            <a href="#deferimento" class="teal-text lighten-1-text">Deferimento</a>
                        </li>
                        <div class="indicator teal lighten-1" style="z-index:1"></div> 
                    </ul>
                </div>
                <div id="dadosdocandidato" class="col s12">
                    <div class="row">
                    </div>
                    <div class="col s12">
                        <div class="input-field col s8">
                            <input type="text" name="nomeCompleto" class="validate" disabled value="{{ isset($inscricao->nomeCompleto) && !old('nomeCompleto') ? $inscricao->nomeCompleto : '' }}{{old('nomeCompleto')}}">
                            <label>Nome Completo</label>
                        </div>

                        <div class="input-field col s4">
                            <input type="text" name="dataNascimento" class="datepicker" disabled value="{{ isset($inscricao->dataNascimento) && !old('dataNascimento') ? $inscricao->dataNascimento : '' }}{{old('dataNascimento')}}">
                            <label>Data de Nascimento</label>
                        </div>
                    </div>

                        <div class="col s12">
                            <div class="input-field col s6">
                                <input type="text" name="mae" class="validate" disabled value="{{ isset($inscricao->mae) && !old('mae') ? $inscricao->mae : '' }}{{old('mae')}}">
                                <label>Nome da Mãe </label>
                            </div>

                            <div class="input-field col s6">
                                <input type="text" name="pai" class="validate" disabled value="{{ isset($inscricao->pai) && !old('pai') ? $inscricao->pai : '' }}{{old('pai')}}">
                                <label>Nome do Pai</label>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="input-field col s12">
                                <input type="text" name="escolaridade" class="validate" disabled value="{{ isset($inscricao->escolaridade) && !old('escolaridade') ? $inscricao->escolaridade : '' }}{{old('escolaridade')}}">
                                <label>Escolaridade </label>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="input-field col s3">
                                <select disabled name= "sexo" >
                                    <option value="Masculino" {{ old('sexo', $inscricao->sexo) == 'Masculino' ? 'selected' : '' }} >Masculino</option>
                                    <option value="Feminino" {{ old('sexo', $inscricao->sexo) == 'Feminino' ? 'selected' : '' }} >Feminino</option>
                                    <option value="Outros" {{ old('sexo', $inscricao->sexo) == 'Outros' ? 'selected' : '' }} >Outros</option>
                                </select>
                                <label>Sexo</label>
                            </div>

                            <div class="input-field col s5">
                                <input type="text" name="cpf" id="cpf" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}" class="validate" disabled value="{{ isset($inscricao->cpf) && !old('cpf') ? $inscricao->cpf : '' }}{{old('cpf')}}">
                                <label>CPF </label>
                            </div>

                            <div class="input-field col s4">
                                <input type="text" name="identidade" class="validate" disabled value="{{ isset($inscricao->identidade) && !old('identidade') ? $inscricao->identidade : '' }}{{old('identidade')}}">
                                <label>RG </label>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="input-field col s3">
                                <input type="text" name="cep" id="cep" pattern="[0-9]{5}-[0-9]{3}" class="validate" disabled value="{{ isset($inscricao->cep) && !old('cep') ? $inscricao->cep : '' }}{{old('cep')}}">
                                <label>CEP</label>
                            </div>

                            <div class="input-field col s6">
                                <input id="disabled" type="text" name="cidade" id="cidade" class="validate" disabled value="{{ isset($inscricao->cidade) && !old('cidade') ? $inscricao->cidade : '' }}{{old('cidade')}}">
                                <label>Cidade</label>
                            </div>

                            <div class="input-field col s3">
                                <input id="disabled" type="text" name="estado" id="estado" class="validate" disabled value="{{ isset($inscricao->estado) && !old('estado') ? $inscricao->estado : '' }}{{old('estado')}}">
                                <label>UF</label>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="input-field col s6">
                                <input id="disabled" type="text" name="endereco" id="endereco" class="validate" disabled value="{{ isset($inscricao->endereco) && !old('endereco') ? $inscricao->endereco : '' }}{{old('endereco')}}">
                                <label>Endereço</label>
                            </div>

                            <div class="input-field col s4">
                                <input id="disabled" type="text" name="bairro" id="bairro" class="validate" disabled value="{{ isset($inscricao->bairro) && !old('bairro') ? $inscricao->bairro : '' }}{{old('bairro')}}">
                                <label>Bairro </label>
                            </div>

                            <div class="input-field col s2">
                                <input id="disabled" type="text" name="numero" class="validate" disabled value="{{ isset($inscricao->numero) && !old('numero') ? $inscricao->numero : '' }}{{old('numero')}}">
                                <label>Nº</label>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="input-field col s6">
                                <input type="text" name="email" class="validate" disabled value="{{ isset($inscricao->email) && !old('email') ? $inscricao->email : '' }}{{old('email')}}">
                                <label>Email </label>
                            </div>

                            <div class="input-field col s6">
                                <input type="text" name="telefone" id="telefone" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" class='validate' disabled value="{{ isset($inscricao->telefone) && !old('telefone') ? $inscricao->telefone : '' }}{{old('telefone')}}">
                                <label>Contato</label>
                            </div>
                        </div>
                    <button class="btn green left">Baixar<i class="material-icons left">file_download</i></button>
                </div>


                <div id="qualificacoes">
                    <div class="tab" >
                        <div class="col s12">
                            <a class="input-field col s12">Cursos Profissionalizantes</a>
                            
                            <div id="listas_qualificacoes">
                                @if(isset($inscricao->id))
                                    <div>
                                        @foreach($inscricao->qualificacoes as $i => $qualificacao)
                                            <div>
                                                <div class="row"></div>
                                                <div class="input-field col s6 {{$errors->has('instituicao') ? 'has-error' : ''}}">
                                                    <input type="text" name="qualificacoes[{{$i}}][instituicao]" class="validate" value="{{ isset($qualificacao->instituicao) && !old('$qualificacao->instituicao') ? $qualificacao->instituicao : '' }}{{old('$qualificacao->instituicao')}}">
                                                    <label>Instituição </label>
                                                    @if($errors->has('instituicao'))
                                                    <span class="red-text">
                                                        <text>{{$errors->first('instituicao')}}</text>
                                                    </span>
                                                    @endif
                                                </div>

                                                <div class="input-field col s6 {{$errors->has('curso') ? 'has-error' : ''}}">
                                                    <input type="text" name="qualificacoes[{{$i}}][curso]" class="validate" value="{{ isset($qualificacao->curso) && !old('$qualificacao->curso') ? $qualificacao->curso : '' }}{{old('$qualificacao->curso')}}">
                                                    <label>Curso</label>
                                                    @if($errors->has('curso'))
                                                    <span class="red-text">
                                                        <text>{{$errors->first('curso')}}</text>
                                                    </span>
                                                    @endif
                                                </div>

                                                <div class="col s12">
                                                    <p>Período</p>
                                                </div>

                                                <div class="input-field col s3 {{$errors->has('dataInI') ? 'has-error' : ''}}">
                                                    <input type="text" name="qualificacoes[{{$i}}][dataInI]" class="datepicker" value="{{ isset($qualificacao->dataInI) && !old('$qualificacao->dataInI') ? $qualificacao->dataInI : '' }}{{old('$qualificacao->dataInI')}}">
                                                    <label>Data de inicio</label>
                                                    @if($errors->has('dataInI'))
                                                    <span class="red-text">
                                                        <text>{{$errors->first('dataInI')}}</text>
                                                    </span>
                                                    @endif
                                                </div>

                                                <div class="input-field col s3 {{$errors->has('dataTermI') ? 'has-error' : ''}}">
                                                    <input type="text" name="qualificacoes[{{$i}}][dataTermI]" class="datepicker" value="{{ isset($qualificacao->dataTermI) && !old('$qualificacao->dataTermI') ? $qualificacao->dataTermI : '' }}{{old('$qualificacao->dataTermI')}}">
                                                    <label>Data de fim</label>
                                                    @if($errors->has('dataTermI'))
                                                    <span class="red-text">
                                                        <text>{{$errors->first('dataTermI')}}</text>
                                                    </span>
                                                    @endif
                                                </div>

                                                <div class="input-field col s6 {{$errors->has('cargaHora') ? 'has-error' : ''}}">
                                                    <input type="text" name="qualificacoes[{{$i}}][cargaHora]" class="validate" value="{{ isset($qualificacao->cargaHora) && !old('$qualificacao->cargaHora') ? $qualificacao->cargaHora : '' }}{{old('$qualificacao->cargaHora')}}">
                                                    <label>Carga horária</label>
                                                    @if($errors->has('cargaHora'))
                                                    <span class="red-text">
                                                        <text>{{$errors->first('cargaHora')}}</text>
                                                    </span>
                                                    @endif
                                                </div>
                                                <div class="col s12">
                                                    @if($i>0)
                                                        <a href="#" class="remover_campo">Remover</a>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="row"></div>
                                    <div class="input-field col s6 {{$errors->has('instituicao') ? 'has-error' : ''}}">
                                        <input type="text" name="qualificacoes[0][instituicao]" class="validate" value="{{ isset($inscricao->qualificacoes[0]->instituicao) && !old('qualificacoes.0.instituicao') ? $inscricao->qualificacoes[0]->instituicao : '' }}{{old('qualificacoes.0.instituicao')}}">
                                        <label>Instituição </label>
                                        @if($errors->has('instituicao'))
                                        <span class="red-text">
                                            <text>{{$errors->first('instituicao')}}</text>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="input-field col s6 {{$errors->has('curso') ? 'has-error' : ''}}">
                                        <input type="text" name="qualificacoes[0][curso]" class="validate" value="{{ isset($inscricao->qualificacoes[0]->curso) && !old('qualificacoes.0.curso') ? $inscricao->qualificacoes[0]->curso : '' }}{{old('qualificacoes.0.curso')}}">
                                        <label>Curso</label>
                                        @if($errors->has('curso'))
                                        <span class="red-text">
                                            <text>{{$errors->first('curso')}}</text>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="col s12">
                                        <p>Período</p>
                                    </div>

                                    <div class="input-field col s3 {{$errors->has('dataInI') ? 'has-error' : ''}}">
                                        <input type="text" name="qualificacoes[0][dataInI]" class="datepicker" value="{{ isset($inscricao->qualificacoes[0]->dataInI) && !old('qualificacoes.0.dataInI') ? $inscricao->qualificacoes[0]->dataInI : '' }}{{old('qualificacoes.0.dataInI')}}">
                                        <label>Data de inicio</label>
                                        @if($errors->has('dataInI'))
                                        <span class="red-text">
                                            <text>{{$errors->first('dataInI')}}</text>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="input-field col s3 {{$errors->has('dataTermI') ? 'has-error' : ''}}">
                                        <input type="text" name="qualificacoes[0][dataTermI]" class="datepicker" value="{{ isset($inscricao->qualificacoes[0]->dataTermI) && !old('qualificacoes.0.dataTermI') ? $inscricao->qualificacoes[0]->dataTermI : '' }}{{old('qualificacoes.0.dataTermI')}}">
                                        <label>Data de fim</label>
                                        @if($errors->has('dataTermI'))
                                        <span class="red-text">
                                            <text>{{$errors->first('dataTermI')}}</text>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="input-field col s6 {{$errors->has('cargaHora') ? 'has-error' : ''}}">
                                        <input type="text" name="qualificacoes[0][cargaHora]" class="validate" value="{{ isset($inscricao->qualificacoes[0]->cargaHora) && !old('qualificacoes.0.cargaHora') ? $inscricao->qualificacoes[0]->cargaHora : '' }}{{old('qualificacoes.0.cargaHora')}}">
                                        <label>Carga horária</label>
                                        @if($errors->has('cargaHora'))
                                        <span class="red-text">
                                            <text>{{$errors->first('cargaHora')}}</text>
                                        </span>
                                        @endif
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                            </div>
                            <div class="row">
                            </div>
                        </div>
                    </div>
                </div>

                
                <div id="experiencias" >
                    <div class="tab" >
                        <div class="col s12">

                            <a class="input-field col s12">Experiências Profissionais</a>

                            <div id="listas_experiencias">
                                @if(isset($inscricao->id))
                                    <div>
                                        @foreach($inscricao->experiencias as $i => $experiencia)
                                            <div>
                                                <div class="row"></div>
                                                <div class="input-field col s6 {{$errors->has('empresa') ? 'has-error' : ''}}">
                                                    <input type="text" name="experiencias[{{$i}}][empresa]" class="validate" value="{{ isset($experiencia->empresa) && !old('$experiencia->empresa') ? $experiencia->empresa : '' }}{{old('$experiencia->empresa')}}">
                                                    <label >Empresa</label>
                                                    @if($errors->has('empresa'))
                                                        <span class = "red-text">
                                                            <text>{{$errors->first('empresa')}}</text>
                                                        </span>        
                                                    @endif                       
                                                </div>
                        
                                                <div class="input-field col s6 {{$errors->has('funcao') ? 'has-error' : ''}}">
                                                    <input type="text" name="experiencias[{{$i}}][funcao]" class="validate"  value = "{{ isset($experiencia->funcao) && !old('$experiencia->funcao') ? $experiencia->funcao : '' }}{{old('$experiencia->funcao')}}">
                                                    <label >Função</label>
                                                    @if($errors->has('funcao'))
                                                        <span class = "red-text">
                                                            <text>{{$errors->first('funcao')}}</text>
                                                        </span>        
                                                    @endif                       
                                                </div>
                                                
                                                <div class="col s12">
                                                    <p>Período</p>
                                                </div>

                                                <div class="input-field col s3 {{$errors->has('dataInE') ? 'has-error' : ''}}">
                                                    <input type="text" name="experiencias[{{$i}}][dataInE]" class="datepicker" value="{{ isset($experiencia->dataInE) && !old('$experiencia->dataInE') ? $experiencia->dataInE : '' }}{{old('$experiencia->dataInE')}}">
                                                    <label>Data de inicio</label>
                                                    @if($errors->has('dataInE'))
                                                    <span class="red-text">
                                                        <text>{{$errors->first('dataInE')}}</text>
                                                    </span>
                                                    @endif
                                                </div>

                                                <div class="input-field col s3 {{$errors->has('dataTermE') ? 'has-error' : ''}}">
                                                    <input type="text" name="experiencias[{{$i}}][dataTermE]" class="datepicker" value="{{ isset($experiencia->dataTermE) && !old('$experiencia->dataTermE') ? $experiencia->dataTermE : '' }}{{old('$experiencia->dataTermE')}}">
                                                    <label>Data de fim</label>
                                                    @if($errors->has('dataTermE'))
                                                    <span class="red-text">
                                                        <text>{{$errors->first('dataTermE')}}</text>
                                                    </span>
                                                    @endif
                                                </div>

                                                <div class="input-field col s6 {{$errors->has('atividade') ? 'has-error' : ''}}">
                                                    <input type="text" name="experiencias[{{$i}}][atividade]" class="validate" value="{{ isset($experiencia->atividade) && !old('$experiencia->atividade') ? $experiencia->atividade : '' }}{{old('$experiencia->atividade')}}">
                                                    <label>Atividades Desempenhadas</label>
                                                    @if($errors->has('atividade'))
                                                    <span class="red-text">
                                                        <text>{{$errors->first('atividade')}}</text>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="row">
                                    </div>
                                    <div class="input-field col s6 {{$errors->has('empresa') ? 'has-error' : ''}}">
                                        <input type="text" name="experiencias[0][empresa]" class="validate" value="{{ isset($inscricao->experiencias[0]->empresa) && !old('experiencias.0.empresa') ? $inscricao->experiencias[0]->empresa : '' }}{{old('experiencias.0.empresa')}}">
                                        <label >Empresa</label>
                                        @if($errors->has('empresa'))
                                            <span class = "red-text">
                                                <text>{{$errors->first('empresa')}}</text>
                                            </span>        
                                        @endif                       
                                    </div>
            
                                    <div class="input-field col s6 {{$errors->has('funcao') ? 'has-error' : ''}}">
                                        <input type="text" name="experiencias[0][funcao]" class="validate"  value = "{{ isset($inscricao->experiencias[0]->funcao) && !old('experiencias.0.funcao') ? $inscricao->experiencias[0]->funcao : '' }}{{old('experiencias.0.funcao')}}">
                                        <label >Função</label>
                                        @if($errors->has('funcao'))
                                            <span class = "red-text">
                                                <text>{{$errors->first('funcao')}}</text>
                                            </span>        
                                        @endif                       
                                    </div>
                                    
                                    <div class="col s12">
                                        <p>Período</p>
                                    </div>

                                    <div class="input-field col s3 {{$errors->has('dataInE') ? 'has-error' : ''}}">
                                        <input type="text" name="experiencias[0][dataInE]" class="datepicker" value="{{ isset($inscricao->experiencias[0]->dataInE) && !old('experiencias.0.dataInE') ? $inscricao->experiencias[0]->dataInE : '' }}{{old('experiencias.0.dataInE')}}">
                                        <label>Data de inicio</label>
                                        @if($errors->has('dataInE'))
                                        <span class="red-text">
                                            <text>{{$errors->first('dataInE')}}</text>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="input-field col s3 {{$errors->has('dataTermE') ? 'has-error' : ''}}">
                                        <input type="text" name="experiencias[0][dataTermE]" class="datepicker" value="{{ isset($inscricao->experiencias[0]->dataTermE) && !old('experiencias.0.dataTermE') ? $inscricao->experiencias[0]->dataTermE : '' }}{{old('experiencias.0.dataTermE')}}">
                                        <label>Data de fim</label>
                                        @if($errors->has('dataTermE'))
                                        <span class="red-text">
                                            <text>{{$errors->first('dataTermE')}}</text>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="input-field col s6 {{$errors->has('atividade') ? 'has-error' : ''}}">
                                        <input type="text" name="experiencias[0][atividade]" class="validate" value="{{ isset($inscricao->experiencias[0]->atividade) && !old('experiencias.0.atividade') ? $inscricao->experiencias[0]->atividade : '' }}{{old('experiencias.0.atividade')}}">
                                        <label>Atividades Desempenhadas</label>
                                        @if($errors->has('atividade'))
                                        <span class="red-text">
                                            <text>{{$errors->first('atividade')}}</text>
                                        </span>
                                        @endif
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                            </div>        
                            <div class="row">
                            </div>                        
                        </div>
                    </div>
                </div>


                <div id="deferimento" class="col s12">
                    <div class="row">
                    </div>
    
                    <div class="col s12">
                        <form action="{{ route('inscricoes.update',[$publicacao->id, $inscricao->id]) }}" method="post">
                            {{csrf_field()}}
                            {{ method_field('PUT') }}
                            
                            <div class="input-field col s12">
                                <select>
                                    <option value="1">Aguardando Deferimento</option>
                                    <option value="2">Deferido</option>
                                    <option value="3">Indeferido</option>
                                </select>
                                <label>Estado da Candidatura</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="icon_prefix" type="text" name="descricao" data-length="280" class="validate" value="{{ isset($publicacao->descricao) && !old('descricao') ? $inscricao->descricao : '' }}{{old('descricao')}}">
                                <label>Obs.:</label>
                            </div>
                            <button class="btn blue">Salvar</button>
                        </form>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection