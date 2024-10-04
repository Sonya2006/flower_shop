@extends('layouts.app')

@section('content')
    <h1>Create Order</h1>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="customer_id" class="form-label">Customer</label>
            <select class="form-control @error('customer_id') is-invalid @enderror" id="customer_id" name="customer_id" required>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
            @error('customer_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Products</label>
            @foreach($products as $product)
                <div class="form-check">
                    <input class="form-check-input product-checkbox" type="checkbox" name="products[]" value="{{ $product->id }}" id="product{{ $product->id }}">
                    <label class="form-check-label" for="product{{ $product->id }}">
                        {{ $product->name }} - {{ $product->price }}₴ (Available: {{ $product->amount }})
                    </label>
                    <input type="number" name="quantities[{{ $product->id }}]" value="0" min="0" max="{{ $product->amount }}" class="form-control form-control-sm d-inline-block product-quantity" style="width: 60px;" disabled>
                </div>
            @endforeach
            @error('products')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create Order</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('.product-checkbox');
            const quantities = document.querySelectorAll('.product-quantity');

            checkboxes.forEach((checkbox, index) => {
                checkbox.addEventListener('change', function() {
                    quantities[index].disabled = !this.checked;
                    if (!this.checked) {
                        quantities[index].value = 0;
                    }
                });
            });
        });
    </script>
@endsection