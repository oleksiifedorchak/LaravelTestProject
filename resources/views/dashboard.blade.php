<!DOCTYPE html>
<html>
<head>
    <title>Custom Auth in Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
    <div class="container">
        <a class="navbar-brand mr-auto" href="#">{{ $heading_title }}</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('signout') }}">Logout</a>
                </li>
            </ul>
    </div>
</nav>
<form method="POST" action="{{ route('search') }}">
    @csrf
    <div class="form-group mb-3">
        <input type="text" placeholder="search" id="search" class="form-control" value="{{ $search }}" name="search" autofocus>
    </div>
    <div class="d-grid mx-auto">
        <button type="submit" class="btn btn-dark btn-block">Search</button>
    </div>
    <p></p>
</form>
<ul>
@foreach ($countries as $country)
    <li>{{ $country->name }}</li>
@endforeach
</ul>

</body>
</html>
