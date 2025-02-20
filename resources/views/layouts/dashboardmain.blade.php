<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Needs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        
        .sidebar {
            height: 100vh;
            width: 250px;
            background-color: #343a40;
            color: white;
            position: fixed;
            padding-top: 20px;
        }
        
        .sidebar a {
            padding: 10px 15px;
            display: block;
            color: white;
            text-decoration: none;
        }

        .sidebar form {
            padding: 10px 15px;
            display: block;
            color: white;
            text-decoration: none;
        }
        
        .sidebar a:hover {
            background-color: #495057;
        }

        .sidebar form:hover {
            background-color: #495057;
        }
        
        .content {
            margin-left: 260px;
            padding: 20px;
        }
        
        .navbar {
            background-color: #343a40;
        }
    </style>
<body>
    <div>
        @include('sidebar.index')
    </div>
    
    <div>
        @yield('container')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
