<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;

class AboutUsController extends Controller
{
    public function index(Request $request)
    {
        $language = $request->header('accept-language', 'en');

        $aboutUs = AboutUs::select([
            'id',
            "title_" . $language . " as title",
            "description_" . $language . " as description",
            "cta_button_text_" . $language . " as cta_button_text",
            "cta_button_url_" . $language . " as cta_button_url",
            'image'
        ])->first();

        return response()->json($aboutUs);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title_en' => 'required|string',
            'title_bn' => 'nullable|string',
            'description_en' => 'required|string',
            'description_bn' => 'nullable|string',
            'cta_button_text_en' => 'required|string',
            'cta_button_text_bn' => 'nullable|string',
            'cta_button_url_en' => 'required|string',
            'cta_button_url_bn' => 'nullable|string',
            'image' => 'required|string',
        ]);

        $aboutUs = AboutUs::create([
            'title_en' => $validatedData['title_en'],
            'title_bn' => $validatedData['title_bn'],
            'description_en' => $validatedData['description_en'],
            'description_bn' => $validatedData['description_bn'],
            'cta_button_text_en' => $validatedData['cta_button_text_en'],
            'cta_button_text_bn' => $validatedData['cta_button_text_bn'],
            'cta_button_url_en' => $validatedData['cta_button_url_en'],
            'cta_button_url_bn' => $validatedData['cta_button_url_bn'],
            'image' => $validatedData['image'],
        ]);

        return response()->json($aboutUs, 201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title_en' => 'required|string',
            'title_bn' => 'nullable|string',
            'description_en' => 'required|string',
            'description_bn' => 'nullable|string',
            'cta_button_text_en' => 'required|string',
            'cta_button_text_bn' => 'nullable|string',
            'cta_button_url_en' => 'required|string',
            'cta_button_url_bn' => 'nullable|string',
            'image' => 'required|string',
        ]);

        $aboutUs = AboutUs::findOrFail($id);
        $aboutUs->update([
            'title_en' => $validatedData['title_en'],
            'title_bn' => $validatedData['title_bn'],
            'description_en' => $validatedData['description_en'],
            'description_bn' => $validatedData['description_bn'],
            'cta_button_text_en' => $validatedData['cta_button_text_en'],
            'cta_button_text_bn' => $validatedData['cta_button_text_bn'],
            'cta_button_url_en' => $validatedData['cta_button_url_en'],
            'cta_button_url_bn' => $validatedData['cta_button_url_bn'],
            'image' => $validatedData['image'],
        ]);

        return response()->json($aboutUs, 200);
    }

    public function destroy($id)
    {
        $aboutUs = AboutUs::findOrFail($id);
        $aboutUs->delete();
        return response()->json(null, 204);
    }
}
