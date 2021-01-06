<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
    <title>@yield('title')</title>
</head>
<body style="background-color: rgb(238, 238, 238);">
    <div class="container">
        <div class="jumbotron bg-light mt-4 p-4 rounded-1">
            <h1 class="display-4 text-center">Phumi Administrator</h1>
            <p class="lead text-center">Admin username</p>
            <hr class="my-4">

            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
                <div class="container-fluid">
                    <a class="navbar-brand">Phumi Admin</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link @yield('actived')" aria-current="page" href="{{ route('admin.index') }}">All Users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @yield('report_active')" aria-current="page" href="{{ route('admin.report') }}">All Reports</a>
                            </li>
                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                                <li class="nav-item">
                                <button type="submit" class="nav-link btn btn-danger">Logout</button>
                                </li>
                            </form>
                            
                        </ul>
                        <form action="{{ route('admin.search') }}" method="GET" class="d-flex" style="flex:1; margin-left:10px;">
                            <input class="form-control me-2" type="search" placeholder="Search For User"
                                aria-label="Search For User" name="search_data">
                            <button class="btn btn-outline-light" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            
            @if(session()->has('fail'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('fail') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @yield('home')
            @yield('all_post')
            @yield('detail')
            @yield('report')
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
        crossorigin="anonymous"></script>
</body>
</html>