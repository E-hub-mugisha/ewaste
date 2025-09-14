@extends('layouts.guest')

@section('content')

<!-- Hero Area -->
<div class="homepage-slides">
    <!-- Slide 1 -->
    <div class="single-slide-item">
        <div class="image-layer" style="background-image: url(assets/img/slider/slide-4.jpg);">
            <div class="overlay"></div>
        </div>

        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-8 col-lg-8 wow fadeInUp animated" data-wow-delay=".2s">
                    <div class="hero-area-content">
                        <div class="section-title">
                            <h6>Welcome to E-Waste Hub</h6>
                            <h1>Safe & Responsible <br> Electronic Waste Recycling</h1>
                        </div>
                        <p>Our platform empowers individuals and businesses to submit electronic devices for recycling,
                            schedule pickups, and track the status of their devices—all while contributing to a cleaner
                            and more sustainable environment.</p>
                        <a href="#" class="main-btn primary mt-30" data-bs-toggle="modal" data-bs-target="#submitDeviceModal">Submit Your Device</a>
                        <a href="#" class="main-btn secondary mt-30">Track Your Device</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Slide 2 -->
    <div class="single-slide-item hero-area-bg-2">
        <div class="image-layer" style="background-image: url(assets/img/slider/slide-2.jpg);">
            <div class="overlay"></div>
        </div>

        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-9 col-lg-9 wow fadeInUp animated" data-wow-delay=".2s">
                    <div class="hero-area-content">
                        <div class="section-title">
                            <h6>Reduce | Reuse | Recycle</h6>
                            <h1>Transforming E-Waste <br> Into Resources</h1>
                        </div>
                        <p>Join our mission to minimize electronic waste pollution. Submit old devices, schedule pickups,
                            and learn how recycling benefits the environment while supporting responsible e-waste management.</p>
                        <a href="#" class="main-btn primary mt-30" data-bs-toggle="modal" data-bs-target="#submitDeviceModal">Submit Your Device</a>
                        <a href="#" class="main-btn secondary mt-30">Track Your Device</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- About Section -->
<div class="about-area section-padding">
    <div class="container">
        <div class="row gx-5">
            <!-- About Content -->
            <div class="col-lg-6 col-xl-6 wow fadeInUp" data-wow-delay=".2s">
                <div class="about-content-wrap">
                    <div class="section-title">
                        <p>Electronic Waste Collection & Recycling Platform</p>
                        <h2 class="mt-0">Pioneering Responsible E-Waste Management</h2>
                    </div>
                    <div class="about-content">
                        <div class="row">
                            <div class="col-lg-12 col-xl-12">
                                <div class="about-content-left">
                                    <p class="highlight">
                                        We provide a safe and efficient way to dispose of electronic devices, leveraging modern technology to collect, track, and recycle e-waste responsibly.
                                    </p>

                                    <p>
                                        By recycling electronic devices, we reduce pollution, conserve natural resources, and contribute to a cleaner, sustainable environment. Our mission is to make e-waste management easy and accessible for everyone.
                                    </p>

                                    <div class="row mt-30">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                                            <div class="featured-area">
                                                <div class="featured-icon">
                                                    <i class="las la-business-time"></i>
                                                </div>
                                                <div class="featured-content">
                                                    <div class="featured-title">
                                                        <h5>Scheduled <br>Pickups</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                                            <div class="featured-area">
                                                <div class="featured-icon">
                                                    <i class="las la-stopwatch"></i>
                                                </div>
                                                <div class="featured-content">
                                                    <div class="featured-title">
                                                        <h5>Real-Time <br>Tracking</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                                            <div class="featured-area">
                                                <div class="featured-icon">
                                                    <i class="las la-recycle"></i>
                                                </div>
                                                <div class="featured-content">
                                                    <div class="featured-title">
                                                        <h5>Eco-Friendly <br>Recycling</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- About Image -->
            <div class="col-12 col-lg-6 wow fadeInLeft" data-wow-delay=".4s">
                <div class="about-img position-relative">
                    <img src="assets/img/about/about.jpg" alt="E-Waste Recycling">
                    <div class="about-counter">
                        <div class="counter-icon">
                            <img src="assets/img/icon/customer-service.png" alt="Happy Users">
                        </div>
                        <div class="counter-number">
                            <span class="counting" data-counterup-nums="154">4754</span>
                        </div>
                        <h6>Devices Successfully Recycled</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Service Area -->
