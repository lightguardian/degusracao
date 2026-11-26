<header class="bg-white shadow-sm">
    <div class="mx-auto flex max-w-5xl items-center justify-between px-6 py-4">
        <a href="{{ route('dashboard') }}" class="text-2xl font-extrabold text-orange-600">{{ config('app.name') }}</a>
        <div class="flex items-center gap-4">
            <span class="text-stone-600">{{ auth()->user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="cursor-pointer rounded-full border border-orange-500 px-4 py-2 font-bold text-orange-600 hover:bg-orange-50">Sair</button>
            </form>
        </div>
    </div>
</header>