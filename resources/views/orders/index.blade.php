@extends('layouts.app')

@section('content')
    <h1>Orders</h1>
    <a href="{{ route('orders.create') }}" class="btn btn-primary">Create New Order</a>
    
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Total Amount</th>
                <th>Products</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer->name }}</td>
                    <td>{{ number_format($order->total_amount, 2) }}₴</td>
                    <td>
                        {{ $order->products->count() }} 
                        ({{ $order->products->sum('pivot.quantity') }} items)
                    </td>
                    <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                    <td>
                        <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('orders.edit', $order) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure? This will restore the product quantities.')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    {{ $orders->links() }}
@endsection