<div class="service-area sky-bg section-padding pb-50">
    <div class="container">
        <div class="section-title">
            <h6>What We Do</h6>
            <h2>Our E-Waste Recycling Services</h2>
        </div>

        <div class="row">
            <!-- Device Collection -->
            <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                <div class="services-two_single">
                    <div class="services-two_img-box">
                        <div class="services-two_img">
                            <img src="assets/img/service/device_collection.jpg" alt="Device Collection">
                        </div>
                        <div class="services-two_icon">
                            <img src="assets/img/icon/device.png" alt="Device Icon">
                        </div>
                    </div>
                    <div class="services-two_content">
                        <h3 class="services-two_title"><a href="#">Device Collection</a></h3>
                        <p>Submit your old electronics including phones, laptops, and other devices. Schedule pickups for safe collection.</p>
                        <div class="services-two_bottom">
                            <a href="#" class="services-one_btn" data-bs-toggle="modal" data-bs-target="#submitDeviceModal">Submit Now</a>
                            <a href="#" class="services-one_arrow"><span class="icon-right-arrow"></span></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Device Recycling -->
            <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                <div class="services-two_single">
                    <div class="services-two_img-box">
                        <div class="services-two_img">
                            <img src="assets/img/service/device_recycling.jpg" alt="Device Recycling">
                        </div>
                        <div class="services-two_icon">
                            <img src="assets/img/icon/recycle.png" alt="Recycle Icon">
                        </div>
                    </div>
                    <div class="services-two_content">
                        <h3 class="services-two_title"><a href="#">Device Recycling</a></h3>
                        <p>We dismantle and recycle electronic devices responsibly, ensuring hazardous materials are handled safely and resources are recovered.</p>
                        <div class="services-two_bottom">
                            <a href="#" class="services-one_btn">Learn More</a>
                            <a href="#" class="services-one_arrow"><span class="icon-right-arrow"></span></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pickup & Tracking -->
            <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                <div class="services-two_single">
                    <div class="services-two_img-box">
                        <div class="services-two_img">
                            <img src="assets/img/service/pickup_tracking.jpg" alt="Pickup & Tracking">
                        </div>
                        <div class="services-two_icon">
                            <img src="assets/img/icon/tracking.png" alt="Tracking Icon">
                        </div>
                    </div>
                    <div class="services-two_content">
                        <h3 class="services-two_title"><a href="#">Pickup & Tracking</a></h3>
                        <p>Track your submitted devices in real-time and receive updates on pickup, transfer, and recycling status.</p>
                        <div class="services-two_bottom">
                            <a href="{{ route('device.track.form') }}" class="services-one_btn">Track Device</a>
                            <a href="#" class="services-one_arrow"><span class="icon-right-arrow"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-7 text-center">
                <div class="service-note mt-50">
                    <p>We Provide Comprehensive E-Waste Recycling Services. <a href="#how-it-works">Learn How It Works</a></p>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Process Section -->
