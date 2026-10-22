@extends('admin.layouts.app')

@section('title', 'Leads')

@section('content')
    <h1 class="text-2xl font-extrabold text-white mb-6">Leads</h1>
    <form method="GET" action="{{ route('admin.leads.index') }}" class="mb-4 flex gap-2">
        <div class="relative flex-1">
            <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-500" aria-hidden="true"></i>
            <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search leads..." class="w-full pl-10 py-2.5 bg-slate-900 border border-slate-800 rounded-xl text-white">
        </div>
        <button class="px-4 py-2.5 bg-slate-800 text-white rounded-xl">Search</button>
        @if(!empty($search))
            <a href="{{ route('admin.leads.index') }}" class="px-4 py-2.5 bg-slate-900 text-slate-300 rounded-xl">Clear</a>
        @endif
    </form>
    <div class="glass-panel rounded-2xl overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-900/50 text-slate-400">
                <tr>
                    <th class="px-4 py-3 text-left">Date</th>
                    <th class="px-4 py-3 text-left">Name</th>
                    <th class="px-4 py-3 text-left">Email</th>
                    <th class="px-4 py-3 text-left">Phone</th>
                    <th class="px-4 py-3 text-left">Card</th>
                    <th class="px-4 py-3 text-left">Message</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800">
                @forelse($leads as $lead)
                    <tr>
                        <td class="px-4 py-3 text-slate-300">{{ $lead->created_at->format('Y-m-d H:i') }}</td>
                        <td class="px-4 py-3 text-white">{{ $lead->name ?? '-' }}</td>
                        <td class="px-4 py-3 text-slate-300">{{ $lead->email ?? '-' }}</td>
                        <td class="px-4 py-3 text-slate-300">{{ $lead->phone ?? '-' }}</td>
                        <td class="px-4 py-3 text-cyan-400">
                            <a href="{{ route('admin.cards.edit', $lead->card) }}">{{ $lead->card->code }}</a>
                        </td>
                        <td class="px-4 py-3 text-slate-300 max-w-xs truncate">{{ $lead->message ?? '-' }}</td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-4 py-6 text-center text-slate-500">No leads yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $leads->links() }}</div>
@endsection