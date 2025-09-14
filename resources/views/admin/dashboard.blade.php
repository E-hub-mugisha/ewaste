@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>Dashboard</h2>

    <!-- Summary Cards -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card p-3">
                <h5>Devices</h5>
                <h2>{{ $deviceCount }}</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3">
                <h5>Pickups</h5>
                <h2>{{ $pickupCount }}</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3">
                <h5>Transfers</h5>
                <h2>{{ $transferCount }}</h2>
            </div>
        </div>
    </div>

    <!-- Chart -->
    <div class="card p-3">
        <h5>Monthly Pickups</h5>
        <canvas id="pickupChart" height="100"></canvas>
    </div>
</div>

<!-- Chart.js Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('pickupChart').getContext('2d');
    const pickupChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode(array_keys($monthlyPickups)) !!},
            datasets: [{
                label: 'Pickups per Month',
                data: {!! json_encode(array_values($monthlyPickups)) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
@endsection
