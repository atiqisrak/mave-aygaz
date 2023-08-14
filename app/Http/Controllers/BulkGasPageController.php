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
        $validatedData = $request->validate([
            'title' => 'required|string',
            'banner' => 'required|string',
            'title2' => 'required|string',
            'description2' => 'required|string',
            'section2_cards' => 'required|array',
            'section3_cards' => 'required|array',
            'title4' => 'required|string',
            'section4_cards' => 'required|array',
            'title5' => 'required|string',
            'section5_cards' => 'required|array',
            'status' => 'boolean',
        ]);

        $bulkGasPage = BulkGasPage::create($validatedData);

        return response()->json($bulkGasPage, 201);
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
            'title' => 'required|string',
            'banner' => 'required|string',
            'title2' => 'required|string',
            'description2' => 'required|string',
            'section2_cards' => 'required|array',
            'section3_cards' => 'required|array',
            'title4' => 'required|string',
            'section4_cards' => 'required|array',
            'title5' => 'required|string',
            'section5_cards' => 'required|array',
            'status' => 'boolean',
        ]);

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
