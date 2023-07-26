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
            'title' => 'required|array',
            'title.en' => 'required|string',
            'title.bn' => 'required|string',
            'description' => 'required|array',
            'description.en' => 'required|string',
            'description.bn' => 'required|string',
            'video_url' => 'required|string',
        ]);

        $video = Video::create($validatedData);
        return response()->json($video, 201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|array',
            'title.en' => 'required|string',
            'title.bn' => 'required|string',
            'description' => 'required|array',
            'description.en' => 'required|string',
            'description.bn' => 'required|string',
            'video_url' => 'required|string',
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
