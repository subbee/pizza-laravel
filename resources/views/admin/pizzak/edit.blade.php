<x-content-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">✏️ Pizza szerkesztése</h2>
    </x-slot>

    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow mt-6">
        <form action="{{ route('admin.pizzak.update', $pizzak->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nev" class="block font-semibold">Pizza neve</label>
                <input type="text" name="nev" id="nev" value="{{ old('nev', $pizzak->nev) }}"
                       class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="kategorianev" class="block font-semibold">Kategória</label>
                <input type="text" name="kategorianev" id="kategorianev"
                       value="{{ old('kategorianev', $pizzak->kategorianev) }}"
                       class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4 flex items-center gap-2">
                <input type="checkbox" name="vegetarianus" id="vegetarianus" value="1"
                       {{ $pizzak->vegetarianus ? 'checked' : '' }}>
                <label for="vegetarianus" class="font-semibold">Vegetáriánus pizza</label>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Mentés
            </button>

            <a href="{{ route('admin.pizzak.index') }}" class="ml-4 text-gray-600 hover:text-gray-900">
                Mégse
            </a>
        </form>
    </div>
</x-content-layout>
