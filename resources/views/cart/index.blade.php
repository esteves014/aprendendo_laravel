@extends('site.layout')
@section('title', 'Carrinho')
@section('conteudo')

    <div class="container mt-5">
        <h1>Meu Carrinho: {{count($cart)}}</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (empty($cart))
            <div class="alert alert-warning">Seu carrinho está vazio.</div>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Subtotal</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach ($cart as $id => $produto)
                        @php $total += $produto['preco'] * $produto['quantidade']; @endphp
                        <tr>
                            <td>{{ $produto['nome'] }}</td>
                            <td>R$ {{ number_format($produto['preco'], 2, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('cart.update', $id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="quantity" value="{{ $produto['quantidade'] }}">
                                    <button type="submit">Atualizar</button>
                                </form>
                            </td>
                            <td>R$ {{ number_format($produto['preco'] * $produto['quantidade'], 2, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Remover</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h4>Total: R$ {{ number_format($total, 2, ',', '.') }}</h4>

            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                <button class="btn btn-danger">Limpar Carrinho</button>
            </form>
        @endif
        <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Continuar Comprando</a>
    </div>
@endsection
