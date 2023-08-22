<?php

namespace App\Http\Controllers;
use App\Models\Navbar;
use Illuminate\Http\Request;

class NavbarController extends Controller
{
    public function index()
    {
        // $navbars = Navbar::with('menu', 'logo')->get();
        // return response()->json($navbars);
        return Navbar::all();

    }
    public function indexView()
    {
        $navbar = Navbar::with('menu.menuItems')->first(); // Assuming you want to retrieve the first navbar
    
        return view('navbarView', compact('navbar'));
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'logo_id' => 'required|exists:media,id',
            'menu_id' => 'required|exists:menus,id',
        ]);

        $navbar = Navbar::create($validatedData);

        return response()->json($navbar, 201);
    }

    public function update(Request $request, Navbar $navbar)
    {
        $validatedData = $request->validate([
            'logo_id' => 'required|exists:media,id',
            'menu_id' => 'required|exists:menus,id',
        ]);

        $navbar->update($validatedData);

        return response()->json($navbar, 200);
    }

    public function destroy(Navbar $navbar)
    {
        $navbar->delete();

        return response()->json(['message' => 'Navbar deleted successfully'], 200);
    }
}
