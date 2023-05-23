<h2>dad at</h2>
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
            @foreach ( $dads as $dad )
            {{ $dad->name }}
            {{ $dad->email }}
            {{ $dad->daycare_id }}

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
                        @foreach ($dads as $dad)
                            <tr>
                                <td>{{ $dad->name }}</td>
                                <td>{{ $dad->email }}</td>

                                <td>
                                    <a href="{{ route('auth.dads.show', $dad->id) }}" class="btn btn-sm btn-primary">View</a>
                                    <a href="{{ route('auth.dads.edit', $dad->id) }}" class="btn btn-sm btn-success">Edit</a>
                                    <form action="{{ route('auth.dads.destroy', $dad->id) }}" method="POST" class="d-inline">
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

