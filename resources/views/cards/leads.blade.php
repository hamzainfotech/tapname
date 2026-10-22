@extends('layouts.account')

@section('title', 'Leads')

@section('content')
    <div class="space-y-6">
        <h1 class="text-3xl font-extrabold text-white flex items-center gap-2">
            <i class="fa-solid fa-inbox text-cyan-400" aria-hidden="true"></i>
            <span>Leads for {{ $card->label ?? $card->code }}</span>
        </h1>

        <div class="glass-panel rounded-2xl overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-slate-900/50 text-slate-400">
                    <tr>
                        <th class="px-4 py-3 text-left">Date</th>
                        <th class="px-4 py-3 text-left">Name</th>
                        <th class="px-4 py-3 text-left">Email</th>
                        <th class="px-4 py-3 text-left">Phone</th>
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
                            <td class="px-4 py-3 text-slate-300">{{ $lead->message ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="px-4 py-6 text-center text-slate-500">No leads yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div>{{ $leads->links() }}</div>
        <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 text-cyan-400 hover:underline">
            <i class="fa-solid fa-arrow-left" aria-hidden="true"></i> Back to dashboard
        </a>
    </div>
@endsection