<x-app-layout> {{-- Ez hívja meg a fő layoutot komponensként --}}
    {{-- Opcionális: Fejléc (ha a layout támogatja) --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $pageTitle ?? 'Pizza Menü' }}
        </h2>
    </x-slot>

    {{-- A tényleges tartalom itt kezdődik (korábban @section('content') volt) --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- A korábbi container div helyett itt kezdjük a gridet --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Cím (opcionális, mert a fejlécben is van) --}}
                    {{-- <h1 class="text-3xl font-bold mb-8 text-center text-gray-800">{{ $pageTitle ?? 'Pizza Menü' }}</h1> --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @forelse ($pizzas as $pizza)
                            <div class="bg-white rounded-lg shadow-xl overflow-hidden transform transition duration-300 hover:scale-[1.02] border border-gray-200">
                                {{-- Kép placeholder --}}
                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">
                                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18M9 3v18M15 3v18M3 9h18M3 15h18"></path></svg>
                                </div>

                                <div class="p-6">
                                    <h2 class="text-2xl font-semibold text-gray-900 mb-2">{{ $pizza->name }}</h2>
                                    <p class="text-gray-600 mb-4 h-16 overflow-hidden">{{ $pizza->description ?? 'Nincs leírás megadva.' }}</p>

                                    {{-- Ár --}}
                                    <div class="text-xl font-bold text-red-600 mb-4">{{ number_format($pizza->price, 0, ',', ' ') }} Ft</div>

                                    {{-- Összetevők --}}
                                    <h3 class="text-sm font-medium text-gray-700 mt-4 mb-2">Összetevők:</h3>
                                    <div class="flex flex-wrap gap-2 min-h-[30px]"> {{-- Min magasság, hogy ne ugráljon --}}
                                        @forelse ($pizza->ingredients as $ingredient)
                                            <span class="bg-indigo-100 text-indigo-800 text-xs font-semibold px-2 py-0.5 rounded-full">
                                                {{ $ingredient->name }}
                                            </span>
                                        @empty
                                            <span class="text-xs text-gray-500">Nincsenek összetevők megadva.</span>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="col-span-full text-center text-gray-500">Jelenleg nincs pizza az étlapon.</p>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout> {{-- Layout komponens lezárása --}}
```
