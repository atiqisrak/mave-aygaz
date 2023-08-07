<?php

namespace App\Http\Controllers;

use App\Models\BulkUploadedImage;
use Illuminate\Http\Request;
use App\Models\ImageLibrary;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class ImageLibraryController extends Controller
{
    public function index()
    {
        $imageLibraries = ImageLibrary::all();
        return response()->json($imageLibraries);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'status' => 'required|boolean',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $imagePath = $request->file('image')->store('image_library', 'public');

        ImageLibrary::create([
            'status' => $validatedData['status'],
            'image' => $imagePath,
        ]);

        return response()->json(['message' => 'Image uploaded successfully'], 201);
    }

    public function bulkUpload(Request $request)
    {
        $validatedData = $request->validate([
            'status' => 'required|boolean',
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $imagePaths = [];

        foreach ($validatedData['images'] as $image) {
            $imagePaths[] = $image->store('image_library', 'public');
        }

        foreach ($imagePaths as $imagePath) {
            ImageLibrary::create([
                'status' => $validatedData['status'],
                'image' => $imagePath,
            ]);
        }

        return response()->json(['message' => 'Bulk upload successful'], 201);
    }

    public function bulkDelete(Request $request)
    {
        $validatedData = $request->validate([
            'image_ids' => 'required|array',
            'image_ids.*' => 'required|integer',
        ]);

        $imageIds = $validatedData['image_ids'];

        // Retrieve the images from the bulk_uploaded_images table
        $images = BulkUploadedImage::whereIn('id', $imageIds)->get();

        // Delete the images from storage and the bulk_uploaded_images table
        foreach ($images as $image) {
            // Delete the image file from storage
            Storage::disk('public')->delete($image->image);

            // Delete the image entry from the bulk_uploaded_images table
            $image->delete();
        }

        return response()->json(['message' => 'Bulk deletion successful'], 200);
    }

    public function update(Request $request, $id)
    {
        $imageLibrary = ImageLibrary::findOrFail($id);

        try {
            $validatedData = $request->validate([
                'image' => 'required|string',
                'status' => 'required|boolean',
            ]);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        }

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
