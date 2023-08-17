<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\RedirectResponse;
use App\Models\Media;
use App\Models\Titlegen;

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
        $request->validate([
            'media' => 'required|image|mimes:jpeg,png,jpg,gif,svg,pdf,mp4,mkv|max:204800',
        ]);

        // Generate a title based on the original file name
        $originalName = $request->media->getClientOriginalName();
        $title = pathinfo($originalName, PATHINFO_FILENAME);
        $generatedTitle = "mave_aygaz_" . Str::random(6);

        // Rename the image
        $mediaName = $generatedTitle . '.' . $request->media->extension();

        // Move the uploaded file to the public/images directory
        $request->media->move(public_path('media'), $mediaName);

        // Save the new title and image path to the database
        $media = Media::create([
            'file_name' => $generatedTitle,
            'file_path' => 'media/' . $mediaName,
        ]);

        // return response()->json($media, 201);
        return redirect()->route('media.upload')->with('success', 'Media updated successfully. Media name: '.$mediaName)->with('media', $mediaName);
    }

    // update

    public function update(Request $request, $id)
    {
        $media = Media::findOrFail($id);
        $media->update($request->all());

        return response()->json($media, 200);

    }

    // destroy

    public function destroy($id)
    {
        $media = Media::findOrFail($id);
        $media->delete();

        return response()->json(['message' => 'Media deleted successfully']);
    }
}
