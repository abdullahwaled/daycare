<div class="bg-light p-5 rounded">
    <h1>Add file</h1>

    <form action="{{ route('teacher.files.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-4">
          <input type="file" name="file" class="form-control" accept=".jpg,.jpeg,.bmp,.png,.gif,.doc,.docx,.csv,.rtf,.xlsx,.xls,.txt,.pdf,.zip">
        </div>
        <div class="form-group">
            <label for="daycare_id">Daycare ID</label>
            <input type="text" name="daycare_id" id="daycare_id" class="form-control" required>
        </div>
        <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Save</button>
    </form>

</div>
