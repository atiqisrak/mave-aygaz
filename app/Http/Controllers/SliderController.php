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

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|array',
            'title.en' => 'required|string',
            'title.bn' => 'required|string',
            'description' => 'required|array',
            'description.en' => 'required|string',
            'description.bn' => 'required|string',
            'image' => 'required|string',
        ]);

        $slider = Slider::create($validatedData);
        return response()->json($slider, 201);
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
            'image' => 'required|string',
        ]);

        $slider = Slider::findOrFail($id);
        $slider->update($validatedData);
        return response()->json($slider, 200);
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();
        return response()->json(null, 204);
    }
}
