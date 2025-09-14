@extends('layouts.app')
@section('title', 'Admin Reports')
@section('content')
<div class="container py-5">
    <h2 class="mb-4">Admin Reports</h2>

    <!-- Devices Report -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">Devices Report</h4>
            <a href="{{ route('admin.reports.export', ['type' => 'devices', 'format' => 'excel']) }}" class="btn btn-light btn-sm float-end">Export Excel</a>
            <!-- pdf -->
            <a href="{{ route('admin.reports.export', ['type' => 'devices', 'format' => 'pdf']) }}" class="btn btn-light btn-sm float-end me-2">Export PDF</a>
        </div>
        <div class="card-body">
            @if($devices->isEmpty())
                <p>No devices found.</p>
            @else
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Condition</th>
                            <th>Quantity</th>
                            <th>User</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($devices as $device)
                            <tr>
                                <td>{{ $device->id }}</td>
                                <td>{{ $device->device_name }}</td>
                                <td>{{ $device->type ?? 'N/A' }}</td>
                                <td>{{ $device->condition }}</td>
                                <td>{{ $device->quantity }}</td>
                                <td>{{ $device->user->name }} ({{ $device->user->email }})</td>
                                <td>{{ $device->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <!-- Pickups Report -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Device Pickups Report</h4>
        </div>
        <div class="card-body">
            @if($pickups->isEmpty())
                <p>No pickups found.</p>
            @else
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Device</th>
                            <th>Collector</th>
                            <th>Status</th>
                            <th>Scheduled At</th>
                            <th>Completed At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pickups as $pickup)
                            <tr>
                                <td>{{ $pickup->id }}</td>
                                <td>{{ $pickup->device->device_name }} (ID: {{ $pickup->device->id }})</td>
                                <td>{{ $pickup->collector->name }} ({{ $pickup->collector->email }})</td>
                                <td>{{ ucfirst($pickup->status) }}</td>
                                <td>{{ $pickup->scheduled_at ? $pickup->scheduled_at->format('Y-m-d') : 'N/A' }}</td>
                                <td>{{ $pickup->completed_at ? $pickup->completed_at->format('Y-m-d') : 'N/A' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
    <!-- Transfers Report -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-warning text-white">
            <h4 class="mb-0">Device Transfers Report</h4>
        </div>
        <div class="card-body">
            @if($transfers->isEmpty())
                <p>No transfers found.</p>
            @else
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Device</th>
                            <th>Collector</th>
                            <th>Partner</th>
                            <th>Status</th>
                            <th>Transferred At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transfers as $transfer)
                            <tr>
                                <td>{{ $transfer->id }}</td>
                                <td>{{ $transfer->device->device_name }} (ID: {{ $transfer->device->id }})</td>
                                <td>{{ $transfer->collector->name }} ({{ $transfer->collector->email }})</td>
                                <td>{{ $transfer->partner->name }}</td>
                                <td>{{ ucfirst($transfer->status) }}</td>
                                <td>{{ $transfer->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <!-- Payments Report -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-danger text-white">
            <h4 class="mb-0">Payments Report</h4>
        </div>
        <div class="card-body">
            @if($payments->isEmpty())
                <p>No payments found.</p>
            @else
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Device</th>
                            <th>User</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Transaction ID</th>
                            <th>Paid At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payments as $payment)
                            <tr>
                                <td>{{ $payment->id }}</td>
                                <td>{{ $payment->device->device_name }} (ID: {{ $payment->device->id }})</td>
                                <td>{{ $payment->user->name }} ({{ $payment->user->email }})</td>
                                <td>{{ number_format($payment->amount, 2) }} {{ $payment->currency }}</td>
                                <td>{{ ucfirst($payment->status) }}</td>
                                <td>{{ $payment->transaction_id ?? 'N/A' }}</td>
                                <td>{{ $payment->paid_at ? $payment->paid_at->format('Y-m-d') : 'N/A' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection