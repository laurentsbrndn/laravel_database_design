<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daily Needs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/admin-sidebar.css">
    

<body>
    <div class="sidebar">
        <h4 class="text-center">Daily Needs</h4>
        <a href="/admin/myprofile">My Profile</a>
        <a href="/admin/productlist">Product List</a>
        <a href="/admin/transactions">Transactions</a>
        <form action="/admin/logout" method="post">
            @csrf
            <button type="submit" class="dropdown-item">Logout</button>
        </form>
    </div>

    @yield('container')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script> src="/js/admin-productstock.js"</script>
</body>
</html>
    
