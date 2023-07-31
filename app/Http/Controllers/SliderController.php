<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\SliderImage;
use Illuminate\Validation\ValidationException;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::with('images')->get();
        return response()->json($sliders);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'status' => 'required|boolean',
                'title' => 'nullable|string',
                'images' => 'required|array',
            ]);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        }

        $slider = Slider::create([
            'status' => $validatedData['status'],
            'title' => $validatedData['title'],
        ]);

        $images = $validatedData['images'];

        foreach ($images as $image) {
            $sliderImage = new SliderImage;
            $sliderImage->image = $image;
            $sliderImage->slider_id = $slider->id;

            $sliderImage->save();
        }

        return response()->json($slider, 201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required|boolean',
            'images.*' => 'required|string',
        ]);

        $slider = Slider::findOrFail($id);
        $slider->update([
            'status' => $validatedData['status'],
        ]);

        // Delete existing images
        $slider->images()->delete();

        // Add new images
        foreach ($validatedData['images'] as $image) {
            SliderImage::create([
                'slider_id' => $slider->id,
                'image' => $image,
            ]);
        }

        return response()->json($slider, 200);
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->images()->delete();
        $slider->delete();
        return response()->json(null, 204);
    }
}
