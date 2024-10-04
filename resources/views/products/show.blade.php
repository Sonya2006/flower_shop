@extends('layouts.app')

@section('content')
    <h1>Product Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">{{ $product->description }}</p>
            <p class="card-text"><strong>Price:</strong> {{ number_format($product->price, 2) }}₴</p>
            <p class="card-text">{{ $product->amount }}</p>
            <p class="card-text"><strong>Category:</strong> {{ $product->category->name }}</p>
            <p class="card-text"><strong>Brand:</strong> {{ $product->brand->name }}</p>
        </div>
    </div>

    <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Back to Products</a>
@endsection