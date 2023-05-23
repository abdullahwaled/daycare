<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Timetable Entries') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Day</th>
                                <th scope="col">Start Time</th>
                                <th scope="col">End Time</th>
                                <th scope="col">Room</th>
                                <th scope="col">Teacher</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Class</th>
                                <th scope="col">Group</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($timetableEntries as $entry)
                                <tr>
                                    <td>{{ $entry->day }}</td>
                                    <td>{{ $entry->start_time }}</td>
                                    <td>{{ $entry->end_time }}</td>
                                    <td>{{ $entry->room }}</td>
                                    <td>{{ $entry->teacher }}</td>
                                    <td>{{ $entry->subject }}</td>
                                    <td>{{ $entry->class }}</td>
                                    <td>{{ $entry->group }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
