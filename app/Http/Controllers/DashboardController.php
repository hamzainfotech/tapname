<?php

namespace App\Http\Controllers;

use App\Models\NfcCard;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $cards = Auth::user()->cards()->with('profile')->withCount('taps')->latest()->get();

        return view('dashboard.index', compact('cards'));
    }
}