<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>image list</title>
</head>
<body>
    <h1>Uploaded Images</h1>
    @if($images->isEmpty())
        <p>No images uploaded yet.</p>
    @else
        <ul>
            @foreach($images as $image)
                <li>
                    <form action="{{ route('image.delete', $image->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    <input type="hidden" name="image_id" value="{{ $image->id }}">
                    <p>{{ $image->file_name }}</p>
                    {{-- run :php artisan storage:link --}}
                    <img src="{{ asset('storage/' . $image->file_path) }}" alt="{{ $image->file_name }}" width="200">
                    <button>Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif  
</body>
</html>