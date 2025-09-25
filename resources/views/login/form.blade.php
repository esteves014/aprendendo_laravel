@extends('site.layout')
@section('title', 'Login Admin')
@section('conteudo')

    <form action="{{ route('login.auth') }}" method="POST" class="container my-5">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
        </div>
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" name="password" class="form-control" aria-describedby="passwordHelpBlock">
        <div id="passwordHelpBlock" class="form-text">
            Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special
            characters, or emoji.
        </div>
        <button class="btn btn-primary mt-3" type="submit">Entrar</button>
    </form>

    @if (session('erro'))
        <div class="alert alert-warning container mt-5" role="alert">
            {{ session('erro') }}
        </div>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger container" role="alert">
                {{ $error }}
            </div>
        @endforeach
    @endif
@endsection
