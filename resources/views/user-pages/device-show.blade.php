@extends('layouts.guest')
@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Device successful submitted</h3>
            </div>
            <div class="card-body">
                <h5 class="card-title">Thank you for your submission!</h5>
                <p class="card-text">Your device has been successfully submitted. Below are the details of your submission keep your tracking code safe:</p>
                <hr>
                <p><strong>Tracking Code:</strong> {{ $device->tracking_code }}</p>
                <p><strong>Type:</strong> {{ $device->type }}</p>
                <p><strong>Brand:</strong> {{ $device->brand }}</p>
                <p><strong>Model:</strong> {{ $device->model }}</p>
                <p><strong>Condition:</strong> {{ $device->condition }}</p>
                <p><strong>Description:</strong> {{ $device->description }}</p>
                <p><strong>Status:</strong> {{ $device->status }}</p>
                <p><strong>Submitted At:</strong> {{ $device->created_at->format('d M Y, H:i') }}</p>
                <a href="#" class="btn btn-secondary mt-3">Back to home</a>

                <blockquote class="mt-4">
                    <p class="mb-0">A confirmation email has been sent to your registered email address and keep an eye on your inbox for further updates.</p>
                    <p class="mb-0">If you have any questions or need assistance, feel free to contact our support team.</p>
                    <footer class="blockquote-footer mt-4">E-Waste Recycling Team</footer>
                </blockquote>
            </div>
        </div>
    </div>
@endsection