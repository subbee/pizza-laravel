<x-content-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Regisztráció' }}
        </h2>
    </x-slot>



    <div class="col padding w-col w-col-6 ">

   <div class="min-h-screen flex flex-col justify-center items-center bg-gray-100 py-12">
        <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">


            <!-- Regisztrációs űrlap -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Név -->
                <div class="mb-4">
                    <x-input-label for="name" :value="__('Név')" />
                    <x-text-input id="name"
                        class="input w-input"
                        type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email cím')" />
                    <x-text-input id="email"
                        class="input w-input"
                        type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Jelszó -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Jelszó')" />
                    <x-text-input id="password"
                        class="input w-input"
                        type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Jelszó megerősítése -->
                <div class="mb-6">
                    <x-input-label for="password_confirmation" :value="__('Jelszó megerősítése')" />
                    <x-text-input id="password_confirmation"
                        class="input w-input"
                        type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Gombok -->
                <div class="flex items-center justify-between">

                    <x-primary-button
                        class="slider-btn w-button bottom-margin-large">
                        {{ __('Regisztráció') }}
                    </x-primary-button>

                    <br>
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                        href="{{ route('login') }}">
                        {{ __('Már van fiókod? Jelentkezz be!') }}
                    </a>


                </div>
            </form>
        </div>
    </div>
    </div>

</x-content-layout>
