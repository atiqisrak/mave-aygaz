<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        return response()->json($videos);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'nullable|string',
            'video_url' => 'required|string',
            'video_thumbnail' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        $video = Video::create($validatedData);
        return response()->json($video, 201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'nullable|string',
            'video_url' => 'required|string',
            'video_thumbnail' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        $video = Video::findOrFail($id);
        $video->update($validatedData);
        return response()->json($video, 200);
    }

    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();
        return response()->json(null, 204);
    }
}
