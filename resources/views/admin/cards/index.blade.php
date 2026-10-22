@extends('admin.layouts.app')
@section('title', 'Cards')
@section('content')
    <h1 class="text-2xl font-extrabold text-white mb-6">NFC Cards</h1>
    <form method="GET" action="{{ route('admin.cards.index') }}" class="mb-4 flex gap-2">
        <div class="relative flex-1">
            <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-500" aria-hidden="true"></i>
            <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search cards..." class="w-full pl-10 py-2.5 bg-slate-900 border border-slate-800 rounded-xl text-white">
        </div>
        <button class="px-4 py-2.5 bg-slate-800 text-white rounded-xl">Search</button>
        @if(!empty($search))
            <a href="{{ route('admin.cards.index') }}" class="px-4 py-2.5 bg-slate-900 text-slate-300 rounded-xl">Clear</a>
        @endif
    </form>
    <div class="glass-panel rounded-2xl overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-900/50 text-slate-400">
                <tr>
                    <th class="px-4 py-3 text-left">Code</th>
                    <th class="px-4 py-3 text-left">User</th>
                    <th class="px-4 py-3 text-left">Label</th>
                    <th class="px-4 py-3 text-left">Active</th>
                    <th class="px-4 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800">
                @foreach($cards as $card)
                    <tr>
                        <td class="px-4 py-3 text-white font-mono">{{ $card->code }}</td>
                        <td class="px-4 py-3 text-slate-300">{{ $card->user?->email }}</td>
                        <td class="px-4 py-3 text-slate-300">{{ $card->label }}</td>
                        <td class="px-4 py-3 text-slate-300">{{ $card->is_active ? 'Yes' : 'No' }}</td>
                        <td class="px-4 py-3 space-x-2">
                            <a href="{{ route('admin.cards.edit', $card) }}" class="text-cyan-400 hover:underline">Edit</a>
                            <form method="POST" action="{{ route('admin.cards.destroy', $card) }}" class="inline" onsubmit="return confirm('Delete card?')">
                                @csrf @method('DELETE')
                                <button class="text-red-400 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $cards->links() }}</div>
@endsection