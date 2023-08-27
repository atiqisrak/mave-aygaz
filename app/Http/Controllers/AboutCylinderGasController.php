<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutCylinderGas;
use App\Models\Media;

class AboutCylinderGasController extends Controller
{
    public function index()
    {
        $aboutCylinderGas = AboutCylinderGas::all();
        return response()->json($aboutCylinderGas);
    }
    public function indexView()
    {
        $aboutCylinderGas = AboutCylinderGas::with(['media', 'cards', 'card2', 'cards2'])->first();
        
        if (!$aboutCylinderGas) {
            return response()->json(['message' => 'About Cylinder Gas data not found.'], 404);
        }

        $data = $aboutCylinderGas;
        return view('aboutCylinderGasView', compact('data'));
    }

    public function store(Request $request)
    {
        try {
        $validatedData = $request->validate([
            'title_en' => 'required|string',
            'title_bn' => 'required|string',
            'media_id' => 'required|integer',
            'tabs' => 'required|array',
            'card_id' => 'required|integer',
            'media2_id' => 'required|integer',
            'card2_id' => 'required|integer',
            'title2_en' => 'required|string',
            'title2_bn' => 'required|string',
            'subtitle_en' => 'required|string',
            'subtitle_bn' => 'required|string',
            'cards_id' => 'required|array',
            'title3_en' => 'required|string',
            'title3_bn' => 'required|string',
            'subtitle2_en' => 'required|string',
            'subtitle2_bn' => 'required|string',
            'cards2_id' => 'required|array',
            'status' => 'required|boolean',
        ]);
    
        $validatedData['tabs'] = json_encode($validatedData['tabs']);
        $validatedData['cards_id'] = json_encode($validatedData['cards_id']);
        $validatedData['cards2_id'] = json_encode($validatedData['cards2_id']);
        
        AboutCylinderGas::create($validatedData);
    
        return response()->json($validatedData, 201);
    } catch (\Throwable $th) {
        return response()->json($th->getMessage(), 500);
    }
    }
    

    public function edit(AboutCylinderGas $aboutCylinderGas)
    {
        return view('aboutCylinderGas.edit', compact('aboutCylinderGas'));
    }

    public function update(Request $request, $id)
    {
        $aboutCylinderGas = AboutCylinderGas::findOrFail($id);

        $validatedData = $request->validate([
            'title_en' => 'required|string',
            'title_bn' => 'required|string',
            'media_id' => 'required|integer',
            'tabs' => 'required|array',
            'card_id' => 'required|integer',
            'media2_id' => 'required|integer',
            'card2_id' => 'required|integer',
            'title2_en' => 'required|string',
            'title2_bn' => 'required|string',
            'subtitle_en' => 'required|string',
            'subtitle_bn' => 'required|string',
            'cards_id' => 'required|array',
            'title3_en' => 'required|string',
            'title3_bn' => 'required|string',
            'subtitle2_en' => 'required|string',
            'subtitle2_bn' => 'required|string',
            'cards2_id' => 'required|array',
            'status' => 'required|boolean',
        ]);
        
        $validatedData['tabs'] = json_encode($validatedData['tabs']);
        $validatedData['cards_id'] = json_encode($validatedData['cards_id']);
        $validatedData['cards2_id'] = json_encode($validatedData['cards2_id']);

        $aboutCylinderGas->update($validatedData);

        return response()->json($aboutCylinderGas, 200);
    }

    public function destroy(AboutCylinderGas $aboutCylinderGas)
    {
        $aboutCylinderGas = AboutCylinderGas::findOrFail($id);
        // Detach relationships
        $aboutCylinderGas->cards()->detach();
        $aboutCylinderGas->card2()->dissociate();
        $aboutCylinderGas->cards2()->detach();
        $aboutCylinderGas->delete();
        return response()->json(['message' => 'About Cylinder Gas deleted successfully.']);
    }

}
