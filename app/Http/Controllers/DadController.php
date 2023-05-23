<?php

namespace App\Http\Controllers;

use App\Models\Dad;
use App\Models\Daycare;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DadController extends Controller
{

 public function create()
{
    return view('backend.dad.add_dad');
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:dads',
        'password' => 'required|string|unique:dads',
        'image' => 'nullable|image',
        'phone_number' => 'nullable|string',
        'daycare_id' => 'required|exists:daycares,id',
    ]);

    $name          = $request->name;
    $email         = $request->email;
    $phone_number  = $request->phone_number;
    $password      = Hash::make($request->password);
    $daycare_id    = $request->daycare_id;
    $image = $request->file('image');

    if ($image) {
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;

        $upload_location = 'build/assets/img/';
        $image_path = $upload_location . $img_name;
        $image->move($upload_location, $img_name);
    } else {
        $image_path = null;
    }

    $dad = Dad::create([
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'daycare_id' => $daycare_id,
         'phone_number' =>$phone_number,
        'image' => $image_path,
    ]);


    return redirect()->route('dashboard')->with('success', 'dad added successfully.');
}

 public function index(Daycare $daycare)
{
        $daycareId = auth()->user()->daycare_id;
        $dads= Dad::where('daycare_id' , $daycareId)->get();

        return view('backend.dad.indexdad', [
            'dads' => $dads
        ]);
    }

public function edit($id)
{
    $dad = Dad::findOrFail($id);
    return view('backend.dad.editdad', compact('dad'));
}
public function update(Request $request, $id)
{
    // Validate the request data
    $validatedData = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:dads,email,'.$id,
        'password' => 'nullable|string|unique:dads,password,'.$id,
        'image' => 'nullable|image',
        'phone_number' => 'nullable|string',
        'daycare_id' => 'required|exists:daycares,id',
    ]);

    // Find the Dad
    $dad = Dad::findOrFail($id);

    // Update the Dad's properties
    $dad->name = $validatedData['name'];
    $dad->email = $validatedData['email'];
    if (!empty($validatedData['password'])) {
        $dad->password = bcrypt($validatedData['password']);
    }
    $dad->image = $validatedData['image'];
    $dad->phone_number = $validatedData['phone_number'];
    $dad->daycare_id = $validatedData['daycare_id'];
    $dad->save();

    // Redirect the user to a page showing the updated Dad or any other appropriate response
    return redirect()->route('dads.show', $dad->id)->with('success', 'Dad updated successfully');
}

public function show($id)
{
    $dad = Dad::findOrFail($id);
    return view('backend.dad.show', compact('dad'));
}
public function destroy($id)
{
    // Find the Dad with the specified ID
    $dad = Dad::findOrFail($id);

    // Delete the Dad
    $dad->delete();

    // Redirect the user to a page or any other appropriate response
    return redirect()->route('auth.dads.index')->with('success', 'Dad deleted successfully');
}

}



