@extends('layouts.main')

@section('container')
    <div class="products-container">
        @foreach ($products as $product)
            <div class="products-cover">
                <div class="products-card"><a href=""></a>
                    <img src="{{ asset('storage/' . $product->product_image) }}" class="card-img-top" alt="{{ $product->product_name }}">
                    <div class="card-body">
                        <h3 class="products-card-name">{{ $product->product_name }}</h5>
                        <p class="products-card-price">Rp{{ number_format($product->product_price, 2, ',', '.') }}</p>
                        <p class="products-card-stock">Stock: {{ $product->product_stock }}</p>
                        <p class="products-card-brand">Brand: {{ $product->msbrand->brand_name ?? 'Tidak ada' }}</p>
                        <p class="products-card-category">Category: {{ $product->mscategory->category_name ?? 'Tidak ada' }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection