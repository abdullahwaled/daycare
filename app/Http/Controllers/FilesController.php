<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\StoreFileRequest;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::all();

        return view('backend.files.index', [
            'files' => $files
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.files.create');
    }


    public function store(Request $request)
    {
        $fileName = auth()->id() . '_' . time() . '.'. $request->file->extension();

        $type = $request->file->getClientMimeType();
        $size = $request->file->getSize();
         $daycare_id =$request->daycare_id;

        $request->file->move(public_path('file'), $fileName);

        File::create([
            'name' => $fileName,
            'type' => $type,
            'size' => $size,
            'daycare_id'=>$daycare_id,


        ]);

        return redirect()->route('teacher.files.index')->withSuccess(__('File added successfully.'));
    }
    public function show($filename)
{
    $file = File::where('name', $filename)->firstOrFail();
    $filePath = public_path('file/' . $filename);

    return response()->file($filePath, [
        'Content-Type' => $file->type,
        'Content-Length' => $file->size,
    ]);
}


}
