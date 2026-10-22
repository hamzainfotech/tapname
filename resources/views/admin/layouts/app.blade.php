<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') — Tap.Name Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        darkBg: '#0b0f19',
                        darkCard: 'rgba(17, 24, 39, 0.7)',
                        brandCyan: '#00f2fe',
                        brandBlue: '#4facfe',
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #0b0f19; color: #f3f4f6; }
        .glass-panel { background: rgba(17,24,39,0.7); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.08); }
    </style>
</head>
<body class="min-h-screen">
    <div class="flex min-h-screen">
        <aside class="w-72 bg-slate-950 border-r border-slate-800 p-6 flex flex-col">
            <a href="{{ route('admin.dashboard') }}" class="text-xl font-extrabold text-white mb-8">Tap.Name Admin</a>
            <nav class="space-y-2 flex-1">
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded-xl hover:bg-slate-900 text-slate-300">Dashboard</a>
                <a href="{{ route('admin.users.index') }}" class="block px-4 py-2 rounded-xl hover:bg-slate-900 text-slate-300">Users</a>
                <a href="{{ route('admin.cards.index') }}" class="block px-4 py-2 rounded-xl hover:bg-slate-900 text-slate-300">Cards</a>

                <div x-data="{ open: false }" class="pt-2">
                    <button type="button" @click="open = !open" class="w-full flex items-center justify-between px-4 py-2 rounded-xl hover:bg-slate-900 text-slate-300">
                        <span>Frontend Website</span>
                        <i class="fa-solid fa-chevron-down text-xs"></i>
                    </button>
@php
    $hpSections = \App\Models\HomepageSection::orderBy('sort_order')->get();
@endphp
                    <div x-show="open" class="pl-4 mt-1 space-y-1">
                        <a href="{{ route('admin.settings.index') }}" class="block px-4 py-2 rounded-xl hover:bg-slate-900 text-slate-400 text-sm">Global Settings</a>
                        @foreach($hpSections as $hpSection)
                            <a href="{{ route('admin.homepage.edit', $hpSection) }}" class="block px-4 py-2 rounded-xl hover:bg-slate-900 text-slate-400 text-sm">{{ $hpSection->title ?: ucwords(str_replace('_', ' ', $hpSection->key)) }}</a>
                        @endforeach
                        <a href="{{ route('admin.settings.index') }}" class="block px-4 py-2 rounded-xl hover:bg-slate-900 text-slate-400 text-sm">SEO / Meta</a>
                    </div>
                </div>

                <a href="{{ route('admin.admins.index') }}" class="block px-4 py-2 rounded-xl hover:bg-slate-900 text-slate-300">Admins</a>
            </nav>
            <form method="POST" action="{{ route('admin.logout') }}" class="mt-6">
                @csrf
                <button class="w-full px-4 py-2 rounded-xl bg-slate-900 text-slate-300 hover:text-white">Logout</button>
            </form>
        </aside>
        <main class="flex-1 p-8">
            @if(session('status'))
                <div class="mb-6 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-300">{{ session('status') }}</div>
            @endif
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>