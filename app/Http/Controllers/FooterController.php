<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footer;

class FooterController extends Controller
{
    public function index()
    {
        $footer = Footer::first();
        return response()->json($footer);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'logo' => 'required|string',
            'address' => 'required|array',
            'address.en' => 'required|string',
            'address.bn' => 'required|string',
            'quick_links' => 'required|array',
            'quick_links.en' => 'required|string',
            'quick_links.bn' => 'required|string',
        ]);

        $footer = Footer::create($validatedData);
        return response()->json($footer, 201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'logo' => 'required|string',
            'address' => 'required|array',
            'address.en' => 'required|string',
            'address.bn' => 'required|string',
            'quick_links' => 'required|array',
            'quick_links.en' => 'required|string',
            'quick_links.bn' => 'required|string',
        ]);

        $footer = Footer::findOrFail($id);
        $footer->update($validatedData);
        return response()->json($footer, 200);
    }

    public function destroy($id)
    {
        $footer = Footer::findOrFail($id);
        $footer->delete();
        return response()->json(null, 204);
    }
}
