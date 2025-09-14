@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Pickup Scheduling & Assignment</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- schedule pickup button -->
    <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addPickupModal">Schedule Pickup</button>

    <!-- Schedule Pickup Modal -->
    <div class="modal fade" id="addPickupModal" tabindex="-1">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('admin.devices.pickup.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header"><h5 class="modal-title">Schedule Pickup</h5></div>
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
                            <label>Assign Collector</label>
                            <select name="collector_id" class="form-control" required>
                                @foreach($collectors as $collector)
                                    <option value="{{ $collector->id }}">{{ $collector->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Pickup Date</label>
                            <input type="date" name="pickup_date" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success">Schedule</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Pickup Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Device</th>
                <th>Tracking Code</th>
                <th>Collector</th>
                <th>Pickup Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pickups as $pickup)
            <tr>
                <td>{{ $pickup->device->device_name }}</td>
                <td>{{ $pickup->device->tracking_code }}</td>
                <td>{{ $pickup->collector->name }}</td>
                <td>{{ $pickup->pickup_date }}</td>
                <td>{{ $pickup->status }}</td>
                <td>
                    <!-- Update Status Modal Trigger -->
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#statusModal{{ $pickup->id }}">Update Status</button>

                    <!-- Delete -->
                    <form action="{{ route('admin.devices.pickup.destroy', $pickup->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>

            <!-- Status Modal -->
            <div class="modal fade" id="statusModal{{ $pickup->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <form method="POST" action="{{ route('admin.devices.pickup.updateStatus', $pickup->id) }}">
                        @csrf @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header"><h5>Update Pickup Status</h5></div>
                            <div class="modal-body">
                                <select name="status" class="form-control">
                                    <option value="Pending" @if($pickup->status=='Pending') selected @endif>Pending</option>
                                    <option value="Collected" @if($pickup->status=='Collected') selected @endif>Collected</option>
                                    <option value="Completed" @if($pickup->status=='Completed') selected @endif>Completed</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @endforeach
        </tbody>
    </table>
</div>
@endsection
