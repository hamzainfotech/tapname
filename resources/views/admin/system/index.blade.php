@extends('admin.layouts.app')

@section('title', 'System')

@section('content')
    <h1 class="text-2xl font-extrabold text-white mb-6">System Status</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        @foreach($status as $key => $value)
            <div class="glass-panel rounded-2xl p-5">
                <p class="text-xs text-slate-400 uppercase tracking-wider mb-1">{{ \Illuminate\Support\Str::title(str_replace('_', ' ', $key)) }}</p>
                <p class="text-lg font-semibold text-white">{{ $value }}</p>
            </div>
        @endforeach
    </div>

    <div class="glass-panel rounded-2xl p-6">
        <h2 class="text-lg font-bold text-white mb-2">Maintenance</h2>
        <p class="text-sm text-slate-400 mb-4">Clear all application caches. This may briefly affect performance while caches rebuild.</p>
        <form method="POST" action="{{ route('admin.system.clear-cache') }}" onsubmit="return confirm('Clear all application caches?');">
            @csrf
            <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-cyan-400 to-blue-500 text-slate-950 font-bold rounded-xl">
                <i class="fa-solid fa-broom mr-2" aria-hidden="true"></i>Clear Caches
            </button>
        </form>
    </div>
@endsection