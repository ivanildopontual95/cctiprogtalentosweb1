<!DOCTYPE html>
<html>

<head>
    <title>Lista de Convocação</title>
    <style type="text/css">
        table {
            border-spacing: 1;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            width: 100%;
            margin: 0 auto;
            position: relative;
        }

        table * {
            position: relative;
        }

        table td,
        table th {
            padding-left: 8px;
        }

        table thead tr {
            height: 60px;
            background: #36304a;
        }

        table tbody tr {
            height: 20px;
        }

        table tbody tr:last-child {
            border: 0;
        }

        table td,
        table th {
            text-align: left;
        }

        table td.l,
        table th.l {
            text-align: right;
        }

        table td.c,
        table th.c {
            text-align: center;
        }

        table td.r,
        table th.r {
            text-align: center;
        }


        .table100-head th {
            font-family: OpenSans-Regular;
            font-size: 18px;
            color: #fff;
            line-height: 1.2;
            font-weight: unset;
        }

        tbody tr:nth-child(even) {
            background-color: #f5f5f5;
        }

        tbody tr {
            font-family: OpenSans-Regular;
            font-size: 15px;
            color: #3d3c3c;
            line-height: 1.2;
            font-weight: unset;
        }

        tbody tr:hover {
            color: #555555;
            background-color: #f5f5f5;
            cursor: pointer;
        }

        .column1 {
            width: 1px;
            padding-left: 10px;
        }

        .column2 {
            width: 5px;
        }

        .column3 {
            width: 5px;
        }

        .column4 {
            width: 5px;

        }

        .column5 {
            width: 5px;

        }

        .column6 {
            width: 5px;

        }

        .column7 {
            width: 5px;

        }




        @media screen and (max-width: 100px) {
            table {
                display: block;
            }
            table>*,
            table tr,
            table td,
            table th {
                display: block;
            }
            table thead {
                display: none;
            }
            table tbody tr {
                height: auto;
                padding: 40px 0;
            }
            table tbody tr td {
                padding-left: 40% !important;
                margin-bottom: 20px;
            }
            table tbody tr td:last-child {
                margin-bottom: 0;
            }
            table tbody tr td:before {
                font-family: OpenSans-Regular;
                font-size: 14px;
                color: #999999;
                line-height: 1.2;
                font-weight: unset;
                position: absolute;
                width: 40%;
                left: 30px;
                top: 0;
            }
            table tbody tr td:nth-child(1):before {
                content: "Id";
            }
            table tbody tr td:nth-child(2):before {
                content: "Nome";
            }
            table tbody tr td:nth-child(3):before {
                content: "CPF";
            }
            table tbody tr td:nth-child(4):before {
                content: "Cargo";
            }



            .column4,
            .column5,
            .column6,
            .column7,
            .column1,
            .column2,
            .column3 {
                width: 100%;
            }

            tbody tr {
                font-size: 14px;
            }
        }

        @media (max-width: 100px) {
            .container-table100 {
                padding-left: 15px;
                padding-right: 15px;
            }
    </style>
</head>

<body>
    <div class="table100">
        <table>
            <caption>
                <h3> Lista de Convocação- {{$publicacao->titulo}}</h3>
            </caption>
            <thead>
                <tr class="table100-head">
                    <th class="column1">Id</th>
                    <th class="column2">Nome</th>
                    <th class="column3">CPF</th>
                    <th class="column4">Classificacao</th>
                    <th class="column5">Pontuação</th>
                    <th class="column6">Convocação</th>
                    <th class="column7">Cargo</th>

                </tr>
            </thead>
            <tbody>
                @foreach($inscricoes as $inscricao)
                <tr>
                    <td class="column1">{{ $inscricao->id }}</td>
                    <td class="column2">{{ $inscricao->nomeCompleto }}</td>
                    <td class="column3">{{ $inscricao->cpf }}</td>
                    <td class="column4">{{ $inscricao->classificacao }}</td>
                    <td class="column5">{{ $inscricao->pontuacao }}</td>
                    <td class="column6">{{ $inscricao->convocacao }}</td>
                    <td class="column7">{{ $inscricao->pivot->cargo_id }}</td>

                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</body>

</html>

</body>

</html>