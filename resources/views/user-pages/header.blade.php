@php 

$companies = \App\Models\Partner::all();

@endphp

<!-- Header Top Area -->

<div class="header-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-xs-12">
                <div class="contact-info">
                    <i class="las la-map-marker"></i> KK 407 ST, RWANDA.
                    <i class="las la-envelope"></i> info@ewaste.com
                    <i class="las la-phone"></i> +250 780 201 963
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-xs-12 text-end">
                <div class="header_top_right">
                    <div class="social-area">
                        <a href="#"><i class="lab la-facebook-f"></i></a>
                        <a href="#"><i class="lab la-youtube"></i></a>
                        <a href="#"><i class="lab la-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Header Area -->

<div class="header-area">
    <div class="sticky-area">
        <div class="navigation">
            <div class="container-fluid">
                <div class="header-inner-box">
                    <div class="logo">
                        <a class="navbar-brand" href="index.html"><img src="assets/img/logo.png" alt=""></a>
                    </div>

                    <div class="main-menu">
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                                <span class="navbar-toggler-icon"></span>
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse justify-content-center"
                                id="navbarSupportedContent">
                                <ul class="navbar-nav m-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{ route('home') }}">Home
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Companies
                                            <span class="sub-nav-toggler"> </span>
                                        </a>
                                        <ul class="sub-menu">
                                            @foreach ($companies as $company)
                                                <li><a href="{{ route('partners.show', $company->id) }}">{{ $company->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('home.devices') }}" class="nav-link">Devices</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('home.pricing') }}">Pricing</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('about') }}">About Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>

                    <div class="icon-wrapper">
                        <div class="search-icon search-trigger">Track device<i class="las la-search"></i></div>
                        
                    </div>

                    <div class="header-btn">

                    <button class="main-btn primary modal-toggle" data-bs-toggle="modal" data-bs-target="#submitDeviceModal">
                        Submit Device
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Device Tracking Search Popup -->
<div class="search-popup">
    <span class="search-back-drop"></span>

    <div class="search-inner">
        <div class="container">
            <div class="upper-text d-flex justify-content-between align-items-center mb-3">
                <div class="text">Track Your Submitted Device</div>
                <button class="close-search btn btn-light"><span class="la la-times"></span></button>
            </div>

            <!-- Track Device Form -->
            <form method="POST" action="{{ route('device.track') }}">
                @csrf
                <div class="form-group d-flex">
                    <input type="text" name="tracking_code" class="form-control" placeholder="Enter your device tracking code" required>
                    <button type="submit" class="btn btn-primary"><i class="la la-search"></i> Track</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Submit Device Modal -->
<div class="modal fade" id="submitDeviceModal" tabindex="-1" aria-labelledby="submitDeviceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('device.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
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
