@extends('admin.layouts.app')
@section('title', 'Cards')
@section('content')
    <h1 class="text-2xl font-extrabold text-white mb-6">NFC Cards</h1>
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