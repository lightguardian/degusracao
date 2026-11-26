<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('shared.head')
<body class="min-h-screen bg-amber-50 font-sans text-stone-800">
    <main class="flex min-h-screen items-center justify-center px-4">
        <div class="w-full max-w-md rounded-2xl bg-white p-8 shadow-md">
            <p class="mb-6 text-center text-3xl font-extrabold text-orange-600">{{ config('app.name') }}</p>
            <h1 class="mb-6 text-center text-xl font-bold">@yield('title')</h1>
            <x-flash />
            @yield('content')
        </div>
    </main>
</body>
</html>