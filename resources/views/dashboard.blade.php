<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <div class="my-4">
        <a href="{{ route('auth.teachers.index1', ['daycare_id' => auth()->user()->daycare_id]) }}" class="button">View Teachers</a>
        <a href="{{ route('auth.createTeacher') }}" class="button">Add Teachers</a>

        <br>

        <a href="{{ route('auth.dads.index', ['daycare_id' => auth()->user()->daycare_id]) }}" class="button">View Dads</a>
        <a href="{{ route('auth.dads.create') }}" class="button">Add Dad</a>

        <br>

        <a href="{{ route('auth.students.index', ['daycare_id' => auth()->user()->daycare_id]) }}" class="button">View Students</a>
        <a href="{{ route('auth.students.create') }}" class="button">Add Student</a>



    </div>
    <br>
    <br>
    <br>
    <a href="{{ route('auth.timetable.create') }}" class="button">Add timetable</a>
<br>
<br>
<br>
<br>
<br>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add New Classroom') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('auth.classroom.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="daycare_id" class="col-md-4 col-form-label text-md-right">{{ __('Daycare ID') }}</label>

                                <div class="col-md-6">
                                    <input id="daycare_id" type="text" class="form-control @error('daycare_id') is-invalid @enderror" name="daycare_id" value="{{ old('daycare_id') }}" required>

                                    @error('daycare_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="teacher_id" class="col-md-4 col-form-label text-md-right">{{ __('Teacher ID') }}</label>

                                <div class="col-md-6">
                                    <input id="teacher_id" type="text" class="form-control @error('teacher_id') is-invalid @enderror" name="teacher_id" value="{{ old('teacher_id') }}" required>

                                    @error('teacher_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add Classroom') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
