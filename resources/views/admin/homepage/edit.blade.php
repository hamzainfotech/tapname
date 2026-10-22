@extends('admin.layouts.app')
@section('title', 'Edit Section')
@section('content')
    <h1 class="text-2xl font-extrabold text-white mb-6">Edit: {{ $section->title }}</h1>
    <form method="POST" action="{{ route('admin.homepage.update', $section) }}" enctype="multipart/form-data" class="glass-panel rounded-2xl p-6 space-y-4">
        @csrf @method('PUT')
        <div>
            <label class="block text-xs text-slate-400 mb-1">Title</label>
            <input type="text" name="title" value="{{ old('title', $section->title) }}" class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">
        </div>
        <div>
            <label class="block text-xs text-slate-400 mb-1">Subtitle</label>
            <textarea name="subtitle" rows="2" class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">{{ old('subtitle', $section->subtitle) }}</textarea>
        </div>
        <div>
            <label class="block text-xs text-slate-400 mb-1">Body Text</label>
            <textarea name="body" rows="20" class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white font-mono text-xs">{{ old('body', $section->body) }}</textarea>
        </div>
        <div>
            <label class="block text-xs text-slate-400 mb-1">Button Text</label>
            <input type="text" name="button_text" value="{{ old('button_text', $section->button_text) }}" class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">
        </div>
        <div>
            <label class="block text-xs text-slate-400 mb-1">Button URL</label>
            <input type="text" name="button_url" value="{{ old('button_url', $section->button_url) }}" class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">
        </div>
        <div>
            <label class="block text-xs text-slate-400 mb-1">Sort Order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $section->sort_order) }}" class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">
        </div>
        <div>
            <label class="block text-xs text-slate-400 mb-1">Replace Image</label>
            <input type="file" name="image" class="text-slate-300">
            @if($section->image_path)
                <p class="text-xs text-slate-500 mt-1">Current: {{ $section->image_path }}</p>
            @endif
        </div>
        <div class="flex items-center gap-2">
            <input type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', $section->is_active) ? 'checked' : '' }}>
            <label for="is_active" class="text-xs text-slate-400">Active</label>
        </div>
        <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-cyan-400 to-blue-500 text-slate-950 font-bold rounded-xl">Save</button>
    </form>
@endsection