<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return response()->json($sliders);
    }

    public function show($id)
    {
        $slider = Slider::findOrFail($id);
        return response()->json($slider);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'nullable|string',
            'media_ids' => 'required|array',
            'media_ids.*' => 'exists:media,id',
            'status' => 'boolean',
        ]);

        $slider = Slider::create([
            'title' => $validatedData['title'],
            'media_ids' => $validatedData['media_ids'],
            'status' => $validatedData['status'],
        ]);

        return response()->json($slider, 201);
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'nullable|string',
            'media_ids' => 'required|array',
            'media_ids.*' => 'exists:media,id',
            'status' => 'boolean',
        ]);

        $slider->update([
            'title' => $validatedData['title'],
            'media_ids' => $validatedData['media_ids'],
            'status' => $validatedData['status'],
        ]);

        return response()->json($slider);
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();
        return response()->json(['message' => 'Slider deleted successfully']);
    }
}
