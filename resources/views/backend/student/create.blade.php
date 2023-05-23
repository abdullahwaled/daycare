<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('auth.students.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <label for="daycare_id">Daycare ID</label>
                            <input type="text" name="daycare_id" id="daycare_id" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="dad_id">Dad ID</label>
                            <input type="text" name="dad_id" id="dad_id" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="teacher_id">Teacher ID</label>
                            <input type="text" name="teacher_id" id="teacher_id" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="classroom_id">Classroom ID</label>
                            <input type="text" name="classroom_id" id="classroom_id" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Student</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
