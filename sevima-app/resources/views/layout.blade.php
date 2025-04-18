<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('header')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .sidebar {
      height: 100vh;
      background-color: #fff;
      border-right: 1px solid #dee2e6;
      padding: 20px;
      position: fixed;
      width: 250px;
    }

    .sidebar .nav-link {
      color: #333;
      font-weight: 500;
    }

    .sidebar .nav-link.active {
      color: #0d6efd;
    }

    .content {
      margin-left: 260px;
      padding: 40px;
    }

    .profile-pic {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      object-fit: cover;
    }
  </style>

    <title>Homepage</title>
</head>
<body>
    <div class="sidebar d-flex flex-column" >
        @yield('sidebar')
    </div>
    
    <div class="content">
        @yield('content')
    </div>
    
</body>
</html>