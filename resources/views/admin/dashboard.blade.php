@extends('site.layout')
@section('title', 'Dashboard - Admin')
@section('conteudo')
    <h1>Olá, {{ Auth()->user()->name }}!</h1>
@endsection