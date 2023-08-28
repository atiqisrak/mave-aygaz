<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BulkGasPage;

class BulkGasPageController extends Controller
{
    public function index()
    {
        $bulkGasPages = BulkGasPage::all();
        return response()->json($bulkGasPages, 200);
    }

    public function store(Request $request)
    {
        try {
        $validatedData = $request->validate([
            'title_en' => 'required|string',
            'title_bn' => 'required|string',
            'media_id' => 'required|integer|exists:media,id',
            'tabs' => 'required|array',
            // 'tabs.*.id' => 'required|integer',
            // 'tabs.*.title_en' => 'required|string',
            // 'tabs.*.title_bn' => 'required|string',
            'title2_en' => 'required|string',
            'title2_bn' => 'required|string',
            'description_en' => 'required|string',
            'description_bn' => 'required|string',
            'cards_id' => 'required|array',
            // 'cards_id.*' => 'integer|exists:cards,id',
            'cards2_id' => 'required|array',
            // 'cards2_id.*' => 'integer|exists:cards,id',
            'cards3_id' => 'required|array',
            // 'cards3_id.*' => 'integer|exists:cards,id',
            'title3_en' => 'required|string',
            'title3_bn' => 'required|string',
            'cards4_id' => 'required|array',
            // 'cards4_id.*' => 'integer|exists:cards,id',
            'status' => 'required|boolean',
        ]);
        
        $validatedData['tabs'] = json_encode($validatedData['tabs']);
        $validatedData['cards_id'] = json_encode($validatedData['cards_id']);
        $validatedData['cards2_id'] = json_encode($validatedData['cards2_id']);
        $validatedData['cards3_id'] = json_encode($validatedData['cards3_id']);
        $validatedData['cards4_id'] = json_encode($validatedData['cards4_id']);

        $bulkGasPage = BulkGasPage::create($validatedData);

        return response()->json($bulkGasPage, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        $bulkGasPage = BulkGasPage::findOrFail($id);
        return response()->json($bulkGasPage, 200);
    }

    public function update(Request $request, $id)
    {
        $bulkGasPage = BulkGasPage::findOrFail($id);

        $validatedData = $request->validate([
            'title_en' => 'required|string',
            'title_bn' => 'required|string',
            'media_id' => 'required|integer|exists:media,id',
            'tabs' => 'required|array',
            // 'tabs.*.id' => 'required|integer',
            // 'tabs.*.title_en' => 'required|string',
            // 'tabs.*.title_bn' => 'required|string',
            'title2_en' => 'required|string',
            'title2_bn' => 'required|string',
            'description_en' => 'required|string',
            'description_bn' => 'required|string',
            'cards_id' => 'required|array',
            // 'cards_id.*' => 'integer|exists:cards,id',
            'cards2_id' => 'required|array',
            // 'cards2_id.*' => 'integer|exists:cards,id',
            'cards3_id' => 'required|array',
            // 'cards3_id.*' => 'integer|exists:cards,id',
            'title3_en' => 'required|string',
            'title3_bn' => 'required|string',
            'cards4_id' => 'required|array',
            // 'cards4_id.*' => 'integer|exists:cards,id',
            'status' => 'required|boolean',
        ]);
        
        $validatedData['tabs'] = json_encode($validatedData['tabs']);
        $validatedData['cards_id'] = json_encode($validatedData['cards_id']);
        $validatedData['cards2_id'] = json_encode($validatedData['cards2_id']);
        $validatedData['cards3_id'] = json_encode($validatedData['cards3_id']);
        $validatedData['cards4_id'] = json_encode($validatedData['cards4_id']);

        $bulkGasPage->update($validatedData);

        return response()->json($bulkGasPage, 200);
    }

    public function destroy($id)
    {
        $bulkGasPage = BulkGasPage::findOrFail($id);
        $bulkGasPage->delete();
        return response()->json(['message' => 'Bulk Gas Page deleted successfully'], 200);
    }
}
