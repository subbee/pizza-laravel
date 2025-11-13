<x-content-layout> {{-- Ez hívja meg a fő layoutot komponensként --}}
    {{-- Fejléc --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $pageTitle ?? 'Pizza rendelés' }}
        </h2>
    </x-slot>

{{-- Tartalom --}}


    <!-- Kapcsolat form szekció -->
    <section class="section-half-block" style="background-color:#f9f9f9; padding:60px 0;">
        <div class="w-container" style="max-width:700px;">



            <div class="block-main-holder" style="background:white; padding:40px; border-radius:15px; box-shadow:0 0 15px rgba(0,0,0,0.1);">

                <h3>Sikeres rendelés</h3>

                <p>rendelés száma: {{$order->id}}</p>

            </div>
        </div>
    </section>


</x-content-layout>
