<x-guest-layout>
   <div class="min-h-screen flex flex-col justify-center items-center bg-gray-100 py-12">
        <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">

            <!-- Cím -->
            <h2 class="text-3xl font-extrabold text-center text-gray-800 mb-6">Regisztráció</h2>

            <!-- Regisztrációs űrlap -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Név -->
                <div class="mb-4">
                    <x-input-label for="name" :value="__('Név')" />
                    <x-text-input id="name"
                        class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500"
                        type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email cím')" />
                    <x-text-input id="email"
                        class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500"
                        type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Jelszó -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Jelszó')" />
                    <x-text-input id="password"
                        class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500"
                        type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Jelszó megerősítése -->
                <div class="mb-6">
                    <x-input-label for="password_confirmation" :value="__('Jelszó megerősítése')" />
                    <x-text-input id="password_confirmation"
                        class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500"
                        type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Gombok -->
                <div class="flex items-center justify-between">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                        href="{{ route('login') }}">
                        {{ __('Már van fiókod? Jelentkezz be!') }}
                    </a>

                    <x-primary-button
                        class="bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded transition">
                        {{ __('Regisztráció') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
