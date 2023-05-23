<!-- Display galleries -->
@foreach ($galleries as $gallery)
<img src="{{ asset('assets/img/blog/' . $gallery->image) }}" style="width: 50px; height: 200px;">

    <form action="{{ route('teacher.galleries.destroy', $gallery->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endforeach

<!-- Add new gallery form -->
<a href="{{ route('teacher.galleries.create') }}">Add New Gallery</a>
