<h2>Teachers at</h2>
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button   type="submit" class="logout-button">Logout</button>
</form>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $teachers as $teacher )
            {{ $teacher->name }}
            {{ $teacher->email }}
            {{ $teacher->daycare_id }}

            @endforeach
        </tbody>
    </table>
<!-- resources/views/teachers/index.blade.php -->


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Teachers</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Daycare</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teachers as $teacher)
                            <tr>
                                <td>{{ $teacher->name }}</td>
                                <td>{{ $teacher->email }}</td>

                                <td>
                                    <a href="{{ route('auth.teachers.show', $teacher->id) }}" class="btn btn-sm btn-primary">View</a>
                                    <a href="{{ route('auth.teachers.edit', $teacher->id) }}" class="btn btn-sm btn-success">Edit</a>
                                    <form action="{{ route('auth.teachers.destroy', $teacher->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this teacher?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

