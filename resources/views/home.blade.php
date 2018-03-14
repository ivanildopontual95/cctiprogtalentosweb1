@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    </div>
    @component('lista_cartao',['lista'=>$publicacoes,])
    @endcomponent
    <div class="row" align="center">
        {{ $publicacoes->links('layouts.pagination') }}
    </div>
</div>
@endsection
