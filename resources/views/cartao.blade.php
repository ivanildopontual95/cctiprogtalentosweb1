<div class="card">
    <div class="card-content">
        <h5 class="header">{{$titulo}}</h5>
        <p>{{$descricao}}</p>
        <p><strong>Período de Inscrições:</strong> de {{date('d/m/Y', strtotime($dataInicio))}} - {{date('H:i', strtotime($horaInicio))}}h 
            até {{date('d/m/Y', strtotime($dataTermino))}} - {{date('H:i', strtotime($horaTermino))}}h (Horário de Boa Vista).</p>
    </div>
    <div class="card-action">
        <a href="{{$url}}">Ver Mais</a>
    </div>
</div>