@extends('layouts.guest')
@section('title', 'Payment Failed')

@section('content')
<div class="container py-5 text-center">
    <h2 class="text-danger">❌ Payment Failed</h2>
    <p>Unfortunately, your payment could not be completed.</p>
    <a href="{{ route('home') }}" class="btn btn-primary mt-3">Try Again</a>
</div>
@endsection
