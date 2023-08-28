<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CylinderGas;
use App\Models\Media;

class CylinderGasController extends Controller
{
    public function index()
    {
        $cylinderGas = CylinderGas::all();
        return response()->json($cylinderGas);
    }
    public function indexView()
    {
        $cylinderGas = CylinderGas::with(['media', 'cards', 'card2', 'cards2'])->first();
        
        if (!$cylinderGas) {
            return response()->json(['message' => 'About Cylinder Gas data not found.'], 404);
        }

        $data = $cylinderGas;
        return view('CylinderGasView', compact('data'));
    }

    public function store(Request $request)
    {
        try {
        $validatedData = $request->validate([
            'title_en' => 'required|string',
    'title_bn' => 'required|string',
    'media_id' => 'required|integer|exists:media,id',
    'tabs' => 'required|array',
    // 'tabs.*.id' => 'required|integer',
    // 'tabs.*.title_en' => 'required|string',
    // 'tabs.*.title_bn' => 'required|string',
    'card_id' => 'nullable|integer|exists:cards,id',
    'media2_id' => 'nullable|integer|exists:media,id',
    'card2_id' => 'nullable|integer|exists:cards,id',
    'title2_en' => 'required|string',
    'title2_bn' => 'required|string',
    'subtitle_en' => 'required|string',
    'subtitle_bn' => 'required|string',
    'cards_id' => 'required|array',
    // 'cards_id.*' => 'integer|exists:cards,id',
    'title3_en' => 'required|string',
    'title3_bn' => 'required|string',
    'subtitle2_en' => 'required|string',
    'subtitle2_bn' => 'required|string',
    'cards2_id' => 'required|array',
    // 'cards2_id.*' => 'integer|exists:cards,id',
    'form_ids' => 'required|array',
    // 'form_ids.*' => 'integer|exists:forms,id',
    'title4_en' => 'required|string',
    'title4_bn' => 'required|string',
    'description_en' => 'required|string',
    'description_bn' => 'required|string',
    'title5_en' => 'required|string',
    'title5_bn' => 'required|string',
    'advantages' => 'required|array',
    // 'advantages.*' => 'string',
    'status' => 'required|boolean',
        ]);
        
        $validatedData['tabs'] = json_encode($validatedData['tabs']);
        $validatedData['cards_id'] = json_encode($validatedData['cards_id']);
        $validatedData['cards2_id'] = json_encode($validatedData['cards2_id']);
        $validatedData['form_ids'] = json_encode($validatedData['form_ids']);
        $validatedData['advantages'] = json_encode($validatedData['advantages']);

        $cylinderGas = CylinderGas::create($validatedData);

        return  response()->json($cylinderGas, 201);

        // Attach forms to CylinderGas
        // if (isset($fids)) {
        //     foreach ($fids as $formId) {
        //         $cylinderGas->forms()->attach($formId);
        //     }
        // }
    
        // return response()->json($cylinderGas, 201);
    } catch (\Exception $th) {
        return response()->json($th->getMessage(), 500);
    }
    }
    

    public function edit(CylinderGas $cylinderGas)
    {
        return view('cylinderGas.edit', compact('cylinderGas'));
    }

    public function update(Request $request, $id)
    {
        $cylinderGas = CylinderGas::findOrFail($id);

        $validatedData = $request->validate([
            'title_en' => 'required|string',
            'title_bn' => 'required|string',
            'media_id' => 'required|integer|exists:media,id',
            'tabs' => 'required|array',
            'tabs.*.id' => 'required|integer',
            'tabs.*.title_en' => 'required|string',
            'tabs.*.title_bn' => 'required|string',
            'card_id' => 'nullable|integer|exists:cards,id',
            'media2_id' => 'nullable|integer|exists:media,id',
            'card2_id' => 'nullable|integer|exists:cards,id',
            'title2_en' => 'required|string',
            'title2_bn' => 'required|string',
            'subtitle_en' => 'required|string',
            'subtitle_bn' => 'required|string',
            'cards_id' => 'required|array',
            'cards_id.*' => 'integer|exists:cards,id',
            'title3_en' => 'required|string',
            'title3_bn' => 'required|string',
            'subtitle2_en' => 'required|string',
            'subtitle2_bn' => 'required|string',
            'cards2_id' => 'required|array',
            'cards2_id.*' => 'integer|exists:cards,id',
            'form_ids' => 'required|array',
            'form_ids.*' => 'integer|exists:forms,id',
            'title4_en' => 'required|string',
            'title4_bn' => 'required|string',
            'description_en' => 'required|string',
            'description_bn' => 'required|string',
            'title5_en' => 'required|string',
            'title5_bn' => 'required|string',
            'advantages' => 'required|array',
            'advantages.*' => 'string',
            'status' => 'required|boolean',
        ]);

        $validatedData['tabs'] = json_encode($validatedData['tabs']);
        $validatedData['cards_id'] = json_encode($validatedData['cards_id']);
        $validatedData['cards2_id'] = json_encode($validatedData['cards2_id']);
        $validatedData['form_ids'] = json_encode($validatedData['form_ids']);
        $validatedData['advantages'] = json_encode($validatedData['advantages']);

        $cylinderGas->update($validatedData);

        return response()->json($cylinderGas, 200);
    }

    public function destroy(CylinderGas $cylinderGas)
    {
        $cylinderGas = CylinderGas::findOrFail($id);
        // Detach relationships
        $cylinderGas->cards()->detach();
        $cylinderGas->card2()->dissociate();
        $cylinderGas->cards2()->detach();
        $cylinderGas->delete();
        return response()->json(['message' => 'About Cylinder Gas deleted successfully.']);
    }

}
