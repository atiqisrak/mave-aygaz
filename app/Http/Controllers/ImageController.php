<?php
  
namespace App\Http\Controllers;
  
use Illuminate\View\View;
use App\Models\Image;
use App\Models\Titlegen;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
// str
use Illuminate\Support\Str;
  
class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return response()->json($images);
    }

    public function show($id)
    {
        $image = Image::findOrFail($id);
        return response()->json($image);
    }

    public function showImageUploadForm()
{
    $images = Image::all(); // Retrieve all images to display
    
    return view('imageUpload', compact('images'));
}

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Generate a title based on the original file name
        $originalName = $request->image->getClientOriginalName();
        $title = pathinfo($originalName, PATHINFO_FILENAME);
        $generatedTitle = "mave_aygaz_" . Str::random(6);

        // Rename the image
        $imageName = $generatedTitle . '.' . $request->image->extension();

        // Move the uploaded file to the public/images directory
        $request->image->move(public_path('images'), $imageName);

        // Save the new title and image path to the database
        $image = Image::create([
            'title' => $generatedTitle,
            'image_path' => 'images/' . $imageName,
        ]);

        // return response()->json($image, 201);
        return redirect()->route('image.upload')->with('success', 'Image updated successfully. Image name: '.$imageName)->with('image', $imageName);

    }

    public function update(Request $request, $id)
    {
        $image = Image::findOrFail($id);

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Generate a title based on the original file name
            $originalName = $request->image->getClientOriginalName();
            $title = pathinfo($originalName, PATHINFO_FILENAME);
            $generatedTitle = "mave_aygaz_" . Str::random(6) . '_' . $title;

            // Rename the image
            $imageName = $generatedTitle . '.' . $request->image->extension();

            // Move the uploaded file to the public/images directory
            $request->image->move(public_path('images'), $imageName);

            // Update the image path and title
            $image->update([
                'title' => $generatedTitle,
                'image_path' => 'images/' . $imageName,
            ]);
        }
        return redirect()->route('image.upload')->with('success', 'Image updated successfully')->with('image', $imageName);
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        $image->delete();
        return response()->json(['message' => 'Image deleted successfully']);
    }
}