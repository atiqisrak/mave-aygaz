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
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'card_id_array1' => 'required|array',
            'title2' => 'required|string',
            'description2' => 'required|string',
            'card_id_array2' => 'required|array',
            'short_descriptions' => 'required|array',
            'image' => 'required|string',
            'status' => 'required|boolean',
        ]);

        $autogasPage = AutogasPage::create($validatedData);

        return response()->json($autogasPage, 201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'card_id_array1' => 'required|array',
            'title2' => 'required|string',
            'description2' => 'required|string',
            'card_id_array2' => 'required|array',
            'short_descriptions' => 'required|array',
            'image' => 'required|string',
            'status' => 'required|boolean',
        ]);

        $autogasPage = AutogasPage::findOrFail($id);
        $autogasPage->update($validatedData);

        return response()->json($autogasPage, 200);
    }

    public function destroy($id)
    {
        $autogasPage = AutogasPage::findOrFail($id);
        $autogasPage->delete();

        return response()->json(['message' => 'Autogas page deleted'], 200);
    }
}
