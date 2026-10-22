@extends('admin.layouts.app')
@section('title', 'Edit Card')
@section('content')
    <h1 class="text-2xl font-extrabold text-white mb-6">Edit Card</h1>
    <form method="POST" action="{{ route('admin.cards.update', $card) }}" class="glass-panel rounded-2xl p-6 space-y-4 max-w-xl">
        @csrf @method('PUT')
        <div>
            <label class="block text-xs text-slate-400 mb-1">Label</label>
            <input type="text" name="label" value="{{ old('label', $card->label) }}" class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">
        </div>
        <div class="flex items-center gap-2">
            <input type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', $card->is_active) ? 'checked' : '' }}>
            <label for="is_active" class="text-xs text-slate-400">Active</label>
        </div>
        <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-cyan-400 to-blue-500 text-slate-950 font-bold rounded-xl">Save</button>
    </form>
@endsection