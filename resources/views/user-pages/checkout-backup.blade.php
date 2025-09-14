@extends('layouts.app')

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

                    <!-- Payment Form -->
                    <form method="POST" action="{{ route('payment.initiate') }}">
                        @csrf
                        <input type="hidden" name="device_id" value="{{ $device->id }}">
                        <input type="hidden" name="pricing_id" value="{{ $pricing->id }}">
                        <input type="hidden" name="amount" value="{{ $pricing->price * $device->quantity }}">
                        <input type="hidden" name="currency" value="{{ $pricing->currency }}">
                        <input type="hidden" name="email" value="{{ $device->user->email }}">
                        <input type="hidden" name="name" value="{{ $device->user->name }}">
                        <input type="hidden" name="phone" value="{{ $device->user->phone }}">

                        <button type="submit" class="btn btn-success btn-lg w-100">
                            Pay with Flutterwave
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
