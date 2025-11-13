<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Dashboard</title>
</head>
<body>
    <h2>User Authentication</h2>
    @if (Auth::check())
        <p>Welcome, {{ Auth::user()->name }}!</p>
        <p>{{Auth::user()->name }}</p>
        <p>{{Auth::user()->email}}</p>
        <form method="POST" action="{{ route('user.logout') }}">
            @csrf

            <button type="submit">Logout</button>
        </form>
    @else
        

    @endif
</body>
</html>
