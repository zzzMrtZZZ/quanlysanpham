<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'QuanLySanPham')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('thanh.css') }}">

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
  <div class="container">
    <a class="navbar-brand" href="{{ route('products.index') }}">🛒QuickMart</a>
    <div>
      @auth
        <span class="me-2">Xin chào, {{ auth()->user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}" class="d-inline">@csrf<button class="btn btn-sm btn-outline-secondary">Logout</button></form>
      @else
        <a href="{{ route('login') }}" class="btn btn-sm btn-primary">Login</a>
        <a href="{{ route('register') }}" class="btn btn-sm btn-success">Register</a>
      @endauth
    </div>
  </div>
</nav>
<div class="container">
    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
    @yield('content')
</div>
</body>
</html>
