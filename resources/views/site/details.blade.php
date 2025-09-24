@extends('site.layout')
@section('title', 'Detalhes')
@section('conteudo')
    <div class="container">
        <div class="row ">
            <div class="col-sm-12 col-md-6">
                <img src="{{ $produto->imagem }}" class="">
            </div>
            <div class="col-sm-12 col-md-6">
                <h1>{{ $produto->nome }}</h1>
                <p>{{ $produto->descricao }}</p>
                <p>Postado por: {{ $produto->user->name }}</p>
                <button type="button" class="btn btn-success">Comprar</button>
            </div>
        </div>
    </div>
@endsection
