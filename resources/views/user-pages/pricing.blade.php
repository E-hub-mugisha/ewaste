@extends('layouts.guest')

@section('content')

<!-- Pricing Section -->
<div class="pricing-area sky-bg section-padding">
    <div class="container">
        <div class="row justify-content-center text-center mb-50">
            <div class="col-lg-8">
                <div class="section-title">
                    <h6>Affordable Recycling Services</h6>
                    <h2>Pricing Plans Per Partner</h2>
                </div>
            </div>
        </div>

        @foreach($partners as $partner)
        <div class="partner-pricing mb-70">
            <div class="row justify-content-center text-center mb-30">
                <div class="col-lg-12">
                    <h3 class="partner-name">{{ $partner->name }}</h3>
                    <p>Pricing for devices collected by {{ $partner->name }}</p>
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

                <!-- Submit Device Modal -->
                <div class="modal fade" id="submitDeviceModal" tabindex="-1" aria-labelledby="submitDeviceModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form action="{{ route('device.storeDevice') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="partner_id" value="{{ $partner->id }}">
                                <input type="hidden" name="pricing_id" value="{{ $pricing->id }}">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="submitDeviceModalLabel">Submit Your Device</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label>Device Name / Type</label>
                                        <input type="text" name="device_name" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Brand</label>
                                        <input type="text" name="brand" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Condition</label>
                                        <select name="condition" class="form-control" required>
                                            <option value="New">New</option>
                                            <option value="Good">Good</option>
                                            <option value="Fair">Fair</option>
                                            <option value="Poor">Poor</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label>Quantity</label>
                                        <input type="number" name="quantity" class="form-control" min="1" value="1" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Photo</label>
                                        <input type="file" name="photo" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Pickup Address</label>
                                        <textarea name="pickup_address" class="form-control" rows="3" required></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Submit Device</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>



@endsection