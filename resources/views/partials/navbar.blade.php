<nav class="navbar">
    <a class="brand-logo" href="/"><img src="assets/image/Title Icon.jpeg" alt=""></a>
    <ul class="nav-link">
        <li><a href="/categories">Category</a></li>
        <li>
            <div class="search-bar">
                <input type="text" placeholder="Type here to search...">
                <button>Search</button>
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
                    <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-person-circle"></i> My Dashboard</a></li>
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