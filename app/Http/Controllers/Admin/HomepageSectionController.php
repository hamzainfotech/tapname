<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageSection;
use Illuminate\Http\Request;

class HomepageSectionController extends Controller
{
    public function index()
    {
        return view('admin.homepage.index', [
            'sections' => HomepageSection::orderBy('sort_order')->get(),
        ]);
    }

    public function edit(HomepageSection $section)
    {
        return view('admin.homepage.edit', compact('section'));
    }

    public function update(Request $request, HomepageSection $section)
    {
        $data = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string'],
            'body' => ['nullable', 'string'],
            'button_text' => ['nullable', 'string', 'max:255'],
            'button_url' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . preg_replace('/[^A-Za-z0-9.\-_]/', '_', $file->getClientOriginalName());
            $file->move(public_path('uploads/homepage'), $filename);
            $data['image_path'] = 'uploads/homepage/' . $filename;
        }

        $data['is_active'] = $request->boolean('is_active');

        $section->update($data);

        return redirect()->route('admin.homepage.index')->with('status', 'Section updated.');
    }
}