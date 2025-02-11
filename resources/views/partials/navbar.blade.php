<nav class="navbar">
    <a class="brand-logo" href="{{ url('/') }}"><img src="assets/image/Title Icon.jpeg" alt=""></a>
    <ul class="nav-links">
        <li><a href="#">Kategori</a></li>
        <li>
            <div class="search-bar">
                <input type="text" placeholder="Type here to search...">
                <button>Search</button>
            </div>
        </li>
        <li><a href="{{ url('/login') }}">Login</a></li>
    </ul>
</nav>