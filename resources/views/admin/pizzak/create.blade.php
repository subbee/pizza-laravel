<x-content-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">➕ Új pizza hozzáadása</h2>
    </x-slot>

    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow mt-6">
        <form action="{{ route('admin.pizzak.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="nev" class="block font-semibold">Pizza neve</label>
                <input type="text" name="nev" id="nev" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="kategorianev" class="block font-semibold">Kategória</label>
                <input type="text" name="kategorianev" id="kategorianev" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4 flex items-center gap-2">
                <input type="checkbox" name="vegetarianus" id="vegetarianus" value="1">
                <label for="vegetarianus" class="font-semibold">Vegetáriánus pizza</label>
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Mentés
            </button>

            <a href="{{ route('admin.pizzak.index') }}" class="ml-4 text-gray-600 hover:text-gray-900">Vissza</a>
        </form>
    </div>
</x-content-layout>
