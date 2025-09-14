@extends('layouts.guest')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4>Device Tracking Result</h4>
                </div>

                <div class="card-body">
                    <h5 class="mb-3"><strong>Tracking Code:</strong> {{ $device->tracking_code }}</h5>
                    <p><strong>Device Name/Type:</strong> {{ $device->device_name }} ({{ $device->type ?? '-' }})</p>
                    <p><strong>Brand:</strong> {{ $device->brand ?? '-' }}</p>
                    <p><strong>Condition:</strong> {{ $device->condition }}</p>
                    <p><strong>Quantity:</strong> {{ $device->quantity }}</p>
                    <p><strong>Pickup Address:</strong> {{ $device->pickup_address }}</p>
                    <p><strong>Submitted At:</strong> {{ $device->created_at->format('d M Y, H:i') }}</p>

                    @if($device->photo)
                        <div class="mb-3">
                            <img src="{{ asset('storage/devices/'.$device->photo) }}" alt="Device Photo" class="img-fluid rounded" style="max-height: 300px;">
                        </div>
                    @endif

                    <h5 class="mt-4">Current Status: <span class="badge 
                        @if($device->status=='Submitted') bg-secondary
                        @elseif($device->status=='Collected') bg-info
                        @elseif($device->status=='Transferred') bg-warning
                        @elseif($device->status=='Recycled') bg-success
                        @endif">{{ $device->status }}</span></h5>

                    <!-- Status Progress Bar -->
                    <div class="progress mt-3" style="height: 25px;">
                        <div class="progress-bar 
                            @if($device->status=='Submitted') bg-secondary
                            @elseif($device->status=='Collected') bg-info
                            @elseif($device->status=='Transferred') bg-warning
                            @elseif($device->status=='Recycled') bg-success
                            @endif" 
                            role="progressbar" style="width: 
                            @if($device->status=='Submitted') 25%
                            @elseif($device->status=='Collected') 50%
                            @elseif($device->status=='Transferred') 75%
                            @elseif($device->status=='Recycled') 100%
                            @endif;" 
                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>

                    <div class="mt-4 text-center">
                        <a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
