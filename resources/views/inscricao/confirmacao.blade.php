@extends('layouts.app') @section('content')

<div class="container">

    <div class="row">
    </div>
    <div class="row">
        <center>
            <h4>Confirmação do Seletivo</h4>
        </center>
        <div class="col s12">
            <div class="card-panel white">
                <form class="form-horizontal"  action="{{route('inscricoes.confirmacaoPDF', [$inscricao->id,$publicacao->id])}}">
                    {{csrf_field()}}
                    <div class="row">
                        <center>
                            <h5>{{$publicacao->titulo}}</h5>
                            <p>Inscrição realizada com sucesso!</p>
                        </center>


                        <div class="row">

                        </div>
                        <div class="col s12">

                            <div class="input-field col s4 ">
                                Nome Completo:
                                <strong>{{$inscricao->nomeCompleto}}</strong>
                                <br>

                            </div>

                            <div class="input-field col s4 ">
                                CPF:
                                <strong>{{$inscricao->cpf}}</strong>
                                </p>

                            </div>

                            <div class="input-field col s4 ">
                                RG:
                                <strong>{{$inscricao->identidade}}</strong>
                                </p>
                            </div>

                            <div class="input-field col s4 ">
                                Data Nascimento:
                                <strong>{{$inscricao->dataNascimento}}</strong>
                                </p>

                            </div>


                            <div class="input-field col s4 ">

                                Cidade:
                                <strong>{{$inscricao->cidade}}</strong>
                                </p>

                            </div>

                            <div class="input-field col s4 ">
                                Estado:
                                <strong>{{$inscricao->estado}}</strong>
                                </p>

                            </div>

                            <div class="input-field col s4 ">
                                Escolaridade:
                                <strong>{{$inscricao->escolaridade}}</strong>
                                </p>

                            </div>

                            <div class="input-field col s4 ">

                                Endereço:
                                <strong>{{$inscricao->endereco}}</strong>
                                </p>
                            </div>

                            <div class="input-field col s4 ">


                                Bairro:
                                <strong>{{$inscricao->bairro}}</strong>
                                </p>

                            </div>

                            <div class="input-field col s4 ">

                                Nº:
                                <strong>{{$inscricao->numero}}</strong>
                                </p>
                            </div>

                            <div class="input-field col s4 ">

                                Contato:
                                <strong>{{$inscricao->telefone}}</strong>
                                </p>
                            </div>


                            <div class="input-field col s4 ">
                                Email:
                                <strong>{{$inscricao->email}}</strong>
                                </p>
                            </div>

                            <div class="input-field col s8 ">
                                Processo Seletivo :
                                <strong>{{$publicacao->titulo}}</strong>
                                </p>
                            </div>

                            <div class="row">

                            </div>
                            <div class="row">
                            
                            </div>
                            <button class="btn green right">Gerar Comprovante
                                <i class="material-icons left">file_download</i>
                            </button>
                        </div>
                    </div>


                </form>
            </div>

        </div>
    </div>
</div>

@endsection