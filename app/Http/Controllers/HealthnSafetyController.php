<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HealthnSafety;
use App\Models\Media;

class HealthnSafetyController extends Controller
{
    public function index()
    {
        $healthnSafety = HealthnSafety::all();
        return response()->json($healthnSafety, 200);
    }
    public function indexView()
    {
        $healthnSafety = HealthnSafety::with(['media', 'cards', 'card2', 'cards2'])->first();
        
        if (!$healthnSafety) {
            return response()->json(['message' => 'About HealthnSafety data not found.'], 404);
        }

        $data = $healthnSafety;
        return view('HealthnSafetyView', compact('data'));
    }

    public function store(Request $request){
        try {
        $validatedData = $request->validate([
            'title_en' => 'required|string',
            'title_bn' => 'required|string',
            'media_id' => 'required|integer|exists:media,id',
            'tabs' => 'required|array',
            'description_en' => 'required|string',
            'description_bn' => 'required|string',
            'title1_en' => 'required|string',
            'title1_bn' => 'required|string',
            'iconlist' => 'required|array',
            'media2_id' => 'required|integer|exists:media,id',
            'title2_en' => 'required|string',
            'title2_bn' => 'required|string',
            'media3_id' => 'required|integer|exists:media,id',
            'iconlist2' => 'required|array',
            'title3_en' => 'required|string',
            'title3_bn' => 'required|string',
            'cards_id' => 'required|array',
            'cards2_id' => 'required|array',
            'title4_en' => 'required|string',
            'title4_bn' => 'required|string',
            'description2_en' => 'required|string',
            'description2_bn' => 'required|string',
            'iconlist3' => 'required|array',
        ]);

        $validatedData['tabs'] = json_encode($validatedData['tabs']);
        $validatedData['iconlist'] = json_encode($validatedData['iconlist']);
        $validatedData['iconlist2'] = json_encode($validatedData['iconlist2']);
        $validatedData['cards_id'] = json_encode($validatedData['cards_id']);
        $validatedData['cards2_id'] = json_encode($validatedData['cards2_id']);
        $validatedData['iconlist3'] = json_encode($validatedData['iconlist3']);
        

        $healthnSafety = HealthnSafety::create($validatedData);
        return response()->json($healthnSafety, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

}
