<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NfcCard;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index()
    {
        return view('admin.cards.index', [
            'cards' => NfcCard::with('user')->latest()->paginate(20),
        ]);
    }

    public function edit(NfcCard $card)
    {
        return view('admin.cards.edit', compact('card'));
    }

    public function update(Request $request, NfcCard $card)
    {
        $data = $request->validate([
            'label' => ['nullable', 'string', 'max:255'],
            'is_active' => ['boolean'],
        ]);

        $card->update([
            'label' => $data['label'] ?? null,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.cards.index')->with('status', 'Card updated.');
    }

    public function destroy(NfcCard $card)
    {
        $card->delete();

        return redirect()->route('admin.cards.index')->with('status', 'Card deleted.');
    }
}