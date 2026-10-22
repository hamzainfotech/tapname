@extends('layouts.account')

@section('title', 'Dashboard')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-extrabold text-white">Your NFC Cards</h1>
        <a href="{{ route('cards.create') }}" class="px-4 py-2 bg-gradient-to-r from-cyan-400 to-blue-500 text-slate-950 font-bold text-xs rounded-xl flex items-center gap-2">
            <i class="fa-solid fa-plus" aria-hidden="true"></i>
            <span>New Card</span>
        </a>
    </div>

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
                        <a href="{{ route('card.show', $card->code) }}" target="_blank" class="px-3 py-1.5 bg-slate-800 text-white text-xs rounded-lg flex items-center gap-1">
                            <i class="fa-solid fa-eye" aria-hidden="true"></i> View
                        </a>
                        <a href="{{ route('cards.edit', $card) }}" class="px-3 py-1.5 bg-cyan-500/10 text-cyan-400 text-xs rounded-lg flex items-center gap-1">
                            <i class="fa-solid fa-pen" aria-hidden="true"></i> Edit
                        </a>
                        <form method="POST" action="{{ route('cards.destroy', $card) }}" onsubmit="return confirm('Delete this card?')">
                            @csrf @method('DELETE')
                            <button class="px-3 py-1.5 bg-red-500/10 text-red-400 text-xs rounded-lg flex items-center gap-1">
                                <i class="fa-solid fa-trash" aria-hidden="true"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection