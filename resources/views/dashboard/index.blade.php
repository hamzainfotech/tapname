<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — Tap.Name</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-950 text-slate-100 p-6">
    <div class="max-w-5xl mx-auto">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-extrabold text-white">Your NFC Cards</h1>
            <div class="flex gap-3">
                <a href="{{ route('cards.create') }}" class="px-4 py-2 bg-gradient-to-r from-cyan-400 to-blue-500 text-slate-950 font-bold text-xs rounded-xl">+ New Card</a>
                <form method="POST" action="{{ route('logout') }}">@csrf<button class="px-4 py-2 bg-slate-800 text-white text-xs rounded-xl">Logout</button></form>
            </div>
        </div>

        @if(session('status'))
            <div class="mb-4 text-emerald-400 text-sm">{{ session('status') }}</div>
        @endif

        @if($cards->isEmpty())
            <p class="text-slate-400">No cards yet. Create your first NFC card.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($cards as $card)
                    <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs text-slate-500 font-mono">{{ $card->code }}</span>
                            <span class="text-xs {{ $card->is_active ? 'text-emerald-400' : 'text-red-400' }}">{{ $card->is_active ? 'Active' : 'Inactive' }}</span>
                        </div>
                        <h2 class="text-lg font-bold text-white">{{ $card->profile?->display_name ?? $card->label ?? 'Untitled' }}</h2>
                        <p class="text-xs text-slate-400 mb-4">{{ $card->profile?->job_title }} @if($card->profile?->company)· {{ $card->profile->company }}@endif</p>
                        <p class="text-xs text-slate-500 mb-4">Taps: {{ $card->taps_count }}</p>
                        <div class="flex gap-2">
                            <a href="{{ route('card.show', $card->code) }}" target="_blank" class="px-3 py-1.5 bg-slate-800 text-white text-xs rounded-lg">View</a>
                            <a href="{{ route('cards.edit', $card) }}" class="px-3 py-1.5 bg-cyan-500/10 text-cyan-400 text-xs rounded-lg">Edit</a>
                            <form method="POST" action="{{ route('cards.destroy', $card) }}" onsubmit="return confirm('Delete this card?')">
                                @csrf @method('DELETE')
                                <button class="px-3 py-1.5 bg-red-500/10 text-red-400 text-xs rounded-lg">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>