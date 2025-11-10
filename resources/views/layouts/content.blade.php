<x-app-layout>
    <x-slot name="header">
        {{ $header ?? '' }}
    </x-slot>

    <div class="section">
    <div class="container w-container">

        {{ $slot }}

    </div>
</div>
</x-app-layout>
