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
                <form class="form-horizontal" action="{{route('inscricoes.store')}}" method="post">
                    {{csrf_field()}}

                    <div class="input-field">
                        <input id="nomeCompleto" type="text" class="validate">
                        <label for="">Nome Completo</label>

                    </div>

                    <div class="input-field">
                        <input id="dataNascimento" type="text" class="datepicker">
                        <label for="">Data de Nascimento</label>

                    </div>

                    <div class="input-field">
                        <input id="pai" type="text" class="validate">
                        <label for="">Nome do Pai</label>

                    </div>

                    <div class="input-field">
                        <input id="mae" type="text" class="validate">
                        <label for="">Nome da Mae </label>

                    </div>

                    <div class="input-field">
                        <select>
                            <option value=""disabled selected>Selecione uma opção abaixo </option>
                            <option value="1">Masculino</option>
                            <option value="2">Feminino</option>
                            <option value="3">Outros</option>
                        </select>
                        <label class="col-mod-4 control label">Sexo</label>
                    </div>
            


                    <div class="input-field">
                        <input id="escolaridade" type="text" class="validate">
                        <label for="">Escolaridade </label>

                    </div>

                    <div class="input-field">
                        <input id="identidade" type="text" class="validate">
                        <label for="">RG </label>

                        </div>


                    <div class="input-field">
                            <input id="cpf" type="text" class="validate">
                        <label for="">CPF </label>

                    </div>

                    <div class="input-field">
                        <input id="estado" type="text" class="validate">
                        <label for="">Estado </label>

                    </div>


                    <div class="input-field">
                        <input id="cidade" type="text" class="validate">
                        <label for="">Cidade </label>

                    </div>

                    <div class="input-field">
                        <input id="endereco" type="text" class="validate">
                        <label for="">Endereco </label>

                    </div>

                    <div class="input-field">
                        <input id="cep" type="text" class="validate">
                        <label for="">CEP </label>

                    </div>

                    <div class="input-field">
                        <input id="bairro" type="text" class="validate">
                        <label for="">Bairro </label>

                    </div>

                    <div class="input-field">
                        <input id="numero" type="text" class="validate">
                        <label for="">Nº </label>

                    </div>

                    <div class="input-field">
                        <input id="email" type="text" class="validate">
                        <label for="">Email </label>

                    </div>

                    <div class="input-field">
                        <input id="telefone" type="text" class="validate">
                        <label for="">Contatos </label>

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