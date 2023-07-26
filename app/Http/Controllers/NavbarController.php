<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Navbar;

class NavbarController extends Controller
{
    public function index(Request $request)
    {
        $language = $request->header('Accept-Language', 'en'); // Fallback to English if no language specified
        $navbar = Navbar::select(['id', "logo", "menu_items->$language as menu_items", "contact_number"])
            ->first();

        return response()->json($navbar);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'logo' => 'required|string',
            'menu_items' => 'required|array',
            'menu_items.en' => 'required|string',
            'menu_items.bn' => 'required|string',
            'contact_number' => 'required|string',
        ]);

        $navbar = new Navbar;
        $navbar->logo = $validatedData['logo'];
        $navbar->menu_items = [
            'en' => $validatedData['menu_items']['en'],
            'bn' => $validatedData['menu_items']['bn'],
        ];
        $navbar->contact_number = $validatedData['contact_number'];
        $navbar->save();

        return response()->json($navbar, 201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'logo' => 'required|string',
            'menu_items' => 'required|array',
            'menu_items.en' => 'required|string',
            'menu_items.bn' => 'required|string',
            'contact_number' => 'required|string',
        ]);

        $navbar = Navbar::findOrFail($id);
        $navbar->logo = $validatedData['logo'];
        $navbar->menu_items = [
            'en' => $validatedData['menu_items']['en'],
            'bn' => $validatedData['menu_items']['bn'],
        ];
        $navbar->contact_number = $validatedData['contact_number'];
        $navbar->save();

        return response()->json($navbar, 200);
    }

    public function destroy($id)
    {
        $navbar = Navbar::findOrFail($id);
        $navbar->delete();
        return response()->json(null, 204);
    }
}
