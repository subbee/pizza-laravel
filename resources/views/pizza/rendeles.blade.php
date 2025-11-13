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


                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Create Post Form -->

                <form action="{{ route('order.store') }}" method="POST" class="w-form">

                    @csrf
                    <div class="row w-row">

                        <div class="col w-col w-col-6">
                            <!-- Sides & appetizers begin -->
                            <div class="bottom-margin-small three-block-holder-single w-clearfix">
                                <div class="image-holder">
                                    <img src="/assets/images/menu-images/menu-whole-pizza.png" alt="{{ $pizza->nev }}">
                                    <div class="bottom-margin-small half three-block-content-single">

                                        <div class="menu-title-bg">{{ $pizza->nev }}</div>
                                        <div>
                                            {{ $pizza->kategoria->nev ?? 'N/A' }}
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
                                        <br />
                                        <input type="hidden" name="pizza_id" value="{{$pizza->id}}">
                                        <label for="darab" style="font-weight:bold;">darab</label>
                                        <input type="number" id="darab" name="darab" class="w-input" value="{{old('darab') ?? 1}}"
                                               style="width:100%; margin-bottom:20px; padding:10px; border:1px solid #ccc; border-radius:5px;" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col w-col w-col-6">

                            <div class="bottom-margin-large half three-block-content-single">
                                <h4 class="bottom-margin-small">Megrendelő adatai:</h4>

                                {{ $user->name }}
                                <br>
                                {{ $user->email}}

                            </div>

                            <label for="cim" style="font-weight:bold;">Kiszállítási cím:</label>

                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <input type="text" id="cim" name="cim" class="w-input" value="{{old('cim') ?? ''}}"
                                   style="width:100%; margin-bottom:20px; padding:10px; border:1px solid #ccc; border-radius:5px;" required>





                                <div>


                                </div>
                        </div>
                        </div>


<div style="text-align: center; margin-top: 20px">

    <button type="submit" class="slider-btn w-button"
            style="background-color:#d32f2f; color:white; font-weight:bold; font-size:16px; padding:12px 30px; border:none; border-radius:5px; cursor:pointer;">
        Rendelés leadása
    </button>

</div>


                </form>
            </div>
        </div>
    </section>


</x-content-layout>
