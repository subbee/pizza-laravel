<x-content-layout>
    {{-- Fejléc --}}
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight flex items-center gap-2">
            🍕 Pizzák kezelése
        </h2>
    </x-slot>

    {{-- Felső kezelősáv --}}
    <div class="flex justify-end items-center mt-4 mb-6 px-4">
        <a href="{{ route('admin.pizzak.create') }}"
           class="inline-flex items-center bg-green-500 hover:bg-green-600 text-white text-sm font-medium px-3 py-1.5 rounded-md shadow-sm transition">
            ➕ Új pizza hozzáadása
        </a>
    </div>

    {{-- Tartalom --}}
    <div class="row w-row mt-2">
        @forelse ($pizzak as $pizza)
            <div class="col w-col w-col-4 mb-6">
                <div class="three-block-holder-single w-clearfix border rounded-lg shadow bg-white overflow-hidden hover:shadow-lg transition">
                    <div class="image-holder relative">
                        <img src="/assets/images/menu-images/menu-whole-pizza.png"
                             alt="{{ $pizza->nev }}"
                             class="w-full h-48 object-cover">

                        {{-- Szerkesztés & törlés --}}
                        <div class="absolute top-2 right-2 flex gap-2 bg-white/70 rounded px-2 py-1">
                            <a href="{{ route('admin.pizzak.edit', $pizza) }}"
                               class="text-blue-600 hover:text-blue-800"
                               title="Szerkesztés">✏️</a>

                            <form action="{{ route('admin.pizzak.destroy', $pizza) }}" method="POST"
                                  onsubmit="return confirm('Biztosan törlöd ezt a pizzát?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-red-600 hover:text-red-800"
                                        title="Törlés">🗑️</button>
                            </form>
                        </div>
                    </div>

                    {{-- Pizza adatok --}}
                    <div class="p-4">
                        <h3 class="text-lg font-bold text-gray-900 mb-1">{{ $pizza->nev }}</h3>
                        <div class="text-sm text-gray-600 mb-2">
                            {{ $pizza->kategorianev ?? 'N/A' }}
                            @if ($pizza->vegetarianus)
                                <span class="inline-block bg-green-100 text-green-800 text-xs font-semibold px-2 py-0.5 rounded ml-2">
                                    Vegetáriánus 🌱
                                </span>
                            @endif
                        </div>
                        <div class="text-lg font-bold text-red-600">
                            {{ number_format($pizza->kategoria->ar ?? 0, 0, ',', ' ') }} Ft
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="col-span-full text-center text-gray-500 py-10">
                Jelenleg nincs pizza az adatbázisban. Hozz létre egyet az
                <a href="{{ route('admin.pizzak.create') }}" class="text-green-600 hover:underline font-semibold">
                    Új pizza hozzáadása
                </a> gombbal!
            </p>
        @endforelse
    </div>
</x-content-layout>
