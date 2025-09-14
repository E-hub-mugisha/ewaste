@extends('layouts.guest')

@section('content')

<!-- Submitted Devices Ready for Pickup Section -->
<div class="service-area gray-bg section-padding pt-200">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-xl-9 col-lg-9">
                <div class="section-title">
                    <h6>Devices Awaiting Collection</h6>
                    <h2>Submitted Devices Ready for Pickup</h2>
                </div>
            </div>
        </div>

        <div class="service-item-wrap mt-30 owl-carousel">
            <!-- Example Device 1 -->
            @foreach( $devices as $device )
            <div class="service-single">
                <div class="service-icon">
                    <img src="assets/img/devices/laptop.png" alt="Laptop">
                </div>
                <div class="service-content">
                    <h4>{{ $device->name }}</h4>
                    <hr>
                    <p>Status: <strong>Submitted & Ready for Pickup</strong></p>
                    <ul class="list-unstyled service-list">
                        <li><i class="las la-check"></i>Brand: {{ $device->brand }}</li>
                        <li><i class="las la-check"></i>Condition: {{ $device->condition }}</li>
                        <li><i class="las la-check"></i>Quantity: {{ $device->quantity }}</li>
                    </ul>
                    <!-- Track Device Button -->
                    <a class="main-btn primary" href="#" data-bs-toggle="modal" data-bs-target="#trackDeviceModal">Track Device</a>

                </div>
            </div>
            @endforeach

            <!-- More devices can be dynamically added here -->
        </div>

        <div class="more-services text-center mt-50">
            <p class="mb-0">Stay updated with devices ready for collection. <a href="#">View All Submissions</a></p>
        </div>
    </div>
</div>

<!-- Track Device Modal -->
<div class="modal fade" id="trackDeviceModal" tabindex="-1" aria-labelledby="trackDeviceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="trackDeviceModalLabel">Track Your Device</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('device.track') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="tracking_code" class="form-label">Tracking Code</label>
                        <input type="text" class="form-control" id="tracking_code" name="tracking_code" placeholder="Enter your tracking code" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Track Device</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection