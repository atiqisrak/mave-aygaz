<?php

namespace App\Http\Controllers;

use App\Models\AboutPage;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    public function index()
{
    $aboutPages = AboutPage::all();
    return response()->json($aboutPages);
}

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'banner' => 'nullable|string',
            'description' => 'nullable|string',
            'card_id_array' => 'nullable|array',
            'title' => 'nullable|string',
            'card_id_array_2' => 'nullable|array',
            'status' => 'nullable|boolean',
        ]);

        $aboutPage = AboutPage::create($validatedData);

        return response()->json($aboutPage, 201);
    }

    public function update(Request $request, $id)
    {
        $aboutPage = AboutPage::findOrFail($id);

        $validatedData = $request->validate([
            'banner' => 'nullable|string',
            'description' => 'nullable|string',
            'card_id_array' => 'nullable|array',
            'title' => 'nullable|string',
            'card_id_array_2' => 'nullable|array',
            'status' => 'nullable|boolean',
        ]);

        $aboutPage->update($validatedData);

        return response()->json($aboutPage, 200);
    }
}
