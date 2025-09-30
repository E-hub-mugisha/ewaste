@extends('layouts.guest')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <!-- Checkout Card -->
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Checkout</h4>
                </div>

                <div class="card-body">
                    <!-- Device Details -->
                    <h5 class="mb-3">Device Information</h5>
                    <ul class="list-group mb-4">
                        <li class="list-group-item"><strong>Device:</strong> {{ $device->device_name }}</li>
                        <li class="list-group-item"><strong>Brand:</strong> {{ $device->brand ?? 'N/A' }}</li>
                        <li class="list-group-item"><strong>Type:</strong> {{ $device->type ?? 'N/A' }}</li>
                        <li class="list-group-item"><strong>Condition:</strong> {{ $device->condition }}</li>
                        <li class="list-group-item"><strong>Quantity:</strong> {{ $device->quantity }}</li>
                        <li class="list-group-item"><strong>Pickup Address:</strong> {{ $device->pickup_address }}</li>
                    </ul>

                    <!-- Pricing Info -->
                    <h5 class="mb-3">Pricing Plan ({{ $pricing->partner->name }})</h5>
                    <ul class="list-group mb-4">
                        <li class="list-group-item"><strong>Device Type:</strong> {{ $pricing->device_type }}</li>
                        <li class="list-group-item"><strong>Price per Device:</strong> {{ number_format($pricing->price, 2) }} {{ $pricing->currency }}</li>
                        <li class="list-group-item"><strong>Total:</strong> {{ number_format($pricing->price * $device->quantity, 2) }} {{ $pricing->currency }}</li>
                    </ul>

                    <a href="/" class="btn btn-primary btn-lg btn-block">Back to home</a>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection
