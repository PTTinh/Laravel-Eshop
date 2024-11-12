<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('lib/bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
</head>

<body>
    <div class="container mt-5">
        @include('include._error')
        <h2>Login</h2>
        <form action="{{ route("login.post") }}" method="POST">
            @csrf
            <x-app-input id="email" name="email" label="Email" placeholder="Nhập email" required />
            <x-app-input id="password" type="password" label="Password" placeholder="Nhập Mật Khẩu" required />
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
    <script src="{{ asset('lib/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
