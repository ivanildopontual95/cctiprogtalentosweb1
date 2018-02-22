@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    </div>
    @component('lista_cartao',['lista'=>$publicacoes,])
    @endcomponent
</div>
<div align="center" class="row">
    {{ $publicacoes->links() }}
</div>
@endsection
