@extends('layouts.app')

@section('content')
    <h1>Products</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Create New Product</a>
    
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->brand->name }}</td>
                    <td>{{ $product->price }}₴</td>
                    <td>{{ $product->amount }}</td>
                    <td>
                        <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    {{ $products->links() }}
@endsection