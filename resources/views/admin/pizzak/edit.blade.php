<x-content-layout>
    {{-- Fejléc --}}
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight flex items-center gap-2">
            🍕 Pizza szerkesztése
        </h2>
    </x-slot>

    {{-- Tartalom --}}
    <div class="max-w-2xl mx-auto mt-8 bg-white p-6 rounded-lg shadow">
        {{-- Hibák megjelenítése --}}
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.pizzak.update', $pizzak) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Név --}}
            <div class="mb-4">
                <label for="nev" class="block text-sm font-medium text-gray-700">Pizza neve</label>
                <input type="text" id="nev" name="nev"
                       value="{{ old('nev', $pizzak->nev) }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                       placeholder="Pl. Hawaii">
            </div>

            {{-- Kategória neve --}}
            <div class="mb-4">
                <label for="kategorianev" class="block text-sm font-medium text-gray-700">Kategória</label>

                <select id="kategorianev" name="kategorianev"
                        class="">
                    @foreach(App\Models\Kategoria::all() as $kategoria)
                        <option value="{{ $kategoria->nev }}"
                            {{  old('kategorianev', $pizzak->kategorianev) == $kategoria->nev ? 'selected' : '' }}>
                            {{ $kategoria->nev }}
                        </option>
                    @endforeach
                </select>



            </div>

            {{-- Vegetáriánus --}}
            <div class="mb-4 flex items-center gap-2">
                <input type="checkbox" id="vegetarianus" name="vegetarianus" value="1"
                       {{ old('vegetarianus', $pizzak->vegetarianus) ? 'checked' : '' }}
                       class="h-4 w-4 text-green-600 border-gray-300 rounded">
                <label for="vegetarianus" class="text-sm text-gray-700">Vegetáriánus 🌱</label>
            </div>

            {{-- Gombok --}}
            <div class="flex justify-between items-center mt-6">
                <a href="{{ route('admin.pizzak.index') }}"
                   class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300 transition">
                    ⬅️ Vissza
                </a>
                <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded shadow transition">
                    💾 Mentés
                </button>
            </div>
        </form>
    </div>
</x-content-layout>
