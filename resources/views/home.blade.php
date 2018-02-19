@extends('layouts.app')

@section('content')
<div class="container">
    @component('lista_cartao',['lista'=>$publicacoes,])
    @endcomponent
</div>
@endsection
