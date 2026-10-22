@extends('admin.layouts.app')
@section('title', 'Site Settings')
@section('content')
    <h1 class="text-2xl font-extrabold text-white mb-6">Site Settings</h1>
    <form method="POST" action="{{ route('admin.settings.update') }}" class="glass-panel rounded-2xl p-6 space-y-4">
        @csrf @method('PUT')
        @foreach($settings as $setting)
            <div>
                <label class="block text-xs text-slate-400 mb-1">{{ $setting->label ?: $setting->key }}</label>
                @if($setting->type === 'textarea')
                    <textarea name="{{ $setting->key }}" rows="3" class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">{{ old($setting->key, $setting->value) }}</textarea>
                @else
                    <input type="text" name="{{ $setting->key }}" value="{{ old($setting->key, $setting->value) }}" class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">
                @endif
            </div>
        @endforeach
        <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-cyan-400 to-blue-500 text-slate-950 font-bold rounded-xl">Save Settings</button>
    </form>
@endsection