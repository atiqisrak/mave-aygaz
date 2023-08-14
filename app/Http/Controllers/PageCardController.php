<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageCard;

class PageCardController extends Controller
{
    public function index()
    {
        $pageCards = PageCard::all();
        return response()->json($pageCards);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'page_name' => 'required|string',
            'media_id' => 'required|exists:media,id',
            'title_en' => 'required|string',
            'title_bn' => 'required|string',
            'description_en' => 'required|string',
            'description_bn' => 'required|string',
            'link_url' => 'required|string',
            'status' => 'required|boolean',
        ]);

        $pageCard = PageCard::create($validatedData);
        return response()->json($pageCard, 201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'page_name' => 'required|string',
            'media_id' => 'required|exists:media,id',
            'title_en' => 'required|string',
            'title_bn' => 'required|string',
            'description_en' => 'required|string',
            'description_bn' => 'required|string',
            'link_url' => 'required|string',
            'status' => 'required|boolean',
        ]);

        $pageCard = PageCard::findOrFail($id);
        $pageCard->update($validatedData);
        return response()->json($pageCard, 200);
    }

    public function destroy($id)
    {
        $pageCard = PageCard::findOrFail($id);
        $pageCard->delete();
        return response()->json(null, 204);
    }
}
