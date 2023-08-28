<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AutogasPage;

class AutogasPageController extends Controller
{
    public function index()
    {
        $autogasPage = AutogasPage::all();

        return response()->json($autogasPage, 200);
    }

    public function store(Request $request)
    {
        try {
        $validatedData = $request->validate([
            'title_en' => 'required|string',
            'title_bn' => 'required|string',
            'media_id' => 'required|integer|exists:media,id',
            'title2_en' => 'required|string',
            'title2_bn' => 'required|string',
            'description_en' => 'required|string',
            'description_bn' => 'required|string',
            'title3_en' => 'required|string',
            'title3_bn' => 'required|string',
            'cards_id' => 'required|array',
            // 'cards_id.*' => 'integer|exists:cards,id',
            'title4_en' => 'required|string',
            'title4_bn' => 'required|string',
            'cards2_id' => 'required|array',
            // 'cards2_id.*' => 'integer|exists:cards,id',
            'title5_en' => 'required|string',
            'title5_bn' => 'required|string',
            'cards3_id' => 'required|array',
            // 'cards3_id.*' => 'integer|exists:cards,id',
            'status' => 'required|boolean',
        ]);

        $validatedData['cards_id'] = json_encode($validatedData['cards_id']);
        $validatedData['cards2_id'] = json_encode($validatedData['cards2_id']);
        $validatedData['cards3_id'] = json_encode($validatedData['cards3_id']);

        $autogasPage = AutogasPage::create($validatedData);

        return response()->json($autogasPage, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'title_en' => 'required|string',
                'title_bn' => 'required|string',
                'media_id' => 'required|integer|exists:media,id',
                'title2_en' => 'required|string',
                'title2_bn' => 'required|string',
                'description_en' => 'required|string',
                'description_bn' => 'required|string',
                'title3_en' => 'required|string',
                'title3_bn' => 'required|string',
                'cards_id' => 'required|array',
                // 'cards_id.*' => 'integer|exists:cards,id',
                'title4_en' => 'required|string',
                'title4_bn' => 'required|string',
                'cards2_id' => 'required|array',
                // 'cards2_id.*' => 'integer|exists:cards,id',
                'title5_en' => 'required|string',
                'title5_bn' => 'required|string',
                'cards3_id' => 'required|array',
                // 'cards3_id.*' => 'integer|exists:cards,id',
                'status' => 'required|boolean',
        ]);

        $validatedData['cards_id'] = json_encode($validatedData['cards_id']);
        $validatedData['cards2_id'] = json_encode($validatedData['cards2_id']);
        $validatedData['cards3_id'] = json_encode($validatedData['cards3_id']);

        $autogasPage = AutogasPage::findOrFail($id);
        $autogasPage->update($validatedData);

        return response()->json($autogasPage, 200);

        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        $autogasPage = AutogasPage::findOrFail($id);
        $autogasPage->cards()->detach();
        $autogasPage->cards2()->detach();
        $autogasPage->cards3()->detach();
        $autogasPage->delete();

        return response()->json(['message' => 'Autogas page deleted'], 200);
    }
}