<div class="process-area dark-bg section-padding">
    <div class="container">
        <div class="row align-items-center">
            <!-- Section Title -->
            <div class="col-xl-6 col-lg-6">
                <div class="section-title">
                    <h6>Recycle Electronics, Save the Environment!</h6>
                    <h2 class="text-white">Easy Steps to Submit & Recycle Your Devices</h2>
                </div>
            </div>

            <!-- Description & CTA -->
            <div class="col-xl-6 col-lg-6">
                <div class="process-right-content">
                    <p class="text-white">
                        Our E-Waste Collection System allows you to safely dispose of electronic devices, schedule pickups,
                        track submissions, and ensure responsible recycling of all collected items.
                    </p>
                    <p class="text-white">
                        Follow these simple steps to make your contribution to a cleaner and more sustainable environment.
                    </p>
                    <div class="process-btn">
                        <a href="#" class="main-btn" data-bs-toggle="modal" data-bs-target="#submitDeviceModal">Submit Device</a>
                        <a href="{{ route('device.track.form') }}" class="main-btn white">Track Device</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Process Steps -->
        <div class="process-item-wrap">
            <div class="row">
                <!-- Step 1: Submit Device -->
                <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInLeft" data-wow-delay=".2s">
                    <div class="process-single">
                        <div class="process-icon">
                            <img src="assets/img/process/1.png" alt="Submit Device">
                        </div>
                        <div class="process-title">
                            <h5>Submit Device</h5>
                        </div>
                        <div class="process-desc">
                            <p>Fill out the device submission form with details and photos of your electronic items.</p>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Pickup -->
                <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInLeft" data-wow-delay=".4s">
                    <div class="process-single two">
                        <div class="process-icon">
                            <img src="assets/img/process/2.png" alt="Pickup">
                        </div>
                        <div class="process-title">
                            <h5>Pickup Scheduled</h5>
                        </div>
                        <div class="process-desc">
                            <p>Our collectors pick up the devices at the scheduled time from your location.</p>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Transfer & Tracking -->
                <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInLeft" data-wow-delay=".6s">
                    <div class="process-single three">
                        <div class="process-icon">
                            <img src="assets/img/process/3.png" alt="Transfer & Tracking">
                        </div>
                        <div class="process-title">
                            <h5>Transfer & Track</h5>
                        </div>
                        <div class="process-desc">
                            <p>Track your devices as they are transferred to certified recycling partners for processing.</p>
                        </div>
                    </div>
                </div>

                <!-- Step 4: Responsible Recycling -->
                <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInLeft" data-wow-delay=".8s">
                    <div class="process-single four">
                        <div class="process-icon">
                            <img src="assets/img/process/4.png" alt="Recycling">
                        </div>
                        <div class="process-title">
                            <h5>Recycling Completed</h5>
                        </div>
                        <div class="process-desc">
                            <p>Devices are safely recycled, and resources are recovered, contributing to a cleaner environment.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Partners Section -->
<div class="project-area gray-bg section-padding">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-7">
                <div class="section-title">
                    <h6>Our Trusted Partners</h6>
                    <h2>We Collaborate With Certified Recycling Centers</h2>
                </div>
            </div>
        </div>

        <div class="project-wrap owl-carousel">
            <!-- Partner 1 -->
            @foreach ($partners as $partner)
            <div class="project-single">
                <div class="project-img">
                    <img src="assets/img/partners/partner1.jpg" alt="Partner 1">
                </div>
                <div class="project-content">
                    <div class="project-cat">
                        <a href="#">Electronics, </a>
                        <a href="#">E-Waste</a>
                    </div>
                    <div class="project-title">
                        <h4>{{ $partner->name }}</h4>
                    </div>
                    <div class="project-desc">
                        <p>Specializes in responsible electronics recycling and resource recovery from e-waste devices.</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>



<!-- Choose Us Area -->
<div class="choose_us section-padding">
    <div class="container">
        <div class="row">
            <!-- Image -->
            <div class="col-xl-6 col-lg-6 wow fadeInLeft" data-wow-delay=".2s">
                <div class="choose_us_left">
                    <div class="choose_us_img">
                        <img src="assets/img/choose_us_ewaste.jpg" alt="E-Waste Collection">
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="col-xl-6 col-lg-6 wow fadeInUp" data-wow-delay=".4s">
                <div class="choose_us_right">
                    <div class="section-title text-left">
                        <h6>Our Core Features</h6>
                        <h2>Why Choose Our <br>E-Waste Collection Services?</h2>
                    </div>

                    <p class="choose_us_right-text">
                        Our platform makes electronic waste recycling easy, safe, and eco-friendly. We provide end-to-end
                        services from device submission and pickup to responsible recycling and tracking, helping you reduce
                        electronic waste while contributing to a sustainable environment.
                    </p>

                    <ul class="list-unstyled choose_us_points">
                        <li>
                            <div class="icon">
                                <i class="las la-check"></i>
                            </div>
                            <div class="text">
                                <p>Convenient Device Pickup</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="las la-check"></i>
                            </div>
                            <div class="text">
                                <p>Track Your Device in Real-Time</p>
                            </div>
                        </li>
                    </ul>
                    <ul class="list-unstyled choose_us_points">
                        <li>
                            <div class="icon">
                                <i class="las la-check"></i>
                            </div>
                            <div class="text">
                                <p>Responsible Recycling & Resource Recovery</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="las la-check"></i>
                            </div>
                            <div class="text">
                                <p>Environmentally Sustainable Practices</p>
                            </div>
                        </li>
                    </ul>

                    <div class="progress-bar-area mt-30">
                        <div class="single-bar-item">
                            <h4>Device Recycling</h4>
                            <div id="bar1" class="barfiller">
                                <span class="tip">95%</span>
                                <span class="fill" data-percentage="95"></span>
                            </div>
                        </div>

                        <div class="single-bar-item">
                            <h4>Pickup & Tracking</h4>
                            <div id="bar2" class="barfiller">
                                <span class="tip">85%</span>
                                <span class="fill" data-percentage="85"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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

