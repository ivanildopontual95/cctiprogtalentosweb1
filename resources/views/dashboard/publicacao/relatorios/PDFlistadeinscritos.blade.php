<!DOCTYPE html>
<html >
<head>
    <title>Inscrições</title>
    <style type="text/css">
        table{
            width: 80%;
            margin: 1 auto;
            border: 2px solid;
        }
    </style>
</head>
<body>    
    <table>
    <caption><h1>Lista de Inscritos - {{$publicacao->titulo}}</h1></caption>
    <thead>
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>CPF</th>
        <th>Cargo<th>
    </tr>
    <thead>
    <tbody>
    @foreach($inscricoes as $inscricao)
        <tr>
            <td>{{ $inscricao->id }}</td>
            <td>{{ $inscricao->nomeCompleto }}</td>
            <td>{{ $inscricao->cpf }}</td>
            <td>{{ $inscricao->pivot->cargo_id }}</td>
        </tr>    
    @endforeach
    <tobody>
    </table>
</body>        
</html>