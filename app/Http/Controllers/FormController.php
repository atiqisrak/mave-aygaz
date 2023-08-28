<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;

class FormController extends Controller
{
    public function index()
    {
        $forms = Form::all();
        return response()->json($forms);
    }

    public function store(Request $request)
    {
        try{
            $validatedData = $request->validate([
        'title_en' => 'required|string',
        'title_bn' => 'nullable|string',
        'description_bn' => 'nullable|string',
        'description_en' => 'nullable|string',
        'fields' => 'required|array',
        'submit_direction' => 'required|string',
        'status' => 'required|boolean',
            ]);

            $validatedData['fields'] = json_encode($validatedData['fields']);
    
            $form = Form::create($validatedData);
    
            return response()->json($form, 201);
        
        }
        catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $form = Form::findOrFail($id);

        $validatedData = $request->validate([
            'title_en' => 'required|string',
        'title_bn' => 'nullable|string',
        'description_bn' => 'nullable|string',
        'description_en' => 'nullable|string',
        'fields' => 'required|array',
        'submit_direction' => 'required|string',
        'status' => 'required|boolean',
        ]);

        $form->update($validatedData);

        return response()->json($form, 200);
    }

    public function destroy($id)
    {
        $form = Form::findOrFail($id);
        $form->delete();
        return response()->json(null, 204);
    }
}
