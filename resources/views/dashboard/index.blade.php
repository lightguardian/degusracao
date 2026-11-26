@extends('layouts.app')

@section('title', 'Olá, ' . auth()->user()->name)

@section('content')
    <p class="text-stone-600">Em breve: as comidas mais bem avaliadas e as fotos dos pets da comunidade.</p>
@endsection