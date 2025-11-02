@extends('layouts.app') 

@section('content')
<div class="container mx-auto py-12">
    <h1 class="text-3xl font-bold mb-6">Top 10 Legnépszerűbb Pizza (Rendelt Darabszám Szerint)</h1>
    
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <canvas id="pizzaChart"></canvas>
    </div>

    {{-- Chart.js beillesztése a dokumentum végén (jobb teljesítmény) --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

    <script>
        // A PHP-ből átadott adatok
        const labels = @json($labels);
        const data = @json($data);
        
        const ctx = document.getElementById('pizzaChart').getContext('2d');
        
        new Chart(ctx, {
            type: 'bar', // Választhat 'pie' (kördiagram) is
            data: {
                labels: labels,
                datasets: [{
                    label: 'Összesen rendelt darabszám',
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)', 
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(199, 199, 199, 0.6)',
                        'rgba(83, 102, 255, 0.6)',
                        'rgba(255, 87, 87, 0.6)',
                        'rgba(132, 255, 99, 0.6)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(199, 199, 199, 1)',
                        'rgba(83, 102, 255, 1)',
                        'rgba(255, 87, 87, 1)',
                        'rgba(132, 255, 99, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</div>
@endsection