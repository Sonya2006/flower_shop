@extends('layouts.app')

@section('content')
    <h1>Category Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $category->name }}</h5>
            <p class="card-text">{{ $category->description }}</p>
        </div>
    </div>

    <h2 class="mt-4">Products in this Category</h2>

    @if($category->products->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Brand</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($category->products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->brand->name }}</td>
                        <td>
                            <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-info">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No products found in this category.</p>
    @endif

    <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-3">Back to Categories</a>
@endsection