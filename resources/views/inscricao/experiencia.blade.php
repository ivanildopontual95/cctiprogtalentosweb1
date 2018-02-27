@extends('layouts.app') 

@section('content')

<div class="container">
    <div class="row">
        <div class="col s12">
            <div class="card-panel white">
                <h4 class="center">Formulário de Experiencia</h4>

                <div class="row">
                </div>
        
                <form class="form-horizontal" action="{{route('inscricoes.store')}}" method="post">
                    {{csrf_field()}}

                    <div class="col s12">

                        <a class="">Experiências Profissionais</a>
                        <div class="row">
                        </div>
                        <div class="input-field col s4 {{$errors->has('') ? 'has-error' : ''}}">
                            <input type="text" name = "" class="validate"  value = "{{old('')}}">
                            <label >Empresa 1</label>
                            @if($errors->has(''))
                                <span class = "red-text">
                                    <text>{{$errors->first('')}}</text>
                                </span>        
                            @endif                       
                        </div>

                        <div class="input-field col s4 {{$errors->has('') ? 'has-error' : ''}}">
                            <input type="text" name = "" class="validate"  value = "{{old('')}}">
                            <label >Função</label>
                            @if($errors->has(''))
                                <span class = "red-text">
                                    <text>{{$errors->first('')}}</text>
                                </span>        
                            @endif                       
                        </div>
                        
                        <div class="input-field col s4 {{$errors->has('') ? 'has-error' : ''}}">
                            <input type="text" name = "" class="validate"  value = "{{old('')}}">
                            <label >Período</label>
                            @if($errors->has(''))
                                <span class = "red-text">
                                    <text>{{$errors->first('')}}</text>
                                </span>        
                            @endif                       
                        </div>

                        <div class="input-field col s12 {{$errors->has('') ? 'has-error' : ''}}">
                            <input type="text" name = "" class="validate"  value = "{{old('')}}">
                            <label >Atividades Desempenhadas</label>
                            @if($errors->has(''))
                                <span class = "red-text">
                                    <text>{{$errors->first('')}}</text>
                                </span>        
                            @endif                       
                        </div>

                        <div class="row">
                        </div>
                      
                        <div class="input-field col s4 {{$errors->has('') ? 'has-error' : ''}}">
                            <input type="text" name = "" class="validate"  value = "{{old('')}}">
                            <label >Empresa 2</label>
                            @if($errors->has(''))
                                <span class = "red-text">
                                    <text>{{$errors->first('')}}</text>
                                </span>        
                            @endif                       
                        </div>

                        <div class="input-field col s4 {{$errors->has('') ? 'has-error' : ''}}">
                            <input type="text" name = "" class="validate"  value = "{{old('')}}">
                            <label >Função</label>
                            @if($errors->has(''))
                                <span class = "red-text">
                                    <text>{{$errors->first('')}}</text>
                                </span>        
                            @endif                       
                        </div>
                        
                        <div class="input-field col s4 {{$errors->has('') ? 'has-error' : ''}}">
                            <input type="text" name = "" class="validate"  value = "{{old('')}}">
                            <label >Período</label>
                            @if($errors->has(''))
                                <span class = "red-text">
                                    <text>{{$errors->first('')}}</text>
                                </span>        
                            @endif                       
                        </div>

                        <div class="input-field col s12 {{$errors->has('') ? 'has-error' : ''}}">
                            <input type="text" name = "" class="validate"  value = "{{old('')}}">
                            <label >Atividades Desempenhadas</label>
                            @if($errors->has(''))
                                <span class = "red-text">
                                    <text>{{$errors->first('')}}</text>
                                </span>        
                            @endif                       
                        </div>


                        
                    </div> 

                    <div class="row">
                    </div>
                    
                    <div class="col s12">
                        
                        <a class="">Participações em Cursos Profissionalizantes</a>
                        <div class="row">
                        </div>
                        <div class="input-field col s4 {{$errors->has('') ? 'has-error' : ''}}">
                            <input type="text" name = "" class="validate"  value = "{{old('')}}">
                            <label >Instituição </label>
                            @if($errors->has(''))
                                <span class = "red-text">
                                    <text>{{$errors->first('')}}</text>
                                </span>        
                            @endif                       
                        </div>     

                        <div class="input-field col s4 {{$errors->has('') ? 'has-error' : ''}}">
                            <input type="text" name = "" class="validate"  value = "{{old('')}}">
                            <label >Cursos</label>
                            @if($errors->has(''))
                                <span class = "red-text">
                                    <text>{{$errors->first('')}}</text>
                                </span>        
                            @endif                       
                        </div>   


                        <div class="input-field col s4 {{$errors->has('') ? 'has-error' : ''}}">
                            <input type="text" name = "" class="validate"  value = "{{old('')}}">
                            <label >Período</label>
                            @if($errors->has(''))
                                <span class = "red-text">
                                    <text>{{$errors->first('')}}</text>
                                </span>        
                            @endif                       
                        </div>   


                        <div class="input-field col s4 {{$errors->has('') ? 'has-error' : ''}}">
                            <input type="text" name = "" class="validate"  value = "{{old('')}}">
                            <label >Carga horária</label>
                            @if($errors->has(''))
                                <span class = "red-text">
                                    <text>{{$errors->first('')}}</text>
                                </span>        
                            @endif                       
                        </div>   


                        <div class="input-field col s4 {{$errors->has('') ? 'has-error' : ''}}">
                            <input type="text" name = "" class="validate"  value = "{{old('')}}">
                            <label >Instituição 2</label>
                            @if($errors->has(''))
                                <span class = "red-text">
                                    <text>{{$errors->first('')}}</text>
                                </span>        
                            @endif                       
                        </div>    

                        <div class="input-field col s4 {{$errors->has('') ? 'has-error' : ''}}">
                            <input type="text" name = "" class="validate"  value = "{{old('')}}">
                            <label >Cursos</label>
                            @if($errors->has(''))
                                <span class = "red-text">
                                    <text>{{$errors->first('')}}</text>
                                </span>        
                            @endif                       
                        </div>  

                        <div class="input-field col s4 {{$errors->has('') ? 'has-error' : ''}}">
                            <input type="text" name = "" class="validate"  value = "{{old('')}}">
                            <label >Período </label>
                            @if($errors->has(''))
                                <span class = "red-text">
                                    <text>{{$errors->first('')}}</text>
                                </span>        
                            @endif                       
                        </div>  
                        
                        <div class="input-field col s4 {{$errors->has('') ? 'has-error' : ''}}">
                            <input type="text" name = "" class="validate"  value = "{{old('')}}">
                            <label >Carga Horária</label>
                            @if($errors->has(''))
                                <span class = "red-text">
                                    <text>{{$errors->first('')}}</text>
                                </span>        
                            @endif                       
                        </div>  

                    </div>   
                    <div class="row">
                    </div>
                    <div class="col s12">
                        
                        <a class="left">Outras Atividades</a>

                        <div class="input-field col s12 {{$errors->has('') ? 'has-error' : ''}}">
                            <input type="text" name = "" class="validate"  value = "{{old('')}}">
                            <label >Aptidões</label>
                            @if($errors->has(''))
                                <span class = "red-text">
                                    <text>{{$errors->first('')}}</text>
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