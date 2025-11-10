<x-content-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Bejelentkezés' }}
        </h2>
    </x-slot>



    <div class="col padding w-col w-col-6 ">
  
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Bejelentkezési űrlap -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email"
                              class="input w-input w"
                              type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Jelszó')" />
                <x-text-input id="password"
                              class="input w-input"
                              type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mb-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                           class="rounded border-gray-300 text-red-600 shadow-sm focus:ring-red-500"
                           name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Emlékezz rám') }}</span>
                </label>
            </div>

            <!-- Gombok -->

            <div class="flex items-center justify-between">

                <x-primary-button
                    class="slider-btn w-button bottom-margin-large">
                    {{ __('Bejelentkezés') }}
                </x-primary-button>
            </div>

            <div class="flex items-center justify-between">
                @if (Route::has('password.request'))
                    <a class="small-text "
                       href="{{ route('password.request') }}">
                        {{ __('Elfelejtetted a jelszavad?') }}
                    </a>
                @endif


            </div>
        </form>

        <!-- Regisztráció link -->
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                Nincs még fiókod?
                <a href="{{ route('register') }}" class="text-red-600 hover:text-red-700 font-medium">
                    Regisztrálj itt!
                </a>
            </p>
        </div>
    </div>
</x-content-layout>

