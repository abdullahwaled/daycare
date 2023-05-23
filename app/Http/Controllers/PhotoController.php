<?php

namespace App\Http\Controllers;
use App\Models\Gallery;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
     public function index()
    {
        $galleries = Gallery::all();
        return view('frontend.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('frontend.galleries.create');
    }
    public function store(Request $request)
    {
          $validatedData = $request->validate([
        'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
         'daycare_id' => 'required|exists:daycares,id',

    ]);
    $daycare_id = $request->daycare_id;
$imageFile = $request->file('image');
$name_gen = hexdec(uniqid());
$img_ext = strtolower($imageFile->getClientOriginalExtension());
$img_name = $name_gen . '.' . $img_ext;

$upload_location = 'assets/img/blog/';
$imageFile->move($upload_location, $img_name);

$gallery = Gallery::create([
    'image' => $img_name,
    'daycare_id' => $daycare_id,
]);

return redirect()->route('teacher.galleries.index')->withSuccess('Image added successfully.');

}  public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $imagePath = public_path('images/' . $gallery->image);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $gallery->delete();

        return redirect()->route('teacher.galleries.index')->withSuccess('Image deleted successfully.');
    }
    }