<!-- Contact / Submit Device Section -->
<div class="contact-area section-padding">
    <div class="container">
        <div class="row align-items-center">
            <!-- Info & Environmental Impact -->
            <div class="col-xl-5 col-lg-6 wow fadeInUp" data-wow-delay=".2s">
                <div class="contact-wrap">
                    <div class="section-title">
                        <h6>Join The Green Movement!</h6>
                        <h2 class="text-white">Submit Your E-Waste & Contribute to a Cleaner Planet</h2>
                    </div>
                    <div class="contact-desc">
                        <p class="text-white">
                            Our platform helps you responsibly dispose of electronics and other devices.
                            Submit your items, schedule pickups, and track their recycling progress while
                            protecting the environment.
                        </p>
                    </div>
                    <div class="contact-list-wrap">
                        <div class="row">
                            <div class="col-12 col-md-4 col-sm-6 col-lg-6">
                                <ul class="list-unstyled contact-list">
                                    <li><i class="las la-check"></i> Reduce Greenhouse Effect</li>
                                    <li><i class="las la-check"></i> Conserve Natural Resources</li>
                                    <li><i class="las la-check"></i> Reduce Carbon Emissions</li>
                                </ul>
                            </div>
                            <div class="col-12 col-md-4 col-sm-6 col-lg-6">
                                <ul class="list-unstyled contact-list">
                                    <li><i class="las la-check"></i> Protect Ecosystems</li>
                                    <li><i class="las la-check"></i> Economic Benefits</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="contact-btn">
                        <a class="main-btn white" href="#submitDeviceModal" data-bs-toggle="modal">Submit Device</a>
                    </div>
                </div>
            </div>

            <!-- Device Submission Form -->
            <div class="col-xl-6 col-lg-6 offset-xl-1 wow fadeInUp" data-wow-delay=".4s">
                <div class="quotation-wrap">
                    <div class="quotation-inner">
                        <h5 class="quotation-heading">Submit Your Device</h5>
                        <p class="quotation-desc">
                            Fill the form below to submit your device for collection. Choose the type of recycling and schedule your pickup easily.
                        </p>
                        <form action="#" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label>Name</label>
                                    <input class="form-control" type="text" name="name" placeholder="e.g., Your name" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label>Email</label>
                                    <input class="form-control" type="email" name="email" placeholder="e.g., yourname@example.com" required>
                                </div>
                                <div class="col-12">
                                    <label>Subject</label>
                                    <select class="form-control" name="subject" required>
                                        <option value="">Select Subject</option>
                                        <option value="Recycling">Recycling</option>
                                        <option value="E-Waste">E-Waste</option>
                                        <option value="Donation">Donation</option>
                                        <option value="Pickup">Pickup</option>
                                    </select>
                                </div>
                                <div class="col-12 mt-3">
                                    <label>Message</label>
                                    <textarea class="form-control" name="message" rows="4" placeholder="Your message" required></textarea>
                                </div>
                                <div class="col-12 mt-4">
                                    <button class="main-btn primary w-100" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Triggered by "Submit Device" Button -->
<div class="modal fade" id="submitDeviceModal" tabindex="-1" aria-labelledby="submitDeviceLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="submitDeviceLabel">Submit Your Device</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
        </div>
    </div>
</div>


<!--Team Start-->
<div class="team-section section-padding pb-60">
    <div class="container">
        <div class="row">
            @foreach( $collectors as $collector )
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="100ms">
                <div class="team-single">
                    <div class="team-img">
                        <img src="assets/img/team/1.jpg" alt="">
                        <ul class="list-unstyled team-social">
                            <li><a href="#"><i class="lab la-twitter"></i></a></li>
                            <li><a href="#"><i class="lab la-facebook"></i></a></li>
                            <li><a href="#"><i class="lab la-instagram"></i></a></li>
                        </ul>
                    </div>
                    <div class="team-content">
                        <h4 class="team-name">{{ $collector->name }}</h4>
                        <p class="team-title">{{ $collector->role }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


@endsection