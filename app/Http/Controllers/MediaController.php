<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\RedirectResponse;
use App\Models\Media;
use App\Models\Titlegen;
// mimetype


class MediaController extends Controller
{
    //index

    public function index()
    {
        $media = Media::all();
        return response()->json($media);
    }

    // show

    public function show($id)
    {
        $media = Media::findOrFail($id);
        return response()->json($media);
    }

    public function showMediaUploadForm()
{
    $media = Media::all(); // Retrieve all media to display

    return view('mediaUpload', compact('media'));
}

    // store
    public function store(Request $request)
{
    if ($request->method() !== 'POST') {
        return redirect()->back();
    }

    if (! $request->hasFile('media')) {
        return redirect()->back()->with('error', 'Please select at least one file to upload.');
    }
    // dd($request->file('media'));
    $mediaPaths = [];

    foreach ($request->file('media') as $file) {
        // $validatedData = $request->validate([
        //     'media.*' => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf,mp4,mkv|max:204800',
        // ]);
    
        // Generate a title based on the original file name
        $originalName = $file->getClientOriginalName();
        $title = pathinfo($originalName, PATHINFO_FILENAME);
        $generatedTitle = "mave_aygaz_" . Str::random(6);
    
        // Rename the media
        $mediaName = $generatedTitle . '.' . $file->extension();
    
        // Move the uploaded file to the public/media directory
        $file->move(public_path('media'), $mediaName);
    
        // Save the new title and media path to the database
        $media = Media::create([
            'file_name' => $generatedTitle,
            'file_type' => $file->getClientMimeType(),
            'file_path' => 'media/' . $mediaName,
        ]);
    
        // Add the media path to the mediaPaths array
        $mediaPaths[] = $mediaName;
    }
    

    // Store the media paths in the session
    \Session::put('media', $mediaPaths);

    return redirect()->route('media.upload')->with('success', 'Media updated successfully. Media names: ' . implode(', ', $mediaPaths));
}



    // update

    public function update(Request $request, $id)
    {
        $media = Media::findOrFail($id);
        $media->update($request->all());

        return response()->json($media, 200);

    }

    // delete

    public function destroy($id)
    {
        $media = Media::findOrFail($id);
        $media->delete();

        return response()->json(['message' => 'Media deleted successfully']);
    }
}
