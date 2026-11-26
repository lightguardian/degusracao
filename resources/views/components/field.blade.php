@props(['name', 'label', 'type' => 'text'])

<div class="flex flex-col gap-1">
    <label for="{{ $name }}" class="font-bold">{{ $label }}</label>
    <div class="relative">
        <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" value="{{ old($name) }}" class="w-full rounded-xl border border-stone-200 bg-white px-4 py-2 focus:border-orange-500 focus:outline-none">
        @if ($type === 'password')
            <button type="button" onclick="togglePassword('{{ $name }}')" class="absolute inset-y-0 right-0 cursor-pointer px-4 text-stone-400">
                <x-heroicon-o-eye class="size-5" />
            </button>
        @endif
    </div>
    @error($name)
    <p class="text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>