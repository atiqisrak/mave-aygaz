<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutCylinderGas;

class AboutCylinderGasController extends Controller
{
    public function index()
    {
        $aboutCylinderGas = AboutCylinderGas::first();
        return response()->json($aboutCylinderGas);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title1' => 'required|string',
            'description1' => 'required|string',
            'banner_image' => 'required|string',
            'title2' => 'required|string',
            'description2' => 'required|string',
            'video_url' => 'required|string',
            'title3' => 'required|string',
            'description3' => 'required|string',
            'card_id_array1' => 'required|array',
            'title4' => 'required|string',
            'description4' => 'required|string',
            'card_id_array2' => 'required|array',
            'status' => 'required|boolean',
            
        ]);

        $aboutCylinderGas = AboutCylinderGas::create($validatedData);

        return response()->json($aboutCylinderGas, 201);
    }

    public function update(Request $request, $id)
    {
        $aboutCylinderGas = AboutCylinderGas::findOrFail($id);

        $validatedData = $request->validate([
            'title1' => 'required|string',
            'description1' => 'required|string',
            'banner_image' => 'required|string',
            'title2' => 'required|string',
            'description2' => 'required|string',
            'video_url' => 'required|string',
            'title3' => 'required|string',
            'description3' => 'required|string',
            'card_id_array1' => 'required|array',
            'title4' => 'required|string',
            'description4' => 'required|string',
            'card_id_array2' => 'required|array',
            'status' => 'required|boolean',
        ]);

        $aboutCylinderGas->update($validatedData);

        return response()->json($aboutCylinderGas, 200);
    }

    public function destroy($id)
    {
        $aboutCylinderGas = AboutCylinderGas::findOrFail($id);
        $aboutCylinderGas->delete();
        return response()->json(null, 204);
    }

}
