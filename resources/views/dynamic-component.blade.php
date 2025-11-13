<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <title>Dynamic component</title>
</head>
<body>
    <h2>Dynamic Component</h2>
    @php
        $componentName = 'alert'; // This could be dynamic based on some condition
    @endphp

    <x-dynamic-component :component="$componentName" type="info"/>

</body>
</html>