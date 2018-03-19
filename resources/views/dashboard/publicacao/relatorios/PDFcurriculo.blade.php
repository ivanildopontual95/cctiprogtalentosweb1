<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
			"http://www.w3.org/TR/html4/strict.dtd">
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<html>

<head>
    <title>Curriculo Vitae</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        h2 {
            background-color: #3b3b3b;
            color: white;
            padding-left: 15px;
            margin: 0 0 0 -15px;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: normal;
            text-align: center;
        }
    </style>
</head>

<body>
    <caption>
        <h1>Curriculo Vitae </h1>
    </caption>


    <div class="h1">
        <caption>
            <h2>Dados Pessoais</h2>
        </caption>

        <div id="hcard-Ademir-Mazer-Jr" class="vcard">

            <p>
                <strong>Nome Completo: </strong>{{$inscricao->nomeCompleto}}</p>
            <p>
                <strong>Data de Nascimento: </strong> {{$inscricao->dataNascimento}}</p>
            <p>
                <strong>Telefone: </strong> {{$inscricao->telefone}}</p>
            <p>
                <strong>Nome do Pai: </strong> {{$inscricao->pai}}</p>
            <p>
                <strong>Nome da Mae: </strong> {{$inscricao->mae}}</p>
            <p>
                <strong>Sexo: </strong> {{$inscricao->sexo}}</p>
            <p>
                <strong>Escolaridade: </strong> {{$inscricao->escolaridade}}</p>
            <p>
                <strong>RG: </strong> {{$inscricao->identidade}}</p>
            <p>
                <strong>Estado: </strong> {{$inscricao->estado}}</p>
            <p>
                <strong>Cidade: </strong> {{$inscricao->cidade}}</p>
            <p>
                <strong>Endereço: </strong> {{$inscricao->endereco}}</p>
            <p>
                <strong>CEP: </strong> {{$inscricao->cep}}</p>
            <p>
                <strong>Bairro: </strong> {{$inscricao->bairro}} </p>
            <p>
                <strong>Nº: </strong> {{$inscricao->numero}}</p>


        </div>

    </div>



    <div class="secao">
        <caption>
            <h2>Dados Profissionais</h2>
        </caption>
        @foreach ($experiencias as $experiencia )
        <p>
            <strong>Empresa : </strong> {{$experiencia->empresa}} </p>
        <p>
            <strong>funcao: </strong> {{$experiencia->funcao}} </p>
        <p>
            <strong>Atividade Desempenhadas: </strong> {{$experiencia->atividade}} </p>

        <p>
            <strong>Data de Inicio na Empresa: </strong> {{$experiencia->dataInE}}

            <strong>Data de Termino na Empresa : </strong> {{$experiencia->dataTermE}} </p>
        @endforeach

    </div>


    <div class="secao">

        <caption>
            <h2>Qualificações</h2>
        </caption>
        @foreach ($qualificacoes as $qualificacao)
        <p>
            <strong>Instituição: </strong> {{$qualificacao->instituicao}} </p>
        <p>
            <strong>Curso: </strong> {{$qualificacao->curso}} </p>

        <p>
            <strong>Data de Inicio do Curso: </strong> {{$qualificacao->dataInI}}

            <strong>Data de Termino do Curso : </strong> {{$qualificacao->dataTermI}} </p>

        <p>
            <strong>Carga Horária do Curso: </strong> {{$qualificacao->cargaHora}} Horas </p>
        @endforeach

    </div>


</body>

</html>