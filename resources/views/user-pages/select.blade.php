@extends('layouts.guest')

@section('content')
<div class="container py-4">
    <h2>Select a Partner for Device: {{ $device->device_name }}</h2>

    <!-- session messages -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <!-- End session messages -->
    <div class="row">
        @foreach($partners as $partner)
            <div class="col-md-6 mb-4">
                <div class="card p-3 shadow">
                    <h4>{{ $partner->name }}</h4>
                    <p>{{ $partner->address }}</p>
                    <hr>
                    <div class="row">
                        @foreach($partner->pricings as $pricing)
                            <div class="col-md-6">
                                <div class="border p-3 rounded mb-3">
                                    <h5>{{ $pricing->device_type }}</h5>
                                    <p><strong>{{ $pricing->price }} {{ $pricing->currency }}</strong></p>
                                    <form action="{{ route('checkout.proceed', $device->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="pricing_id" value="{{ $pricing->id }}">
                                        <button type="submit" class="btn btn-primary btn-sm">Choose & Continue</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
