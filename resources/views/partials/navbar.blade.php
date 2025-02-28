<nav class="navbar">
    <a class="brand-logo" href="/"><img src="assets/image/Title Icon.jpeg" alt=""></a>
    <ul class="nav-link">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="categoryDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Categories
            </a>
            <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                <li><a class="dropdown-item" href="/">All</a></li>
                @foreach ($categories as $category)
                    <li><a class="dropdown-item" href="{{ url('/?category=' . $category->category_slug) }}">{{ $category->category_name }}</a></li>
                @endforeach
            </ul>
        </li>        
        <li>
            <div class="row">
                <div class="col-md-20">
                    <form action="/" method="get">
                        @if(request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Type here to search" name="search" value="{{ request('search') }}">
                            <button class="btn btn-danger" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </li>
    </ul>

    <ul>
        @auth('customer')
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="/" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @if(auth('customer')->user()->customer_photo)
                        <img src="{{ asset('storage/customer_photos/' . auth('customer')->user()->customer_photo) }}" 
                             alt="Profile" class="rounded-circle me-2" width="30" height="30">
                    @endif
                    Welcome back, {{ auth('customer')->user()->customer_first_name }} 
                    
                </a>
                
                
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/dashboard/myprofile"><i class="bi bi-person-circle"></i> My Dashboard</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="bi bi-box-arrow-right"></i> 
                                     Logout
                            </button>
                        </form>                        
                    </li>
                </ul>
            </li>
        @else
            <li class="nav-links">
                <li>
                    <a href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                </li>
            </li>
        @endauth
    </ul>
</nav>