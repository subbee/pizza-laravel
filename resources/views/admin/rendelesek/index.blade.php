<x-content-layout>
    {{-- Fejléc --}}
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight flex items-center gap-2">
            Rendelések
        </h2>
    </x-slot>



    {{-- Tartalom --}}


    <div class="bg-white p-4 rounded-xl shadow-md">
        <h2 class="text-center mb-3">Eladások napi bontásban</h2>

        <div class="flex justify-center items-center gap-3 mb-4">
            <button id="prevMonth" class="px-3 py-1 bg-gray-200 rounded">◀ Előző hónap</button>
            <span id="monthLabel" class="font-semibold text-lg"></span>
            <button id="nextMonth" class="px-3 py-1 bg-gray-200 rounded">Következő hónap ▶</button>
        </div>

        <canvas id="rendelesChart" height="100"></canvas>
    </div>


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

    @push("footer")
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>

                document.addEventListener("DOMContentLoaded", async () => {
                let currentMonth = new Date().toISOString().slice(0, 7); // pl. "2025-11"
                let chart;

                async function loadChart(month) {
                const res = await fetch(`/rendelesek/chart?month=${month}`);
                const data = await res.json();

                document.getElementById('monthLabel').innerText = data.month_name;

                const ctx = document.getElementById('rendelesChart').getContext('2d');
                if (chart) chart.destroy();

                chart = new Chart(ctx, {
                type: 'bar',
                data: {
                labels: data.labels,
                datasets: [{
                label: 'Eladott pizzák száma',
                data: data.values,
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                borderRadius: 4
            }]
            },
                options: {
                scales: {
                y: { beginAtZero: true }
            }
            }
            });
            }

                // Hónap léptetés
                document.getElementById('prevMonth').addEventListener('click', () => {
                const date = new Date(currentMonth + '-01');
                date.setMonth(date.getMonth() - 1);
                currentMonth = date.toISOString().slice(0, 7);
                loadChart(currentMonth);
            });

                document.getElementById('nextMonth').addEventListener('click', () => {
                const date = new Date(currentMonth + '-01');
                date.setMonth(date.getMonth() + 1);
                currentMonth = date.toISOString().slice(0, 7);
                loadChart(currentMonth);
            });

                loadChart(currentMonth);
            });

        </script>
    @endpush

</x-content-layout>
