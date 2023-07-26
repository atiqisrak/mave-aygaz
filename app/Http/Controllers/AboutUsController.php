<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;

class AboutUsController extends Controller
{
    public function index(Request $request)
    {
        $language = $request->header('Accept-Language', 'en'); // Fallback to English if no language specified
        $aboutUs = AboutUs::select(['id', "title->$language as title", "description->$language as description", "cta_button_text->$language as cta_button_text", "cta_button_url->$language as cta_button_url", "image"])
            ->first();

        return response()->json($aboutUs);
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
            'cta_button_text' => 'required|array',
            'cta_button_text.en' => 'required|string',
            'cta_button_text.bn' => 'required|string',
            'cta_button_url' => 'required|array',
            'cta_button_url.en' => 'required|string',
            'cta_button_url.bn' => 'required|string',
            'image' => 'required|string',
        ]);

        $aboutUs = new AboutUs;
        $aboutUs->title = [
            'en' => $validatedData['title']['en'],
            'bn' => $validatedData['title']['bn'],
        ];
        $aboutUs->description = [
            'en' => $validatedData['description']['en'],
            'bn' => $validatedData['description']['bn'],
        ];
        $aboutUs->cta_button_text = [
            'en' => $validatedData['cta_button_text']['en'],
            'bn' => $validatedData['cta_button_text']['bn'],
        ];
        $aboutUs->cta_button_url = [
            'en' => $validatedData['cta_button_url']['en'],
            'bn' => $validatedData['cta_button_url']['bn'],
        ];
        $aboutUs->image = $validatedData['image'];
        $aboutUs->save();

        return response()->json($aboutUs, 201);
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
            'cta_button_text' => 'required|array',
            'cta_button_text.en' => 'required|string',
            'cta_button_text.bn' => 'required|string',
            'cta_button_url' => 'required|array',
            'cta_button_url.en' => 'required|string',
            'cta_button_url.bn' => 'required|string',
            'image' => 'required|string',
        ]);

        $aboutUs = AboutUs::findOrFail($id);
        $aboutUs->title = [
            'en' => $validatedData['title']['en'],
            'bn' => $validatedData['title']['bn'],
        ];
        $aboutUs->description = [
            'en' => $validatedData['description']['en'],
            'bn' => $validatedData['description']['bn'],
        ];
        $aboutUs->cta_button_text = [
            'en' => $validatedData['cta_button_text']['en'],
            'bn' => $validatedData['cta_button_text']['bn'],
        ];
        $aboutUs->cta_button_url = [
            'en' => $validatedData['cta_button_url']['en'],
            'bn' => $validatedData['cta_button_url']['bn'],
        ];
        $aboutUs->image = $validatedData['image'];
        $aboutUs->save();

        return response()->json($aboutUs, 200);
    }

    public function destroy($id)
    {
        $aboutUs = AboutUs::findOrFail($id);
        $aboutUs->delete();
        return response()->json(null, 204);
    }
}
