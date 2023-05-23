<?php

namespace App\Http\Controllers;

use App\Models\Daycare;
use App\Models\Timetable;
use Illuminate\Http\Request;

class DaycareController extends Controller
{
    /**
     * Show the form for creating a new daycare.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('daycare.create');
    }

    /**
     * Store a newly created daycare in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'location' => 'required|string',
            'phone_number' => 'required|string',
        ]);

        Daycare::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'location' => $request->input('location'),
            'phone_number' => $request->input('phone_number'),
        ]);

    return redirect()->back()->with('success', 'Daycare added successfully.');
    }

     public function createtimetable()
    {
        return view('backend.create');
    }

    public function storetimetable(Request $request)
    {
        $request->validate([
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'room' => 'required',
            'teacher' => 'required',
            'subject' => 'required',
            'class' => 'required',
            'group' => 'required',
            'daycare_id' => 'required|exists:daycares,id',
        ]);

        Timetable::create($request->all());

        return redirect()->route('timetable.index')->with('success', 'Timetable entry added successfully.');
    }
    public function indextimetable()
{
    $timetableEntries = Timetable::all();

    return view('backend.index', compact('timetableEntries'));
}

}
