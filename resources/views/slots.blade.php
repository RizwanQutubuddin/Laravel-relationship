<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <title>Slot Components</title>
</head>
<body>

<div class="container mt-3">
    <h2>Slot</h2>
    <x-slt type="danger" :dismissible="true">
        <x-slot:title class="font-bold">
            Heading goes here!
        </x-slot>
        <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quam ex voluptatem, magni repellendus culpa placeat quidem sint fuga ullam temporibus, aperiam blanditiis ut, repellat laudantium iste odit et similique nam.
            {{$component->link("Just Testing", "https://www.w3school.com")}}
        </p>
    </x-slt>  

    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>