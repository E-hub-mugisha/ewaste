@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Device Management</h2>

    <!-- Add Device Button -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addDeviceModal">Add Device</button>

    <!-- Devices Table -->
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Device</th>
                    <th>Brand</th>
                    <th>Condition</th>
                    <th>Qty</th>
                    <th>Status</th>
                    <th>Tracking Code</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($devices as $device)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $device->user->name }}</td>
                    <td>{{ $device->device_name }}</td>
                    <td>{{ $device->brand }}</td>
                    <td>{{ $device->condition }}</td>
                    <td>{{ $device->quantity }}</td>
                    <td>
                        <span class="badge bg-info">{{ $device->status }}</span>
                    </td>
                    <td>{{ $device->tracking_code }}</td>
                    <td>
                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#showDeviceModal{{ $device->id }}">Show</button>
                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editDeviceModal{{ $device->id }}">Edit</button>
                        <button class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#statusDeviceModal{{ $device->id }}">Update Status</button>
                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteDeviceModal{{ $device->id }}">Delete</button>
                    </td>
                </tr>

                <!-- Show Modal -->
                <div class="modal fade" id="showDeviceModal{{ $device->id }}" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Device Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Device Name:</strong> {{ $device->device_name }}</p>
                                <p><strong>Brand:</strong> {{ $device->brand }}</p>
                                <p><strong>Type:</strong> {{ $device->type }}</p>
                                <p><strong>Condition:</strong> {{ $device->condition }}</p>
                                <p><strong>Quantity:</strong> {{ $device->quantity }}</p>
                                <p><strong>Pickup Address:</strong> {{ $device->pickup_address }}</p>
                                <p><strong>Tracking Code:</strong> {{ $device->tracking_code }}</p>
                                <p><strong>Status:</strong> {{ $device->status }}</p>
                                <p><strong>Submitted By:</strong> {{ $device->user->name }} ({{ $device->user->email }})</p>
                                @if($device->photo)
                                <p><strong>Photo:</strong></p>
                                <img src="{{ asset('storage/'.$device->photo) }}" class="img-fluid rounded" style="max-height:300px;">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </tbody>
        </table>
    </div>
</div>

@foreach($devices as $device)
<!-- Edit Modal -->
<div class="modal fade" id="editDeviceModal{{ $device->id }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('admin.devices.update', $device->id) }}" method="POST" enctype="multipart/form-data" class="modal-content">
            @csrf @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title">Edit Device</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Device Name</label>
                    <input type="text" name="device_name" class="form-control" value="{{ $device->device_name ?? '' }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Brand</label>
                    <input type="text" name="brand" class="form-control" value="{{ $device->brand ?? '' }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Type</label>
                    <input type="text" name="type" class="form-control" value="{{ $device->type ?? '' }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Condition</label>
                    <select name="condition" class="form-select" required>
                        @foreach(['New','Good','Fair','Poor'] as $cond)
                        <option value="{{ $cond }}" {{ (isset($device) && $device->condition == $cond) ? 'selected' : '' }}>{{ $cond }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Quantity</label>
                    <input type="number" name="quantity" class="form-control" value="{{ $device->quantity ?? 1 }}" min="1" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Pickup Address</label>
                    <textarea name="pickup_address" class="form-control" rows="2" required>{{ $device->pickup_address ?? '' }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Photo</label>
                    <input type="file" name="photo" class="form-control">
                    @if(isset($device) && $device->photo)
                    <small class="text-muted">Current: <a href="{{ asset('storage/'.$device->photo) }}" target="_blank">View Photo</a></small>
                    @endif
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endforeach

@foreach($devices as $device)
<!-- Update Status Modal -->
<div class="modal fade" id="statusDeviceModal{{ $device->id }}" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('admin.devices.updateStatus', $device->id) }}" method="POST" class="modal-content">
            @csrf @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title">Update Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <select name="status" class="form-select" required>
                    <option value="Submitted" {{ $device->status == 'Submitted' ? 'selected' : '' }}>Submitted</option>
                    <option value="Collected" {{ $device->status == 'Collected' ? 'selected' : '' }}>Collected</option>
                    <option value="Transferred" {{ $device->status == 'Transferred' ? 'selected' : '' }}>Transferred</option>
                    <option value="Recycled" {{ $device->status == 'Recycled' ? 'selected' : '' }}>Recycled</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</div>
@endforeach

@foreach($devices as $device)
<!-- Delete Modal -->
<div class="modal fade" id="deleteDeviceModal{{ $device->id }}" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('admin.devices.destroy', $device->id) }}" method="POST" class="modal-content">
            @csrf @method('DELETE')
            <div class="modal-header">
                <h5 class="modal-title">Delete Device</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete <strong>{{ $device->device_name }}</strong>?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Yes, Delete</button>
            </div>
        </form>
    </div>
</div>
@endforeach
<!-- Add Device Modal -->
<div class="modal fade" id="addDeviceModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('admin.devices.store') }}" method="POST" enctype="multipart/form-data" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Add Device</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Device Name</label>
                    <input type="text" name="device_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Brand</label>
                    <input type="text" name="brand" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Type</label>
                    <input type="text" name="type" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Condition</label>
                    <select name="condition" class="form-select" required>
                        @foreach(['New','Good','Fair','Poor'] as $cond)
                        <option value="{{ $cond }}">{{ $cond }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Quantity</label>
                    <input type="number" name="quantity" class="form-control" min="1" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Pickup Address</label>
                    <textarea name="pickup_address" class="form-control" rows="2" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Photo</label>
                    <input type="file" name="photo" class="form-control">

                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save Device</button>
            </div>
        </form>
    </div>
</div>
@endsection