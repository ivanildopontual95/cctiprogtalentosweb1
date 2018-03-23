<div class="card">
    <div class="card-content">
        <h5 class="header">{{$titulo}}</h5>
        <p>{{$descricao}}</p>
        <p><strong>Período de Inscrições:</strong> de {{date('d/m/Y', strtotime($dataInicio))}} - {{$horaInicio}}h até {{date('d/m/Y', strtotime($dataTermino))}} - {{$horaTermino}}h (Horário de Boa Vista).</p>
    </div>
    <div class="card-action">
        <a href="{{$url}}">Ver Mais</a>
    </div>
</div>