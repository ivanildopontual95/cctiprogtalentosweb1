@extends('layouts.app') 

@section('content')

<div class="container">
    <div class="row">
        <div class="col s12">
            <div class="card-panel white">
                <h5 class="center">Formulário Editar Experiencia</h4>

                <div class="row">
                </div>
        
                <form class="form-horizontal" action="{{route('experiencias.update', $experiencia->id)}}" method="post">
                    {{csrf_field()}}
                    {{ method_field('PUT') }}

                    <div class="col s12">

                        <a class="input-field col s12">Experiências Profissionais</a>
                        <div class="row">
                        </div>
                        <div class="input-field col s6 {{$errors->has('empresa') ? 'has-error' : ''}}">
                            <input type="text" name = "empresa" class="validate"  value="{{ isset($experiencia->empresa) && !old('empresa') ? $experiencia->empresa : '' }}{{old('empresa')}}">>
                            <label >Empresa 1</label>
                            @if($errors->has('empresa'))
                                <span class = "red-text">
                                    <text>{{$errors->first('empresa')}}</text>
                                </span>        
                            @endif                       
                        </div>

                        <div class="input-field col s6 {{$errors->has('funcao') ? 'has-error' : ''}}">
                            <input type="text" name = "funcao" class="validate"  value = "{{old('funcao')}}">
                            <label >Função</label>
                            @if($errors->has('funcao'))
                                <span class = "red-text">
                                    <text>{{$errors->first('funcao')}}</text>
                                </span>        
                            @endif                       
                        </div>

                        <div class="row">
                        </div>
                        
                        <div class="input-field col s12">
                            <p>Período</p>
                                                  
                        </div>
                        
                        <div class="input-field col s3 {{$errors->has('dataInE') ? 'has-error' : ''}}">
                            <input type="text" name = "dataInE" class="datepicker" value = "{{old('dataInE')}}">
                            <label >Data de inicio</label>
                            @if($errors->has('dataInE'))
                                <span class = "red-text">
                                    <text>{{$errors->first('dataInE')}}</text>
                                </span>        
                            @endif                        
                        </div>

                        <div class="input-field col s3 {{$errors->has('dataTermE') ? 'has-error' : ''}}">
                            <input type="text" name = "dataTermE" class="datepicker" value = "{{old('dataTermE')}}">
                            <label >Data de fim</label>
                            @if($errors->has('dataTermE'))
                                <span class = "red-text">
                                    <text>{{$errors->first('dataTermE')}}</text>
                                </span>        
                            @endif                        
                        </div>
                        
                        <div class="input-field col s6 {{$errors->has('atividade') ? 'has-error' : ''}}">
                            <input type="text" name = "atividade" class="validate"  value = "{{old('atividade')}}">
                            <label >Atividades Desempenhadas</label>
                            @if($errors->has('atividade'))
                                <span class = "red-text">
                                    <text>{{$errors->first('atividade')}}</text>
                                </span>        
                            @endif                       
                        </div>
                       
                        <div class="row">
                        </div>
                        
                    </div> 

                    <div class="row">
                    </div>
                    
                    <div class="col s12">
                        
                        <a class="input-field col s12">Participações em Cursos Profissionalizantes</a>
                        
                        <div class="input-field col s6 {{$errors->has('instituicao') ? 'has-error' : ''}}">
                            <input type="text" name = "instituicao" class="validate"  value = "{{old('instituicao')}}">
                            <label >Instituição </label>
                            @if($errors->has('instituicao'))
                                <span class = "red-text">
                                    <text>{{$errors->first('instituicao')}}</text>
                                </span>        
                            @endif                       
                        </div>     

                        <div class="input-field col s6 {{$errors->has('curso') ? 'has-error' : ''}}">
                            <input type="text" name = "curso" class="validate"  value = "{{old('curso')}}">
                            <label >Cursos</label>
                            @if($errors->has('curso'))
                                <span class = "red-text">
                                    <text>{{$errors->first('curso')}}</text>
                                </span>        
                            @endif                       
                        </div>   

                        <div class="row">
                        </div>

                        <div class="input-field col s12">
                            
                           <p>Período</p>                    
                        </div>  
                        
                        <div class="input-field col s3 {{$errors->has('dataInI') ? 'has-error' : ''}}">
                            <input type="text" name = "dataInI" class="datepicker" value = "{{old('dataInI')}}">
                            <label >Data de inicio</label>
                            @if($errors->has('dataInI'))
                                <span class = "red-text">
                                    <text>{{$errors->first('dataInI')}}</text>
                                </span>        
                            @endif                        
                        </div>

                        <div class="input-field col s3 {{$errors->has('dataTermI') ? 'has-error' : ''}}">
                            <input type="text" name = "dataTermI" class="datepicker" value = "{{old('dataTermI')}}">
                            <label >Data de fim</label>
                            @if($errors->has('dataTermI'))
                                <span class = "red-text">
                                    <text>{{$errors->first('dataTermI')}}</text>
                                </span>        
                            @endif                        
                        </div>

                        <div class="input-field col s6 {{$errors->has('cargaHora') ? 'has-error' : ''}}">
                            <input type="text" name = "cargaHora" class="validate"  value = "{{old('cargaHora')}}">
                            <label >Carga horária</label>
                            @if($errors->has('cargaHora'))
                                <span class = "red-text">
                                    <text>{{$errors->first('cargaHora')}}</text>
                                </span>        
                            @endif                       
                        </div>   

                    </div>   
                    <div class="row">
                    </div>

                    <div class="col s12">
                        
                        <div class="row">
                        </div>
                        <a class="input-field col s12">Outras Atividades</a>

                        <div class="input-field col s12 {{$errors->has('aptidao') ? 'has-error' : ''}}">
                            <input type="text" name = "aptidao" class="validate"  value = "{{old('aptidao')}}">
                            <label >Aptidões</label>
                            @if($errors->has('aptidao'))
                                <span class = "red-text">
                                    <text>{{$errors->first('aptidao')}}</text>
                                </span>        
                            @endif                       
                        </div>  
                        
                    </div>    

                    <div class="row">
                    </div>
                
                    <div class="row">
                        <button class="btn green btn-info right">Salvar</button>
                    </div>
                   
                </form>
               
            </div>
        </div>
    </div>
</div>
@endsection