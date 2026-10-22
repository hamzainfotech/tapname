<?php

namespace App\Http\Controllers;

use App\Models\HomepageSection;
use App\Models\SiteSetting;

class MarketingController extends Controller
{
    public function index()
    {
        $sections = HomepageSection::where('is_active', true)->orderBy('sort_order')->get();
        $settings = SiteSetting::all()->keyBy('key');

        return view('marketing', compact('sections', 'settings'));
    }
}