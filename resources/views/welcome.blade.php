<x-app-layout> {{-- Ez hívja meg a fő layoutot komponensként --}}

    {{-- A tényleges tartalom itt kezdődik (korábban @section('content') volt) --}}

    {{-- Hero Szekció --}}
    <div class="relative bg-gray-900 overflow-hidden" style="background-image: url('https://images.unsplash.com/photo-1513104890138-7c749659a591?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80'); background-size: cover; background-position: center center;">
        <div class="absolute inset-0 bg-black opacity-50"></div> {{-- Sötétítő réteg --}}
        
        <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">
                Üdvözöl a Pizza Mester
            </h1>
            <p class="mt-6 text-xl text-gray-200 max-w-3xl mx-auto">
                Kézműves pizzák a legjobb alapanyagokból, egyenesen a kemencéből. Fedezd fel ízeinket és rendelj még ma!
            </p>
            <div class="mt-10">
                {{-- Gomb, ami a 4. pont menüjére visz --}}
                <a href="{{ route('pizza.menu') }}" class="text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-700 px-8 py-3 transition duration-300">
                    Étlap Megtekintése
                </a>
            </div>
        </div>
    </div>

    {{-- Bemutatkozó Szekció --}}
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Rólunk</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    A Pizza Mesternél hiszünk a minőségben. Minden pizzánkat frissen, válogatott, helyi alapanyagokból készítjük. Célunk, hogy a város legjobb pizzáját szállítsuk ki neked, gyorsan és forrón.
                </p>
            </div>
        </div>
    </div>

    {{-- Lábléc (opcionális) --}}
    <footer class="bg-gray-800 text-white py-8 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p>&copy; {{ date('Y') }} Pizza Mester. Minden jog fenntartva.</p>
        </div>
    </footer>

</x-app-layout> {{-- Layout komponens lezárása --}}

