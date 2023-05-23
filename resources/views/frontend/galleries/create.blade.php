<form action="{{ route('teacher.galleries.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="image">Image:</label>
    <input type="file" name="image" id="image">
    <br>
    <label for="daycare_id">Daycare ID:</label>
    <input type="number" name="daycare_id" id="daycare_id">
    <br>
    <button type="submit">Upload Image</button>
</form>
