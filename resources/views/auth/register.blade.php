@extends('layouts.public')

@section('title', 'Criar conta')

@section('content')
    <form action="{{ route('register.store') }}" method="POST" class="flex flex-col gap-4">
        @csrf
        <x-field name="name" label="Nome" />
        <x-field name="email" label="E-mail" type="email" />
        <x-field name="password" label="Senha" type="password" />
        <x-field name="password_confirmation" label="Confirmar senha" type="password" />
        <button type="submit" class="mt-2 cursor-pointer rounded-full bg-orange-500 px-6 py-3 font-bold text-white hover:bg-orange-600">Cadastrar</button>
    </form>
    <p class="mt-6 text-center text-stone-600">
        Já tem conta?
        <a href="{{ route('login') }}" class="font-bold text-orange-600 hover:underline">Entrar</a>
    </p>
@endsection