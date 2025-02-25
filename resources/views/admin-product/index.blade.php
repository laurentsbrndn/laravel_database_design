@extends('admin-sidebar.index')

@section('container')

    <div class="content">

        <a href="/admin/productlist"><i class="bi bi-arrow-left-circle"></i></a><h2> Edit Product</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ url('admin/productlist/' . $products->product_slug . '/update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Category Name</label>
                <select name="category_name" class="form-control @error('category_name') is-invalid @enderror">
                    @foreach ($categories as $category)
                        <option value="{{ $category->category_name }}" 
                            {{ $products->category_name == $category->category_name ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
                @error('category_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
                        

            <div class="form-group">
                <label>Product Image</label>
                <input type="file" name="product_image" class="form-control">
                @if(auth('admin')->user()->product_image)
                    <img src="{{ asset('storage/product_photos/' . auth('admin')->user()->product_image) }}" alt="Product Image" width="100">
                @endif
            </div>
    
            <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror" value="{{ old('product_name', $products->product_name) }}">
                @error('product_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
    
            <div class="form-group">
                <label>Product Price</label>
                <input type="text" name="product_price" class="form-control @error('product_price') is-invalid @enderror" value="{{ old('product_price', $products->product_price) }}">
                @error('product_price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
    
            <div class="form-group">
                <label>Brand Name</label>
                <select name="brand_name" class="form-control @error('brand_name') is-invalid @enderror">
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->brand_name }}" 
                            {{ $products->brand_name == $brand->brand_name ? 'selected' : '' }}>
                            {{ $brand->brand_name }}
                        </option>
                    @endforeach
                </select>
                @error('brand_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>           
    
            <div class="form-group">
                <label>Product Description</label>
                <textarea name="product_description" class="form-control @error('product_description') is-invalid @enderror">{{ old('product_description', $products->product_description)}}</textarea>
                @error('product_description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Product Slug</label>
                <input type="text" name="product_slug" class="form-control @error('product_slug') is-invalid @enderror" value="{{ old('product_slug', $products->product_slug)}}">
                @error('product_slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Stock:</label>
                <div class="input-group mb-3" style="max-width: 200px;">
                    <button class="btn btn-outline-secondary" id="decrease-btn" type="button" onclick="decreaseQuantity()">-</button>
                    <input type="text" name="product_stock" id="product_stock" class="form-control text-center" value="{{ old('product_stock', $products->product_stock) }}">
                    <button class="btn btn-outline-secondary" id="increase-btn" type="button" onclick="increaseQuantity()">+</button>
                </div>
                <span class="text-muted">Stock: {{ $products->product_stock }}</span>
            </div>
            
    
            <button type="submit" class="btn btn-success">Save Changes</button>  
        </form> 
    </div>

@endsection