@extends('layouts.main')

@section('container')
    @if ($products->count())
        <div class="products-container">
            @foreach ($products as $product)
                <div class="products-cover">
                    <div class="products-card">
                        <a href="{{ url('/products/' . $product->product_slug) }}">
                            <img src="{{ asset('storage/product_photos/' . $product->product_image) }}" class="card-img-top" alt="{{ $product->product_name }}">
                        </a>
                        <div class="card-body">
                            <h3 class="products-card-name">{{ $product->product_name }}</h3>
                            <p class="products-card-price">Rp{{ number_format($product->product_price, 2, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    
    @else
        <p>No Product found.</p>
    @endif

@endsection