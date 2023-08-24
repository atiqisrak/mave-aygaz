<?php

namespace App\Http\Controllers;
use App\Models\AboutPage;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    public function index()
    {
        // $about = About::with('media')->first();
        $about = AboutPage::all();

        // return view('about', compact('about'));

        return response()->json($about);
    }

    public function indexView()
    {
        $aboutpage = AboutPage::with(['media', 'section3_cards', 'section4_cards'])->first();
        $aboutpage->section3_cards = json_decode($aboutpage->section3_cards); // Convert the JSON string to an array of objects

        
        
        if (!$aboutpage) {
            return response()->json(['message' => 'About page data not found.'], 404);
        }
        $data = $aboutpage;
    
        return view('aboutView', compact('data'));
    }
    

    public function show(Homepage $homepage)
    {
        return view('aboutpages.show', compact('aboutage'));
    }

    public function create()
    {
        return view('aboutpages.create');
    }

    public function store(Request $request)
    {
        // Validate and save data
        $validatedData = $request->validate([
            'media_id' => 'required|integer',
            'description_en' => 'required|string',
            'description_bn' => 'required|string',
            'section3_cards' => 'required|array',
            'section3_cards.*' => 'integer',
            'section4_cards' => 'required|array',
            'section4_cards.*' => 'integer',
        ]);
        $validatedData['section3_cards'] = json_encode($validatedData['section3_cards']);
        $validatedData['section4_cards'] = json_encode($validatedData['section4_cards']);

        AboutPage::create($validatedData);

        return response()->json($validatedData);
    }

    public function edit(AboutPage $aboutPage)
    {
        // Assuming you have necessary data for dropdowns, etc.
        return view('aboutpages.edit', compact('aboutPage'));
    }

    public function update(Request $request, AboutPage $aboutPage)
    {
        // Validate and update data
        $validatedData = $request->validate([
            'media_id' => 'required|integer',
            'description_en' => 'required|string',
            'description_bn' => 'required|string',
            'section3_cards' => 'required|array',
            'section3_cards.*' => 'integer',
            'section4_cards' => 'required|array',
            'section4_cards.*' => 'integer',
        ]);
        $validatedData['section3_cards'] = json_encode($validatedData['section3_cards']);
        $validatedData['section4_cards'] = json_encode($validatedData['section4_cards']);

        $aboutPage->update($validatedData);

        return response()->json($validatedData);
    }

    public function destroy(AboutPage $aboutPage)
    {
        $aboutPage->delete();
        return redirect()->route('about.index')->with('success', 'About page deleted successfully.');
    }
}
