@extends ('admin-sidebar.index')

@section('container')

    <div class="content">
        <h2>Edit Product</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <ul class="nav-link">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="categoryDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Category
                </a>
                <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                    <li><a class="dropdown-item" href="/admin/productlist">All</a></li>
                    @foreach ($categories as $category)
                        <li><a class="dropdown-item" href="{{ url('admin/productlist/categories/' . $category->category_slug) }}">{{ $category->category_name }}</a></li>
                    @endforeach
                </ul>
            </li>
            
            <li>
                <div class="row">
                    <div class="col-md-20">
                        <form action="/admin/productlist" method="get">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Type here to search" name="search" value="{{ request('search') }}">
                                <button class="btn btn-danger" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </li>
        </ul>

        @if ($products->count())
            <div class="products-container">
                @foreach ($products as $product)
                    <div class="products-cover">
                        <div class="products-card">
                            <img src="{{ asset('storage/product_photos/' . $product->product_image) }}" class="card-img-top" alt="{{ $product->product_name }}">
                            <div class="card-body">
                                <h3 class="products-card-name">{{ $product->product_name }}</h3>
                                <p class="products-card-price">Rp{{ number_format($product->product_price, 2, ',', '.') }}</p>
                            </div>
                            <div class="card-body">
                                <a href="{{ url('/admin/productlist/' . $product->product_slug) }}">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    
        @else
            <p>No Product found.</p>
        @endif
    </div>

@endsection