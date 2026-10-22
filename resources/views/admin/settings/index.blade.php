@extends('admin.layouts.app')
@section('title', 'Site Settings')
@section('content')
    <h1 class="text-2xl font-extrabold text-white mb-6">Site Settings</h1>
    <form method="POST" action="{{ route('admin.settings.update') }}" class="glass-panel rounded-2xl p-6 space-y-4">
        @csrf @method('PUT')
        @foreach($settings as $setting)
    @php
        $icon = match ($setting->type) {
            'textarea' => 'fa-solid fa-align-left',
            'url' => 'fa-solid fa-link',
            'email' => 'fa-solid fa-envelope',
            'number' => 'fa-solid fa-hashtag',
            'boolean' => 'fa-solid fa-toggle-on',
            default => 'fa-solid fa-pen',
        };
    @endphp
    <div>
        <label class="block text-xs text-slate-400 mb-1 flex items-center gap-2">
            <i class="{{ $icon }} text-slate-500" aria-hidden="true"></i>
            <span>{{ $setting->label ?: $setting->key }}</span>
        </label>
        @if($setting->type === 'textarea')
            <textarea name="{{ $setting->key }}" rows="3" class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">{{ old($setting->key, $setting->value) }}</textarea>
        @else
            <div class="relative">
                <i class="{{ $icon }} absolute left-3 top-1/2 -translate-y-1/2 text-slate-500" aria-hidden="true"></i>
                <input type="text" name="{{ $setting->key }}" value="{{ old($setting->key, $setting->value) }}" class="w-full pl-10 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">
            </div>
        @endif
    </div>
@endforeach
        <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-cyan-400 to-blue-500 text-slate-950 font-bold rounded-xl">Save Settings</button>
    </form>
@endsection