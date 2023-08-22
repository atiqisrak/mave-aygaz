<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem;
use Illuminate\Support\Str;

class MenuItemController extends Controller
{
    public function index()
    {
        $menuItems = MenuItem::all();
        return response()->json($menuItems);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            '*.title' => 'required|string',
            '*.link' => 'required|string',
        ]);
    
        foreach ($validatedData as $itemData) {
            MenuItem::create($itemData);
        }
    
        return response()->json($validatedData, 201);
    }
    

    public function show($id)
    {
        $menuItem = MenuItem::findOrFail($id);
        return response()->json($menuItem);
    }

    public function update(Request $request, $id)
    {
        $menuItem = MenuItem::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string',
            'link' => 'required|string',
        ]);

        $menuItem->update($validatedData);

        return response()->json($menuItem);
    }

    public function destroy($id)
    {
        $menuItem = MenuItem::findOrFail($id);
        $menuItem->delete();

        return response()->json(['message' => 'Menu item deleted successfully']);
    }
}
