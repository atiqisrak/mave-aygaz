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

    public function indexView()
    {
        $sliders = Slider::all();
        $sliders = Slider::orderBy('created_at', 'desc')->get();
        return view('sliderView', compact('sliders'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title_en' => 'nullable|string',
            'title_bn' => 'nullable|string',
            'media_ids' => 'required|array|exists:media,id',
            'status' => 'boolean',
        ]);

        $slider = Slider::create($validatedData);
        $slider->media()->attach($validatedData['media_ids']);

        return response()->json($slider, 201);
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        $validatedData = $request->validate([
            'title_en' => 'nullable|string',
            'title_bn' => 'nullable|string',
            'media_ids' => 'required|array|exists:media,id',
            'status' => 'boolean',
        ]);

        $slider = Slider::findOrFail($id);
        $slider->update($validatedData);
        $slider->media()->sync([$validatedData['media_ids']]); // Sync to update the media relationship

        return response()->json($slider, 200);
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->media()->detach(); // Detach media relationships before deleting the Slider
        $slider->delete();
        return response()->json(['message' => 'Slider deleted successfully']);
    }
}
