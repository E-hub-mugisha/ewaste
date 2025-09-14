@extends('layouts.guest')

@section('content')
<!-- Partner Details Section -->
<div class="partner-details-area sky-bg section-padding">
    <div class="container">
        <div class="row justify-content-center mb-50">
            <div class="col-lg-8 text-center">
                <h6>Partner Details</h6>
                <h2>{{ $partner->name }}</h2>
            </div>
        </div>

        <div class="row justify-content-center mb-50">
            <div class="col-lg-6">
                <div class="partner-info-box p-4 bg-white shadow-sm rounded">
                    <h4>Contact Information</h4>
                    <ul class="list-unstyled">
                        <li><strong>Email:</strong> {{ $partner->email }}</li>
                        <li><strong>Phone:</strong> {{ $partner->phone ?? 'Not Provided' }}</li>
                        <li><strong>Address:</strong> {{ $partner->address ?? 'Not Provided' }}</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Partner Pricing Plans -->
        <div class="row justify-content-center mb-30">
            <div class="col-lg-12 text-center">
                <h3>Pricing Plans</h3>
                <p>Check the recycling pricing for different device types offered by {{ $partner->name }}.</p>
            </div>
        </div>

        <div class="row no-gutters">
            @foreach($partner->pricings as $pricing)
                <div class="col-xl-4 col-lg-4 col-md-6 mt-30">
                    <div class="single-pricing-box">
                        <div class="pricing-head">
                            <h4 class="sub-title">{{ $pricing->device_type }}</h4>
                            <h2 class="price">
                                <span>{{ $pricing->currency }}</span>{{ number_format($pricing->price, 0) }}
                            </h2>
                        </div>
                        <ul>
                            <li><i class="las la-check"></i> Safe Collection</li>
                            <li><i class="las la-check"></i> Environment Friendly Processing</li>
                            <li><i class="las la-check"></i> Expert Team Handling</li>
                            <li><i class="las la-check"></i> Transparent Pricing</li>
                            <li><i class="las la-check"></i> Quick Turnaround</li>
                            <li><i class="las la-check"></i> Reliable Pickup</li>
                        </ul>
                        <a href="#submitDeviceModal" class="site-btn" data-bs-toggle="modal">Submit Device</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
