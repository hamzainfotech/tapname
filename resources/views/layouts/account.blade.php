<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Account') — Tap.Name</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #0b0f19; color: #f3f4f6; }
        .glass-panel { background: rgba(17,24,39,0.7); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.08); }
    </style>
</head>
<body class="min-h-screen">
    <header class="border-b border-slate-800 bg-slate-950/80 backdrop-blur">
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="{{ route('dashboard') }}" class="text-xl font-extrabold text-white flex items-center gap-2">
                <i class="fa-solid fa-bolt text-cyan-400" aria-hidden="true"></i>
                <span>Tap.Name</span>
            </a>
            <nav class="flex items-center gap-4 text-sm">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2 text-slate-300 hover:text-white">
                    <i class="fa-solid fa-gauge-high" aria-hidden="true"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('cards.create') }}" class="flex items-center gap-2 text-slate-300 hover:text-white">
                    <i class="fa-solid fa-plus" aria-hidden="true"></i>
                    <span>New Card</span>
                </a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button class="flex items-center gap-2 text-slate-300 hover:text-white">
                        <i class="fa-solid fa-right-from-bracket" aria-hidden="true"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </nav>
        </div>
    </header>
    <main class="max-w-6xl mx-auto px-6 py-8">
        <x-breadcrumbs />
        @if(session('status'))
            <div class="mb-6 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-300">{{ session('status') }}</div>
        @endif
        @yield('content')
    </main>
</body>
</html>