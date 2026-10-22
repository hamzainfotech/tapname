<?php

namespace App\Http\Controllers;

use App\Models\HomepageSection;

class MarketingController extends Controller
{
    public function index()
    {
        $sections = HomepageSection::where('is_active', true)->orderBy('sort_order')->get();

        return view('marketing', compact('sections'));
    }
}