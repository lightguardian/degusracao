<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('shared.head')
<body class="min-h-screen bg-amber-50 font-sans text-stone-800">
    <x-header />
    <main class="mx-auto flex max-w-5xl flex-col gap-6 px-6 py-8">
        <h1 class="text-3xl font-extrabold">@yield('title')</h1>
        <x-flash />
        @yield('content')
    </main>
</body>
</html>