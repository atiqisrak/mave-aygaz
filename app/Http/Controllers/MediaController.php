<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    // public function index()
    // {
    //     $media = Media::all();
    //     return response()->json($media);
    // }
    public function index()
{
    $media = Media::with('media')->get();
    return response()->json($media);
}


    public function store(Request $request)
    {
        $maxFileSize = env('MAX_FILE_SIZE', 1024000);

        $validatedData = $request->validate([
            'file' => 'required|file|mimes:jpeg,png,jpg,gif,mp4,pdf|max:'.config('medialibrary.max_file_size'),
        ]);

        // $file = $validatedData['file'];
        // $extension = $file->getClientOriginalExtension();
        // $randomCharacters = Str::random(5);
        // $filename = "mave_aygaz_" . $randomCharacters . "." . $extension;

        // $url = $file->storeAs('media', $filename, 'public');

        // $media = Media::create([
        //     'filename' => $filename,
        //     'mime_type' => $file->getMimeType(),
        //     'url' => $url,
        // ]);
        $media = Media::create([]);

        $media->addMedia($validatedData['file'])
            ->toMediaCollection('uploads');
        return response()->json($media, 201);
    }

    public function update(Request $request, $id)
    {
        $media = Media::findOrFail($id);

        $validatedData = $request->validate([
            'file' => 'nullable|file|mimes:jpeg,png,jpg,gif,mp4,pdf',
        ]);

        // if ($request->hasFile('file')) {
        //     $file = $validatedData['file'];
        //     $extension = $file->getClientOriginalExtension();
        //     $randomCharacters = Str::random(5);
        //     $filename = "mave_aygaz_" . $randomCharacters . "." . $extension;

        //     $url = $file->storeAs('media', $filename, 'public');
            
        //     $media->update([
        //         'filename' => $filename,
        //         'mime_type' => $file->getMimeType(),
        //         'url' => $url,
        //     ]);
        // }
        if ($request->hasFile('file')) {
            $media->addMedia($validatedData['file'])
                ->toMediaCollection('uploads');
        }

        return response()->json($media);
    }

    public function destroy($id)
    {
        $media = Media::findOrFail($id);
        $media->delete();
        return response()->json(['message' => 'Media file deleted successfully']);
    }
}
