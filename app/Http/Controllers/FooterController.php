<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footer;
use Illuminate\Validation\ValidationException;

class FooterController extends Controller
{
    public function index()
    {
        $footers = Footer::all();
        return response()->json($footers);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title_en' => 'required|string',
                'title_bn' => 'required|string',
                'footer_status' => 'required|boolean',
                'logo' => 'required|string',
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
                'column2_links_bn.*.text' => 'required|string',
                'column2_links_en.*.link' => 'required|string',
                'column2_links_bn.*.link' => 'required|string',
                'column2_status' => 'required|boolean',
                'column3_title1_en' => 'required|string',
                'column3_title1_bn' => 'required|string',
                'column3_links1_en' => 'required|array',
                'column3_links1_bn' => 'required|array',
                'column3_links1_en.*.text' => 'required|string',
                'column3_links1_bn.*.text' => 'required|string',
                'column3_links1_en.*.link' => 'required|string',
                'column3_links1_bn.*.link' => 'required|string',
                'column3_title2_en' => 'required|string',
                'column3_title2_bn' => 'required|string',
                'column3_logos' => 'required|array',
                'column3_logos.*.title' => 'required|string',
                'column3_logos.*.image' => 'required|string',
                'column3_logos.*.link' => 'required|string',
                'column3_status' => 'required|boolean',
                'column4_title_en' => 'required|string',
                'column4_title_bn' => 'required|string',
                'column4_image' => 'required|string',
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
                'logo' => 'required|string',
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
                'column2_links_bn.*.text' => 'required|string',
                'column2_links_en.*.link' => 'required|string',
                'column2_links_bn.*.link' => 'required|string',
                'column2_status' => 'required|boolean',
                'column3_title1_en' => 'required|string',
                'column3_title1_bn' => 'required|string',
                'column3_links1_en' => 'required|array',
                'column3_links1_bn' => 'required|array',
                'column3_links1_en.*.text' => 'required|string',
                'column3_links1_bn.*.text' => 'required|string',
                'column3_links1_en.*.link' => 'required|string',
                'column3_links1_bn.*.link' => 'required|string',
                'column3_title2_en' => 'required|string',
                'column3_title2_bn' => 'required|string',
                'column3_logos' => 'required|array',
                'column3_logos.*.title' => 'required|string',
                'column3_logos.*.image' => 'required|string',
                'column3_logos.*.link' => 'required|string',
                'column3_status' => 'required|boolean',
                'column4_title_en' => 'required|string',
                'column4_title_bn' => 'required|string',
                'column4_image' => 'required|string',
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

        $footer->update($validatedData);

        return response()->json($footer, 200);
    }

    public function destroy($id)
    {
        $footer = Footer::findOrFail($id);
        $footer->delete();
        return response()->json(null, 204);
    }
}
