<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel;

class CarouselController extends Controller
{
    public function index()
    {
        $carousels = Carousel::all();
        return response()->json($carousels);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|string',
            'heading' => 'required|array',
            'heading.en' => 'required|string',
            'heading.bn' => 'required|string',
            'text' => 'required|array',
            'text.en' => 'required|string',
            'text.bn' => 'required|string',
        ]);

        $carousel = Carousel::create($validatedData);
        return response()->json($carousel, 201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'image' => 'required|string',
            'heading' => 'required|array',
            'heading.en' => 'required|string',
            'heading.bn' => 'required|string',
            'text' => 'required|array',
            'text.en' => 'required|string',
            'text.bn' => 'required|string',
        ]);

        $carousel = Carousel::findOrFail($id);
        $carousel->update($validatedData);
        return response()->json($carousel, 200);
    }

    public function destroy($id)
    {
        $carousel = Carousel::findOrFail($id);
        $carousel->delete();
        return response()->json(null, 204);
    }
}
