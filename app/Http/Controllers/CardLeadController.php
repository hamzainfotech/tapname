<?php

namespace App\Http\Controllers;

use App\Models\NfcCard;
use Illuminate\Http\Request;

class CardLeadController extends Controller
{
    public function index(NfcCard $card)
    {
        abort_unless($card->user_id === auth()->id(), 403);

        $leads = $card->leads()->latest()->paginate(20);

        return view('cards.leads', compact('card', 'leads'));
    }
}