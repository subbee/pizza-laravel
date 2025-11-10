<x-content-layout> {{-- Ez hívja meg a fő layoutot komponensként --}}
    {{-- Fejléc --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $pageTitle ?? 'Pizza Menü' }}
        </h2>
    </x-slot>

    {{-- Tartalom --}}


    <!-- Menu section begins -->

            <div class="row w-row">
                <!-- First set of four begins -->

                @forelse ($pizzas as $pizza)
                    <div class="col w-col w-col-4">
                        <!-- Sides & appetizers begin -->
                        <div class="bottom-margin-small three-block-holder-single w-clearfix">
                            <div class="image-holder"><img src="/assets/images/menu-images/menu-whole-pizza.png" alt="{{ $pizza->nev }} ">
                                <div class="bottom-margin-small half three-block-content-single">

                                    <div class="menu-title-bg"> {{ $pizza->nev }} </div>
                                    <div> {{ $pizza->kategoria->nev ?? 'N/A' }}
                                        @if ($pizza->vegetarianus)
                                            <span class="inline-block bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                                                - Vegetáriánus 🌱
                                            </span>
                                        @endif
                                    </div>


                                    <div class="p-6 pt-0">
                                        <div class="text-lg font-bold text-red-600">
                                            {{ number_format($pizza->kategoria->ar ?? 0, 0, ',', ' ') }} Ft
                                        </div>
                                    </div>
                                    <br /><a class="small-text" href="#">Kosárba →</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-500 py-10">Jelenleg nincs pizza az étlapon az adatbázisban. Futtasd a seedereket!</p>
                @endforelse


                <!-- Second column of four ends -->

            </div>

    <!-- Menu section ends -->


</x-content-layout> {{-- Layout komponens lezárása --}}
