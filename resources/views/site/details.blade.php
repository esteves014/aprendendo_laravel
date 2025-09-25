@extends('site.layout')
@section('title', 'Detalhes')
@section('conteudo')
    <div class="container mt-5">
        <div class="row ">
            <div class="col-sm-12 col-md-6">
                <img src="https://placehold.co/600x400" class="">
            </div>
            <div class="col-sm-12 col-md-6">
                <h1>{{ $produto->nome }}</h1>
                <h2>R${{ number_format($produto->preco, 2, ',', '.') }}</h2>
                <p>{{ $produto->descricao }}</p>
                <p class="mb-1">Postado por: {{ $produto->user->name }}</p>
                <p>Categoria: <a href="{{ route('categoria', $produto->id_categoria) }}">{{ $produto->categoria->nome }}</a>
                </p>
                <form action="{{ route('cart.add', $produto) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-success">Adicionar ao carrinho</button>
                </form>
            </div>
        </div>
    </div>
@endsection
