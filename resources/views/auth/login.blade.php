<x-guest-layout>


    <div class="min-h-screen flex flex-col justify-center items-center bg-gray-100 py-12">
        <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">

            <!-- Cím -->
            <h2 class="text-3xl font-extrabold text-center text-gray-800 mb-6">Bejelentkezés</h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Bejelentkezési űrlap -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email"
                        class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500"
                        type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Jelszó')" />
                    <x-text-input id="password"
                        class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500"
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
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900"
                            href="{{ route('password.request') }}">
                            {{ __('Elfelejtetted a jelszavad?') }}
                        </a>
                    @endif

                    <x-primary-button
                        class="bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded transition">
                        {{ __('Bejelentkezés') }}
                    </x-primary-button>
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
    </div>
</x-guest-layout>
