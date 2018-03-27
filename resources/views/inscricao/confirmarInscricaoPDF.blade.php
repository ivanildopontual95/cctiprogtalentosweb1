<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>

<body>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html>

    <body>
        <style>
            h2 {
                background-color: #3b3b3b;
                color: white;
                font-family: Arial, Helvetica, sans-serif;
                font-weight: normal;
                text-align: center;
            }

            strong {
                padding-left: 10px;

            }

            strong-2 {
                padding-left: 280px;
                background-color: #3b3b3b;


            }
        </style>
        <div class="conteudo_pagina after" id="conteudo" style="margin: 0 auto; padding-right: 4px;">
            <div class="mioloFs12 after">
                <link rel="stylesheet" type="text/css" media="screen, print" href="https://www.ne13.bradesconetempresa.b.br/ibpj/conteudo/css/geral/estrutura.css"
                />
                <link rel="stylesheet" type="text/css" media="screen, print" href="https://www.ne13.bradesconetempresa.b.br/ibpj/conteudo/css/geral/interna.css"
                />
                <link rel="stylesheet" type="text/css" media="screen, print" href="https://www.ne13.bradesconetempresa.b.br/ibpj/conteudo/css/geral/impressao.css"
                />
                <div class="boxComprovante after" style="background: none repeat scroll 0% 0% transparent;">
                    <div class="after">
                        <div class="after" style="">
                            <div class="comprovante">
                                <table class="tabela_comprovante">
                                    <tr>
                                        <td>
                                            <ul class="cabecalho after">
                                                <li class="logo transacao">
                                                    <img src="http://ccti.boavista.rr.gov.br/novo/img/logo-ccti.png" width="160" height="90" class="tabindex tabfirst" id="logoComprovante"
                                                    />
                                                </li>
                                                <li class="info center ">
                                                    <h2>Comprovante de Inscrição Seletivo CCTI</h2></li>
                                                    <li class="fn clr">
                                                        <!-- -->
                                                    </li>
                                            </ul>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="comprovante pt15 pb15">
                                <table class="tabela_comprovante">
                                    <tr>
                                        <td>
                                            <ul class="list_infos after">
                                                <li class="item">Instituição:</li>
                                                <li class="info">CCTI - Centro de Ciências, Tecnologia e Inovação | Av. Glaycon de Paiva,
                                                    1820 - Mecejana | Boa Vista - Roraima </li>
                                                <li class="quebra">
                                                    <!-- -->
                                                </li>

                                            </ul>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="dados comprovante">

                            </div>
                        </div>
                        <div class="conteudo_linha pt20 after mt0 bt0">
                            <p>
                                <b>
                                    <font size="4">
                                        <strong-2>Dados Cadastrais</strong-2>
                                    </font>
                                </b>
                            </p>
                            <br>
                            <table class="autenticacao tabela_comprovante">
                                <tr>
                                    <td>
                                        <div class="tabelaPre">
                                            <p>
                                                <strong>Nome Completo: </strong>{{$inscricao->nomeCompleto}}</p>
                                            <p>
                                                <strong>Data de Nascimento: </strong> {{$inscricao->dataNascimento}}</p>
                                            <p>
                                                <strong>Telefone: </strong> {{$inscricao->telefone}}</p>
                                            <p>
                                                <strong>Sexo: </strong> {{$inscricao->sexo}}</p>
                                            <p>
                                                <strong>CPF: </strong> {{$inscricao->cpf}}</p>
                                            <p>
                                                <strong>RG: </strong> {{$inscricao->identidade}}</p>
                                            <p>
                                                <strong>Escolaridade: </strong> {{$inscricao->escolaridade}}</p>
                                            <p>
                                                <strong>Estado: </strong> {{$inscricao->estado}}</p>
                                            <p>
                                                <strong>Cidade: </strong> {{$inscricao->cidade}}</p>
                                            <p>
                                                <strong>Endereço: </strong> {{$inscricao->endereco}}</p>
                                            <p>
                                                <strong>Bairro: </strong> {{$inscricao->bairro}} </p>
                                            <p>
                                                <strong>Nº: </strong> {{$inscricao->numero}} </p>
                                            <p>
                                                <strong>Processo Seletivo: </strong> {{$publicacao->titulo}} </p>
                                            <p>
                                                <strong>Cargo: </strong> {{$cargo->cargo}} </p>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="basesac after">
                            <div class="sac after">


                                <ul class="ouvidoria">
                                    <li class="ouvidoria">Ouvidoria:</li>

                                    <li class="fone"> (95) 3625-6336</li>

                                    <br>
                                    <br>
                                    <li class>Atendimento de segunda a sexta-feira, das 8h &#224;s 18h, exceto feriados.</li>
                                </ul>
                            </div>

                        </div>
                    </div>
    </body>

    </html>
</body>

</html>