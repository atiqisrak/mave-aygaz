<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;

class CardController extends Controller
{
    public function index()
    {
        $cards = Card::all();
        return response()->json($cards);
    }
    public function indexView()
    {
        $cards = Card::with('media')->get();
        return view('cardView', compact('cards'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'page_name' => 'required|string',
            'media_ids' => 'required|exists:media,id',
            'title_en' => 'required|string',
            'title_bn' => 'required|string',
            'description_en' => 'required|string',
            'description_bn' => 'required|string',
            'link_url' => 'required|string',
            'status' => 'required|boolean',
        ]);

        $card = Card::create($validatedData);
        $card->media()->attach($validatedData['media_ids']);

        return response()->json($card, 201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'page_name' => 'required|string',
            'media_ids' => 'required|exists:media,id',
            'title_en' => 'required|string',
            'title_bn' => 'required|string',
            'description_en' => 'required|string',
            'description_bn' => 'required|string',
            'link_url' => 'required|string',
            'status' => 'required|boolean',
        ]);

        $card = Card::findOrFail($id);
        $card->update($validatedData);
        $card->media()->sync([$validatedData['media_ids']]); // Sync to update the media relationship

        return response()->json($card, 200);
    }

    public function destroy($id)
    {
        $card = Card::findOrFail($id);
        $card->media()->detach(); // Detach media relationships before deleting the card
        $card->delete();
        return response()->json(null, 204);
    }
}
