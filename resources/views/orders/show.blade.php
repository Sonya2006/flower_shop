@extends('layouts.app')

@section('content')
    <h1>Order Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Order ID: {{ $order->id }}</h5>
            <p class="card-text">Customer: {{ $order->customer->name }}</p>
            <p class="card-text">Total Amount: {{ number_format($order->total_amount, 2) }}₴</p>
            <p class="card-text">Created At: {{ $order->created_at->format('Y-m-d H:i') }}</p>
        </div>
    </div>

    <h2 class="mt-4">Products</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->pivot->quantity }}</td>
                    <td>{{ number_format($product->price, 2) }}₴</td>
                    <td>{{ number_format($product->pivot->quantity * $product->price, 2) }}₴</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('orders.index') }}" class="btn btn-secondary mt-3">Back to Orders</a>
@endsection