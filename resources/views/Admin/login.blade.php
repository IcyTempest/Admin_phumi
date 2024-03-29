<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Login</title>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center">
        <div class="col-lg-3 col-md-9 col">
            <img class="" src="http://phumi.herokuapp.com/images/logo.jpeg" alt="logo" width="100%"
                style="margin: -100px 0;">
            <div class="card shadow">
                <div class="card-body">
                
                    <form action="{{ route('admin.authLogin') }}" method="post">
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
                        @csrf
                        <legend class="display-5 text-center ">Login</legend>
                        <div class="form-group mb-3">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username"  value="{{ old("username") }}">
                            <p style="color: red;">@error('username'){{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">password</label>
                            <input type="password" class="form-control " name="password" id="password">
                            <p style="color: red;">@error('password'){{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="company_code">Company Code</label>
                            <input type="password" name="company_code" id="company_code" class="form-control" aria-describedby="codeHelp">
                            <small id="codeHelp" class="text-muted">Please ask to your manager for company code!</small>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                    <hr>
                    <span>
                        New employee?
                        <a href="{{ route('admin.register') }}" class="text-decoration-none">Register here</a>
                    </span>
                </div>
            </div>
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