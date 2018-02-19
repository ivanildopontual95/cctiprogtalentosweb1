@extends('layouts.app')

@section('content')
<div class="container">
    @component('componentes.lista_cartao',['lista'=>$seletivos,])
    @endcomponent
</div>
@endsection
