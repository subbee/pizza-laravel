<x-content-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $pageTitle ?? 'Kapcsolat' }}
        </h2>
    </x-slot>



    <!-- Page container begins -->
    <section class="section---white-holder">
        <div class="container w-container">
            <!-- Contact form section begins -->
            <div class="col padding w-col w-col-6">
                <h4 class="h4-contact"><strong> Lépj velünk kapcsolatba!</strong></h4>
                <div class="w-form">
                    <div class="w-row">
                        <form method="POST" action="{{ route('contact.store') }}">
                            @csrf {{-- CSRF védelem --}}

                            {{-- Név --}}
                            <div class="mb-4">
                                <x-input-label for="name" :value="__('Neved')" />
                                <x-text-input id="name" class="input w-input" type="text" name="name" :value="old('name')" required autofocus />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            {{-- Email --}}
                            <div class="mb-4">
                                <x-input-label for="email" :value="__('Email címed')" />
                                <x-text-input id="email" class="input w-input" type="email" name="email" :value="old('email')" required />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            {{-- Tárgy --}}
                            <div class="mb-4">
                                <x-input-label for="subject" :value="__('Tárgy')" />
                                <x-text-input id="subject" class="input w-input" type="text" name="subject" :value="old('subject')" required />
                                <x-input-error :messages="$errors->get('subject')" class="mt-2" />
                            </div>

                            {{-- Üzenet --}}
                            <div class="mb-6">
                                <x-input-label for="message" :value="__('Üzenet')" />
                                <textarea id="message" name="message" rows="5" class="input message w-input" required>{{ old('message') }}</textarea>
                                <x-input-error :messages="$errors->get('message')" class="mt-2" />
                            </div>


                            <input class="button main-link submit w-button" data-wait="Sending..." type="submit" value="Üzenet küldés"/>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Contact form section ends -->

            <!-- Address section begins -->
            <div class="col padding w-col w-col-6">
                <h4 class="h4-contact"><strong>Étterem</strong></h4>
                <p>1234 Budapest egyutca, 2.</p>
            </div>
            <!-- Address section ends -->

            <!-- Phone & Email section begins -->
            <div class="col padding w-col w-col-6">
                <br />
                <h4 class="h4-contact"><strong>Telefon, Email</strong></h4>
                <p><strong>Telefon:</strong> (123) 456 7890<br /><strong>Email:</strong> info@pizzamester.hu<br /></p>
            </div>
            <!-- Phone & Email section ends -->

            <!-- Hours of operation section begins -->
            <div class="col padding w-col w-col-6">
                <br />
                <h4 class="h4-contact"><strong>Nyitva tartás</strong></h4>
                <p>Hétfő - Szombat: 11:00  - 21:00 PM<br />Vasárnap: 11:00 - 20:00 PM</p>
            </div>
            <!-- Hours of operation section ends -->
        </div>
    </section>
    <!-- Page container ends -->



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Sikeres üzenet megjelenítése --}}
                    @if (session('success'))
                        <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Siker!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif



                </div>
            </div>
        </div>
    </div>
</x-content-layout>
