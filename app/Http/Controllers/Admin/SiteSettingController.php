<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function index()
    {
        return view('admin.settings.index', [
            'settings' => SiteSetting::orderBy('group')->orderBy('sort_order')->get(),
        ]);
    }

    public function update(Request $request)
    {
        foreach (SiteSetting::all() as $setting) {
            if ($request->has($setting->key)) {
                $setting->update(['value' => $request->input($setting->key)]);
            }
        }

        return redirect()->route('admin.settings.index')->with('status', 'Settings updated.');
    }
}