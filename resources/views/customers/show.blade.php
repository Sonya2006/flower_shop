@extends('layouts.app')

@section('content')
    <h1>Customer Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $customer->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $customer->email }}</p>
            <p class="card-text"><strong>Phone:</strong> {{ $customer->phone }}</p>
        </div>
    </div>

    <h2 class="mt-4">Orders</h2>

    @if($customer->orders->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Total Amount</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customer->orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>${{ number_format($order->total_amount, 2) }}</td>
                        <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-info">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No orders found for this customer.</p>
    @endif

    <a href="{{ route('customers.index') }}" class="btn btn-secondary mt-3">Back to Customers</a>
@endsection