<nav class="navbar">
    <a class="brand-logo" href="/"><img src="assets/image/Title Icon.jpeg" alt=""></a>
    <ul class="nav-link">
        <li><a href="#">Category</a></li>
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
                <a class="nav-link dropdown-toggle" href="/" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Welcome back, {{ auth('customer')->user()->customer_first_name }} 
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-person-circle"></i> My Profile</a></li>
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