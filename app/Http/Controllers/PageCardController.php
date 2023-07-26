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
            'image' => 'required|string',
            'title' => 'required|array',
            'title.en' => 'required|string',
            'title.bn' => 'required|string',
            'description' => 'required|array',
            'description.en' => 'required|string',
            'description.bn' => 'required|string',
            'link_url' => 'required|string',
        ]);

        $pageCard = PageCard::create($validatedData);
        return response()->json($pageCard, 201);
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
            'link_url' => 'required|string',
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
