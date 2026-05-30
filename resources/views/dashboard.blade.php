@extends('backends.layout')
@section('backend_content')
<div class="container mx-auto px-6 py-10">
    <h4 class="text-3xl font-extrabold text-gray-800 mb-10">Portfolio Dashboard</h4>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
        <!-- Card Component -->
        @php
            $cards = [
                ['label' => 'Total Visitors', 'value' => number_format($totalVisitors), 'color' => 'blue', 'icon' => 'users', 'extra' => "+$todayVisitors today"],
                ['label' => 'Total Projects', 'value' => $totalProjects, 'color' => 'purple', 'icon' => 'folder', 'extra' => null],
                ['label' => 'Total Services', 'value' => $totalServices, 'color' => 'green', 'icon' => 'briefcase', 'extra' => null],
                ['label' => "Today's Visitors", 'value' => $todayVisitors, 'color' => 'orange', 'icon' => 'chart-bar', 'extra' => null],
            ];
        @endphp

        @foreach($cards as $card)
        <div class="bg-gradient-to-br from-{{ $card['color'] }}-50 to-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">{{ $card['label'] }}</p>
                    <h3 class="text-3xl font-bold text-{{ $card['color'] }}-600">{{ $card['value'] }}</h3>
                    @if($card['extra'])
                        <p class="text-xs text-green-600 mt-1">{{ $card['extra'] }}</p>
                    @endif
                </div>
                <div class="bg-{{ $card['color'] }}-100 rounded-full p-4">
                    <i class="fas fa-{{ $card['icon'] }} text-{{ $card['color'] }}-600 text-xl"></i>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Charts -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="bg-white rounded-xl shadow-lg p-6">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Visitors - Last 7 Days</h2>
            <canvas id="weeklyChart"></canvas>
        </div>
        <div class="bg-white rounded-xl shadow-lg p-6">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Visitors - Last 6 Months</h2>
            <canvas id="monthlyChart"></canvas>
        </div>
    </div>
</div>
@endsection

@push('backend_js')
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<script>
    // Weekly Chart
    new Chart(document.getElementById('weeklyChart'), {
        type: 'line',
        data: {
            labels: {!! json_encode(array_column($last7Days, 'date')) !!},
            datasets: [{
                label: 'Visitors',
                data: {!! json_encode(array_column($last7Days, 'count')) !!},
                borderColor: '#3b82f6',
                backgroundColor: 'rgba(59, 130, 246, 0.2)',
                tension: 0.4,
                fill: true,
                pointBackgroundColor: '#3b82f6'
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true } }
        }
    });

    // Monthly Chart
    new Chart(document.getElementById('monthlyChart'), {
        type: 'bar',
        data: {
            labels: {!! json_encode(array_column($monthlyVisitors, 'month')) !!},
            datasets: [{
                label: 'Visitors',
                data: {!! json_encode(array_column($monthlyVisitors, 'count')) !!},
                backgroundColor: '#a855f7',
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true } }
        }
    });
</script>
@endpush
