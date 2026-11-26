@if (session('success'))
    <p class="mb-4 rounded-xl bg-green-100 px-4 py-3 text-green-800">{{ session('success') }}</p>
@endif
@if (session('error'))
    <p class="mb-4 rounded-xl bg-red-100 px-4 py-3 text-red-700">{{ session('error') }}</p>
@endif