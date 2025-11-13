<x-content-layout>
    {{-- Fejléc --}}
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight flex items-center gap-2">
            Rendelések
        </h2>
    </x-slot>



    {{-- Tartalom --}}

    <div class="table-wrap">
        <table class="styled-table">
            <thead>
        <tr>
            <th>Rendelés szám</th>
            <th>Pizza</th>
            <th>Darab</th>
            <th>Vásárló</th>
            <th>Cím</th>
            <th>Felvétel</th>
            <th>Kiszállítás</th>
        </tr>
        </thead>

        <tbody>
        @foreach($orders as $order)

            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->pizza->nev }}</td>
                <td>{{ $order->darab }}</td>
                <td>
                    {{ $order->user->name }} <br>
                    {{ $order->user->email }}
                </td>
                <td>{{ $order->cim }}</td>
                <td>{{ $order->felvetel }}</td>
                <td>{{ $order->kiszallitas }}</td>
            </tr>

        @endforeach

        </tbody>

    </table>
    </div>

</x-content-layout>
