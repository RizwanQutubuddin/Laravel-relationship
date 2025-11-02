<div>
    @if (session('success'))
        <div>{{ session('success') }} {{ session('file') }}</div>
    @endif
    @error('file')
        <div>{{ $message }}</div>
    @enderror
    
    <form action="{{route('image.upload')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="image">Choose image to upload:</label>
        <input type="file" id="image" name="image" required>
        <button type="submit">Upload File</button>
    </form>

    <a href="{{route('image.list')}}">View Uploaded Images</a>
</div>
