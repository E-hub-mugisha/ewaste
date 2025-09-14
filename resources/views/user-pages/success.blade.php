@extends('layouts.guest')
@section('title', 'Payment Successful')

@section('content')
<div class="container py-5 text-center">
    <h2 class="text-success">✅ Payment Successful</h2>
    <p>Thank you, your payment for <strong>{{ $payment->device->device_name }}</strong> has been confirmed.</p>
    <p><strong>Amount:</strong> RWF {{ number_format($payment->amount) }}</p>
    <p><strong>Transaction ID:</strong> {{ $payment->transaction_id }}</p>
    <a href="{{ route('home') }}" class="btn btn-primary mt-3">Back to Home</a>
</div>
@endsection
