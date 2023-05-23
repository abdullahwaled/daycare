<?php

namespace App\Http\Controllers;

namespace App\Models;

use App\Models\Dad;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Classroom;
use App\Models\Daycare;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{

   public function index(Daycare $daycare)
{
       $daycareId = auth()->user()->daycare_id;
        $students= Student::where('daycare_id' , $daycareId)->get();
    return view('backend.student.index', compact('students'));
}


   public function create()
{
    $daycares = Daycare::all();
    $dads = Dad::all();
    $teachers = Teacher::all();
    $classrooms = Classroom::all();

    return view('backend.student.create', compact('daycares', 'dads', 'teachers', 'classrooms'));
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'daycare_id' => 'required|exists:daycares,id',
        'dad_id' => 'required|exists:dads,id',
        'teacher_id' => 'required|exists:teachers,id',
        'classroom_id' => 'required|exists:classrooms,id',
    ]);

    $image_path = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $upload_location = 'build/assets/img/';
        $image_path = $upload_location . $img_name;
        $image->move($upload_location, $img_name);
    }

    $student =Student::create([
        'name' => $request->name,
        'image' => $image_path,
        'daycare_id' => $request->daycare_id,
        'dad_id' => $request->dad_id,
        'teacher_id' => $request->teacher_id,
        'classroom_id' => $request->classroom_id,
    ]);

    return redirect()->route('auth.students.show', $student->id)->with('success', 'Student created successfully');
}

public function update(Request $request, $id)
{
    // Validate the request data
    $validatedData = $request->validate([
        'name' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'daycare_id' => 'required|exists:daycares,id',
        'dad_id' => 'required|exists:dads,id',
        'teacher_id' => 'required|exists:teachers,id',
        'classroom_id' => 'required|exists:classrooms,id',
    ]);


    $student = Student::findOrFail($id);

    if ($request->hasFile('image')) {

        if ($student->image) {
            Storage::disk('public')->delete($student->image);
        }
        $imagePath = $request->file('image')->store('images', 'public');
        $validatedData['image'] = $imagePath;
    }

    $student->update($validatedData);

    return redirect()->route('students.show', $student->id)->with('success', 'Student updated successfully');
}

public function destroy($id)
{

    $student = Student::findOrFail($id);


    if ($student->image) {
        Storage::disk('public')->delete($student->image);
    }

    $student->delete();


    return redirect()->route('students.index')->with('success', 'Student deleted successfully');
}}
