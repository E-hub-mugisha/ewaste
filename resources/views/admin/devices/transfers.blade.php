@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Device Transfers</h2>

    <!-- Add Transfer Button -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addTransferModal">Add Transfer</button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Device</th>
                <th>Collector</th>
                <th>Partner</th>
                <th>Status</th>
                <th>Transferred At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transfers as $transfer)
            <tr>
                <td>{{ $transfer->device->device_name }} ({{ $transfer->device->tracking_code }})</td>
                <td>{{ $transfer->collector->name }}</td>
                <td>{{ $transfer->partner->name }}</td>
                <td>{{ $transfer->status }}</td>
                <td>{{ $transfer->transferred_at ?? '-' }}</td>
                <td>
                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#statusTransferModal{{ $transfer->id }}">Update Status</button>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>

@foreach($transfers as $transfer)
<!-- Update Status Modal -->
<div class="modal fade" id="statusTransferModal{{ $transfer->id }}" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('admin.transfers.updateStatus', $transfer->id) }}" method="POST" class="modal-content">
            @csrf @method('PUT')
            <div class="modal-header">
                <h5>Update Transfer Status</h5>
            </div>
            <div class="modal-body">
                <select name="status" class="form-select" required>
                    <option value="In transit" @if($transfer->status=='In transit') selected @endif>In transit</option>
                    <option value="Received" @if($transfer->status=='Received') selected @endif>Received</option>
                    <option value="Recycled" @if($transfer->status=='Recycled') selected @endif>Recycled</option>
                </select>
            </div>
            <div class="modal-footer"><button class="btn btn-success">Update</button></div>
        </form>
    </div>
</div>
@endforeach

<!-- Add Transfer Modal -->
<div class="modal fade" id="addTransferModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('admin.transfers.store') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5>Add Device Transfer</h5>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Device</label>
                    <select name="device_id" class="form-control" required>
                        @foreach($devices as $device)
                        <option value="{{ $device->id }}">{{ $device->device_name }} ({{ $device->tracking_code }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Collector</label>
                    <select name="collector_id" class="form-control" required>
                        @foreach($collectors as $collector)
                        <option value="{{ $collector->id }}">{{ $collector->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Partner</label>
                    <select name="partner_id" class="form-control" required>
                        @foreach($partners as $partner)
                        <option value="{{ $partner->id }}">{{ $partner->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer"><button class="btn btn-success">Save Transfer</button></div>
        </form>
    </div>
</div>
@endsection