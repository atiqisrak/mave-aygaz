<?php

namespace App\Http\Controllers;

use App\Models\Homepage;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $homepages = Homepage::all();
        return response()->json($homepages);
    }

    public function indexView()
{
    $homepage = Homepage::with(['slider.media', 'cards', 'media', 'footer'])->first();
    
    if (!$homepage) {
        return response()->json(['message' => 'Homepage data not found.'], 404);
    }
    
    $data = $homepage;

    return view('homeView', compact('data'));
}

    public function show(Homepage $homepage)
    {
        return view('homepages.show', compact('homepage'));
    }
    public function create()
    {
        return view('homepages.create');
    }

    public function store(Request $request)
    {
        // Validate and save data
        $validatedData = $request->validate([
            'navbar_id' => 'required|integer',
            'slider_id' => 'required|integer',
            'card_id' => 'required|integer',
            'cards_id' => 'required|array',
            'cards_id.*' => 'integer',
            'media_id' => 'required|integer',
            'media_ids' => 'required|array',
            'media_ids.*' => 'integer',
            'footer_id' => 'required|integer',
        ]);

        $validatedData['cards_id'] = json_encode($validatedData['cards_id']);
        $validatedData['media_ids'] = json_encode($validatedData['media_ids']);

        Homepage::create($validatedData);

        return response()->json($validatedData, 201);
    }

    public function edit(Homepage $homepage)
    {
        return view('homepages.edit', compact('homepage'));
    }

    public function update(Request $request, Homepage $homepage)
    {
        $validatedData = $request->validate([
            'navbar_id' => 'required|integer',
            'slider_id' => 'required|integer',
            'card_id' => 'required|integer',
            'cards_id' => 'required|array',
            'cards_id.*' => 'integer',
            'media_id' => 'required|integer',
            'media_ids' => 'required|array',
            'media_ids.*' => 'integer',
            'footer_id' => 'required|integer',
        ]);

        $validatedData['cards_id'] = json_encode($validatedData['cards_id']);
        $validatedData['media_ids'] = json_encode($validatedData['media_ids']);

        $homepage->update($validatedData);

        return redirect()->route('homepages.index')->with('success', 'Homepage updated successfully.');
    }

    public function destroy(Homepage $homepage)
    {
        // $homepage->cardex()->detach();
        $homepage->delete();
        return redirect()->route('homepages.index')->with('success', 'Homepage deleted successfully.');
    }
}
