<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <title>Components</title>
</head>
<body>

<div class="container mt-3">
    <h2>Alerts</h2>
    <x-alert type="danger" message="this is danger message" id="alert1" class="danger"/>
    <x-alert type="info" message="this is info message"/>
    <x-alert type="success" message="this is success message"/>
    <x-alert type="warning" message="this is warning message"/>
    <x-alert type="primary" message="this is primary message"/>
    <x-alert type="secondary" message="this is secondary message"/>
    <x-alert type="dark" message="this is dark message"/>
    <x-alert type="light" message="this is ligth message"/>
    <x-alert />


    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>