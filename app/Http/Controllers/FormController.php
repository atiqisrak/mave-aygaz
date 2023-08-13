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
                'title' => 'required|string',
                'description' => 'nullable|string',
                'options' => 'nullable|json',
                'fields' => 'required|array',
                'submit_direction' => 'required|string',
            ]);
    
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
            'title' => 'required|string',
            'description' => 'nullable|string',
            'options' => 'nullable|json',
            'fields' => 'required|array',
            'submit_direction' => 'required|string',
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
