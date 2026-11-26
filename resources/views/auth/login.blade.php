@extends('layouts.public')

@section('title', 'Entrar')

@section('content')
    <form action="{{ route('authenticate') }}" method="POST" class="flex flex-col gap-4" novalidate>
        <!-- novalidate serve pro navegador não exibir a mensagem padrao dele em balão -->
        @csrf
        <x-field name="email" label="E-mail" type="email" />
        <x-field name="password" label="Senha" type="password" />
        <button type="submit" class="mt-2 cursor-pointer rounded-full bg-orange-500 px-6 py-3 font-bold text-white hover:bg-orange-600">Entrar</button>
    </form>
    <p class="mt-6 text-center text-stone-600">
        Ainda não tem conta?
        <a href="{{ route('register') }}" class="font-bold text-orange-600 hover:underline">Cadastre-se</a>
    </p>
@endsection