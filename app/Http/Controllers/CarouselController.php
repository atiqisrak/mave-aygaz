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
            'title' => 'required|array',
            'title.en' => 'required|string',
            'title.bn' => 'required|string',
            'description' => 'required|array',
            'description.en' => 'required|string',
            'description.bn' => 'required|string',
            'slug' => 'nullable|string',
            'status' => 'nullable|integer',
        ]);

        $carousel = Carousel::create([
            'image' => $validatedData['image'],
            'title' => [
                'en' => $validatedData['title']['en'],
                'bn' => $validatedData['title']['bn'],
            ],
            'description' => [
                'en' => $validatedData['description']['en'],
                'bn' => $validatedData['description']['bn'],
            ],
            'slug' => $validatedData['slug'],
            'status' => $validatedData['status'] ?? 1,
        ]);

        return response()->json($carousel, 201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'image' => 'required|string',
            'title' => 'required|array',
            'title.en' => 'required|string',
            'title.bn' => 'required|string',
            'description' => 'required|array',
            'description.en' => 'required|string',
            'description.bn' => 'required|string',
            'slug' => 'nullable|string',
            'status' => 'nullable|integer',
        ]);

        $carousel = Carousel::findOrFail($id);
        $carousel->update([
            'image' => $validatedData['image'],
            'title' => [
                'en' => $validatedData['title']['en'],
                'bn' => $validatedData['title']['bn'],
            ],
            'description' => [
                'en' => $validatedData['description']['en'],
                'bn' => $validatedData['description']['bn'],
            ],
            'slug' => $validatedData['slug'],
            'status' => $validatedData['status'] ?? 1,
        ]);

        return response()->json($carousel, 200);
    }

    public function destroy($id)
    {
        $carousel = Carousel::findOrFail($id);
        $carousel->delete();
        return response()->json(null, 204);
    }
}
