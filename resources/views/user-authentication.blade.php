<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>User Authentication</title>
</head>
<body>
    <h2>User Authentication</h2>
    @if (Auth::check())
        <p>Welcome, {{ Auth::user()->name }}!</p>
        <p>{{Auth::user()->name }}</p>
        <p>{{Auth::user()->email}}</p>
        <a href="{{route('user.logout')}}" class="btn btn-danger">Logout</a>
    @else
        <p>Please log in to access the dashboard.</p>
        <a href="{{route('user.loginform')}}" class="btn btn-info">Login</a>

    @endif
</body>
</html>
