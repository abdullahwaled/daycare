<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::all();
        return view('classrooms.index', compact('classrooms'));
    }

    public function create()
    {
        // Show the form to create a new classroom
        return view('classrooms.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required',
            'daycare_id' => 'required|exists:daycares,id',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        // Create a new classroom
        $classroom = new Classroom();
        $classroom->name = $validatedData['name'];
        $classroom->daycare_id = $validatedData['daycare_id'];
        $classroom->teacher_id = $validatedData['teacher_id'];
        $classroom->save();

        // Redirect the user to a page showing the created classroom or any other appropriate response
        return redirect()->route('dashboard', $classroom->id)->with('success', 'Classroom created successfully');
    }

    public function show($id)
    {
        $classroom = Classroom::findOrFail($id);
        return view('classrooms.show', compact('classroom'));
    }

    public function edit($id)
    {
        $classroom = Classroom::findOrFail($id);
        return view('classrooms.edit', compact('classroom'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required',
            'daycare_id' => 'required|exists:daycares,id',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        // Find the classroom
        $classroom = Classroom::findOrFail($id);

        // Update the classroom's properties
        $classroom->name = $validatedData['name'];
        $classroom->daycare_id = $validatedData['daycare_id'];
        $classroom->teacher_id = $validatedData['teacher_id'];
        $classroom->save();

        // Redirect the user to a page showing the updated classroom or any other appropriate response
        return redirect()->route('classrooms.show', $classroom->id)->with('success', 'Classroom updated successfully');
    }

    public function destroy($id)
    {
        $classroom = Classroom::findOrFail($id);
        $classroom->delete();

        // Redirect the user to a page or any other appropriate response
        return redirect()->route('classrooms.index')->with('success', 'Classroom deleted successfully');
    }
}
