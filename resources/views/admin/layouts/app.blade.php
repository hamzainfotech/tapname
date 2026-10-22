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
            <a href="{{ route('admin.dashboard') }}" class="text-xl font-extrabold text-white mb-8 flex items-center gap-2">
                <i class="fa-solid fa-shield-halved text-cyan-400" aria-hidden="true"></i>
                <span>Tap.Name Admin</span>
            </a>
            <nav class="space-y-2 flex-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-slate-900 text-slate-300">
                    <i class="fa-solid fa-gauge-high w-5 text-center" aria-hidden="true"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-slate-900 text-slate-300">
                    <i class="fa-solid fa-users w-5 text-center" aria-hidden="true"></i>
                    <span>Users</span>
                </a>
                <a href="{{ route('admin.cards.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-slate-900 text-slate-300">
                    <i class="fa-solid fa-id-card w-5 text-center" aria-hidden="true"></i>
                    <span>Cards</span>
                </a>

                <div x-data="{ open: {{ \Illuminate\Support\Facades\Route::is('admin.settings.*', 'admin.homepage.*') ? 'true' : 'false' }} }" class="pt-2">
                    <button type="button" @click="open = !open" class="w-full flex items-center justify-between px-4 py-2 rounded-xl hover:bg-slate-900 text-slate-300">
                        <span class="flex items-center gap-3">
                            <i class="fa-solid fa-globe w-5 text-center" aria-hidden="true"></i>
                            <span>Frontend Website</span>
                        </span>
                        <i class="fa-solid fa-chevron-down text-xs" aria-hidden="true"></i>
                    </button>
                    <div x-show="open" class="pl-4 mt-1 space-y-1">
                        <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-slate-900 text-slate-400 text-sm">
                            <i class="fa-solid fa-sliders w-4 text-center" aria-hidden="true"></i>
                            <span>Global Settings</span>
                        </a>
                        <a href="{{ route('admin.homepage.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-slate-900 text-slate-400 text-sm">
                            <i class="fa-solid fa-house w-4 text-center" aria-hidden="true"></i>
                            <span>Homepage Setting</span>
                        </a>
                        <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-slate-900 text-slate-400 text-sm">
                            <i class="fa-solid fa-magnifying-glass w-4 text-center" aria-hidden="true"></i>
                            <span>SEO / Meta</span>
                        </a>
                    </div>
                </div>

                <a href="{{ route('admin.admins.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-slate-900 text-slate-300">
                    <i class="fa-solid fa-user-shield w-5 text-center" aria-hidden="true"></i>
                    <span>Admins</span>
                </a>
                <a href="{{ route('admin.system.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-slate-900 text-slate-300">
                    <i class="fa-solid fa-server w-5 text-center" aria-hidden="true"></i>
                    <span>System</span>
                </a>
            </nav>
            <form method="POST" action="{{ route('admin.logout') }}" class="mt-6">
                @csrf
                <button class="w-full flex items-center justify-center gap-2 px-4 py-2 rounded-xl bg-slate-900 text-slate-300 hover:text-white">
                    <i class="fa-solid fa-right-from-bracket" aria-hidden="true"></i>
                    <span>Logout</span>
                </button>
            </form>
        </aside>
        <main class="flex-1 p-8">
            <x-breadcrumbs />
            @if(session('status'))
                <div class="mb-6 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-300">{{ session('status') }}</div>
            @endif
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>