@extends('layouts.app')
@section('content')

<!-- payment -->

<div class="container mt-5">
    <h2 class="mb-4">Payments</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if($payments->isEmpty())
        <p>No payments found.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Device</th>
                    <th>Partner</th>
                    <th>Pricing</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                    <tr>
                        <td>{{ $payment->id }}</td>
                        <td>{{ $payment->user->name }}</td>
                        <td>{{ $payment->device->name }}</td>
                        <td>{{ $payment->partner->name }}</td>
                        <td>${{ number_format($payment->pricing->price, 2) }}</td>
                        <td>${{ number_format($payment->amount, 2) }}</td>
                        <td>{{ ucfirst($payment->status) }}</td>
                        <td>{{ $payment->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <a href="{{ route('admin.payments.show', $payment) }}" class="btn btn-info btn-sm">View</a>
                            <form action="{{ route('admin.payments.destroy', $payment) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this payment?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $payments->links() }}
    @endif
</div>

@endsection