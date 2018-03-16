<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
			"http://www.w3.org/TR/html4/strict.dtd">
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<html>

<head>
    <title>Comprovante de Inscrição</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        h1 {
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
        <h2>Confirmação no Seletivo</h2>
    </caption>


    <div class="h1">


        <div id="hcard-Ademir-Mazer-Jr" class="vcard">

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



        </div>
    </div>
    </div>

    <div class="secao">



    </div>


</body>

</html>