<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        $menus = Menu::with('menuItems')->get();

        return response()->json($menus);
    }

    public function indexView()
    {
        $menus = Card::all();
        return view('menuView', compact('menus'));
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string',
        'menu_items_ids' => 'required|array|exists:menu_items,id',
    ]);

    $menu = Menu::create(['name' => $validatedData['name']]);
    $menu->menuItems()->sync($validatedData['menu_items_ids']);
    return response()->json($menu, 201);
    
}

public function update(Request $request, Menu $menu)
{
    $validatedData = $request->validate([
        'name' => 'required|string',
        'menu_items_ids' => 'required|exists:menu_items,id',
    ]);

    $menu->update(['name' => $validatedData['name']]);
    $menu->menuItems()->sync($validatedData['menu_item_ids']);

    return response()->json($menu, 200);
}


    public function destroy(Menu $menu)
    {
        $menu->delete();

        return response()->json(['message' => 'Menu deleted successfully'], 200);
    }
}
