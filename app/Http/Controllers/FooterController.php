<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footer;
use Illuminate\Validation\ValidationException;
use App\Models\Media;

class FooterController extends Controller
{
    public function index()
    {
        $footers = Footer::all();
        return response()->json($footers);
    }

    public function indexView()
{
    $footer = Footer::with('media')->first(); // Assuming you want to fetch the first footer record

    if (!$footer) {
        return response()->json(['message' => 'No footer data found.'], 404);
    }

    // return view('footerView', compact('footer'));
    return view('footerView', ['data' => $footer]);
}


    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title_en' => 'required|string',
                'title_bn' => 'required|string',
                'footer_status' => 'required|boolean',
                'logo_id' => 'required|exists:media,id',
                'address1_title_en' => 'required|string',
                'address1_title_bn' => 'required|string',
                'address1_description_en' => 'required|string',
                'address1_description_bn' => 'required|string',
                'address2_title_en' => 'required|string',
                'address2_title_bn' => 'required|string',
                'address2_description_en' => 'required|string',
                'address2_description_bn' => 'required|string',
                'address1_status' => 'required|boolean',
                'address2_status' => 'required|boolean',
                'column2_title_en' => 'required|string',
                'column2_title_bn' => 'required|string',
                'column2_links_en' => 'required|array',
                'column2_links_bn' => 'required|array',
                'column2_links_en.*.text' => 'required|string',
                'column2_links_en.*.link' => 'required|string',
                'column2_links_bn.*.text' => 'required|string',
                'column2_links_bn.*.link' => 'required|string',
                'column2_status' => 'required|boolean',
                'column3_title1_en' => 'required|string',
                'column3_title1_bn' => 'required|string',
                'column3_links1_en' => 'required|array',
                'column3_links1_bn' => 'required|array',
                'column3_links1_en.*.text' => 'required|string',
                'column3_links1_en.*.link' => 'required|string',
                'column3_links1_bn.*.text' => 'required|string',
                'column3_links1_bn.*.link' => 'required|string',
                'column3_title2_en' => 'required|string',
                'column3_title2_bn' => 'required|string',
                'column3_logos' => 'required|array',
                'column3_logos.*.title' => 'required|string',
                'column3_logos.*.image' => 'required|exists:media,id',
                'column3_logos.*.link' => 'required|string',
                'column3_status' => 'required|boolean',
                'column4_title_en' => 'required|string',
                'column4_title_bn' => 'required|string',
                'column4_image' => 'required|exists:media,id',
                'column4_text_en' => 'required|string',
                'column4_text_bn' => 'required|string',
                'column4_link' => 'required|string',
                'column4_description_en' => 'required|string',
                'column4_description_bn' => 'required|string',
                'column4_status' => 'required|boolean',
            ]);
            
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        }
        // dd($validatedData);
        // Create Footer instance
        $validatedData['column2_links_en'] = json_encode($validatedData['column2_links_en']);
        $validatedData['column2_links_bn'] = json_encode($validatedData['column2_links_bn']);
        $validatedData['column3_links1_en'] = json_encode($validatedData['column3_links1_en']);
        $validatedData['column3_links1_bn'] = json_encode($validatedData['column3_links1_bn']);
        $validatedData['column3_logos'] = json_encode($validatedData['column3_logos']);


        $footer = Footer::create($validatedData);
    
        return response()->json($footer, 201);
    }
    
    public function update(Request $request, $id)
    {
        $footer = Footer::findOrFail($id);
    
        try {
            $validatedData = $request->validate([
                'title_en' => 'required|string',
                'title_bn' => 'required|string',
                'footer_status' => 'required|boolean',
                'logo_id' => 'required|exists:media,id',
                'address1_title_en' => 'required|string',
                'address1_title_bn' => 'required|string',
                'address1_description_en' => 'required|string',
                'address1_description_bn' => 'required|string',
                'address2_title_en' => 'required|string',
                'address2_title_bn' => 'required|string',
                'address2_description_en' => 'required|string',
                'address2_description_bn' => 'required|string',
                'address1_status' => 'required|boolean',
                'address2_status' => 'required|boolean',
                'column2_title_en' => 'required|string',
                'column2_title_bn' => 'required|string',
                'column2_links_en' => 'required|array',
                'column2_links_bn' => 'required|array',
                'column2_links_en.*.text' => 'required|string',
                'column2_links_en.*.link' => 'required|string',
                'column2_links_bn.*.text' => 'required|string',
                'column2_links_bn.*.link' => 'required|string',
                'column2_status' => 'required|boolean',
                'column3_title1_en' => 'required|string',
                'column3_title1_bn' => 'required|string',
                'column3_links1_en' => 'required|array',
                'column3_links1_bn' => 'required|array',
                'column3_links1_en.*.text' => 'required|string',
                'column3_links1_en.*.link' => 'required|string',
                'column3_links1_bn.*.text' => 'required|string',
                'column3_links1_bn.*.link' => 'required|string',
                'column3_title2_en' => 'required|string',
                'column3_title2_bn' => 'required|string',
                'column3_logos' => 'required|array',
                'column3_logos.*.title' => 'required|string',
                'column3_logos.*.image' => 'required|exists:media,id',
                'column3_logos.*.link' => 'required|string',
                'column3_status' => 'required|boolean',
                'column4_title_en' => 'required|string',
                'column4_title_bn' => 'required|string',
                'column4_image' => 'required|exists:media,id',
                'column4_text_en' => 'required|string',
                'column4_text_bn' => 'required|string',
                'column4_link' => 'required|string',
                'column4_description_en' => 'required|string',
                'column4_description_bn' => 'required|string',
                'column4_status' => 'required|boolean',
            ]);
            
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        }
        
        $validatedData['column2_links_en'] = json_encode($validatedData['column2_links_en']);
        $validatedData['column2_links_bn'] = json_encode($validatedData['column2_links_bn']);
        $validatedData['column3_links1_en'] = json_encode($validatedData['column3_links1_en']);
        $validatedData['column3_links1_bn'] = json_encode($validatedData['column3_links1_bn']);
        $validatedData['column3_logos'] = json_encode($validatedData['column3_logos']);

    
        // Update the Footer with the validated data
        $footer->update($validatedData);
        
        return response()->json($footer, 200);
    }
    

    public function destroy($id)
    {
        $footer = Footer::findOrFail($id);
        $footer->media()->detach(); // Detach media relationships before deleting the Footer
        $footer->delete();
        return response()->json(null, 204);
    }
}
