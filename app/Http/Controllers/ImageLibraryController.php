<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageLibrary;

class ImageLibraryController extends Controller
{
    public function index()
    {
        $imageLibrary = ImageLibrary::all();
        return response()->json($imageLibrary);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|array',
            'title.en' => 'required|string',
            'title.bn' => 'required|string',
            'image' => 'required|string',
        ]);

        $imageLibrary = ImageLibrary::create($validatedData);
        return response()->json($imageLibrary, 201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|array',
            'title.en' => 'required|string',
            'title.bn' => 'required|string',
            'image' => 'required|string',
        ]);

        $imageLibrary = ImageLibrary::findOrFail($id);
        $imageLibrary->update($validatedData);
        return response()->json($imageLibrary, 200);
    }

    public function destroy($id)
    {
        $imageLibrary = ImageLibrary::findOrFail($id);
        $imageLibrary->delete();
        return response()->json(null, 204);
    }
}
