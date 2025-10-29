<x-app-layout> {{-- Ez hívja meg a fő layoutot komponensként --}}
    {{-- Fejléc --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $pageTitle ?? 'Pizza Menü' }}
        </h2>
    </x-slot>

    {{-- Tartalom --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @forelse ($pizzas as $pizza)
                            <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-[1.02] border border-gray-200 flex flex-col justify-between">
                                {{-- Kép placeholder --}}
                                <div class="w-full h-48 bg-gray-100 flex items-center justify-center text-gray-400">
                                     {{-- Egyszerű pizza ikon --}}
                                     <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.64 3.003a11.96 11.96 0 010 17.994m0-17.994a11.96 11.96 0 000 17.994m0-17.994L12 12m-8.382 8.382a11.962 11.962 0 0116.764 0m-16.764 0L12 12m8.382-8.382a11.962 11.962 0 00-16.764 0m16.764 0L12 12"/>
                                    </svg>
                                </div>

                                <div class="p-6 flex-grow">
                                    <h2 class="text-xl font-semibold text-gray-900 mb-2">{{ $pizza->nev }}</h2>

                                    {{-- Kategória és Vegetáriánus státusz --}}
                                    <div class="mb-3 flex items-center space-x-2">
                                        <span class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                                            {{ $pizza->kategoria->nev ?? 'N/A' }} {{-- Kategória név --}}
                                        </span>
                                        @if ($pizza->vegetarianus)
                                            <span class="inline-block bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                                                Vegetáriánus 🌱
                                            </span>
                                        @endif
                                    </div>

                                    {{-- Leírás (Ha lenne a táblában) --}}
                                     {{-- <p class="text-gray-600 mb-4 text-sm">{{ $pizza->description ?? '' }}</p> --}}

                                </div>
                                {{-- Ár (a Kategóriából) --}}
                                <div class="p-6 pt-0">
                                    <div class="text-lg font-bold text-red-600">
                                        {{ number_format($pizza->kategoria->ar ?? 0, 0, ',', ' ') }} Ft
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="col-span-full text-center text-gray-500 py-10">Jelenleg nincs pizza az étlapon az adatbázisban. Futtasd a seedereket!</p>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout> {{-- Layout komponens lezárása --}}