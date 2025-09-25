@extends('site.layout')
@section('title', 'Home')
@section('conteudo')

    <div class="container mt-5">
        <div class="row">
            <h3>Categoria {{$categoria->nome}}</h3>
            @forelse ($produtos as $produto)
                <div class="col-sm-12 col-md-4 mb-sm-3">
                    <div class="card">
                        <img src="https://placehold.co/600x400" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ Str::limit($produto->nome, 30) }}</h5>
                            <p class="card-text">{{ Str::limit($produto->descricao, 50) }}</p>
                            <a href="{{route('details', $produto->slug)}}" class="btn btn-primary">Comprar</a>
                        </div>
                    </div>
                </div>
            @empty
                <p>Não há produtos...</p>
            @endforelse
        </div>
    </div>

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $produtos->links('custom.pagination') }}
        </div>
    </div>

@endsection
