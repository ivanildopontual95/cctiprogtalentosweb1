<!DOCTYPE html>
<html >
<head>
    <title>Lista de Usuários</title>
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
    <caption><h1>Lista de Usuarios</h1></caption>
    <thead>
    <tr>
        <th>Nome</th>
        <th>Email</th>
    </tr>
    <thead>
    <tbody>
    @foreach($usuarios as $us)
        <tr>
            <td>{{$us->name}}</td>
            <td>{{$us->email}}</td>
            
        </tr>    
    @endforeach
    <tobody>
    </table>

</body>        
</html>    