@extends('admin.layouts.app')

@section('title', 'Analytics')

@section('content')
    <h1 class="text-2xl font-extrabold text-white mb-6">Tap Analytics</h1>

    <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-6">
        <div class="glass-panel rounded-2xl p-4">
            <p class="text-xs text-slate-400">Total Taps</p>
            <p class="text-2xl font-bold text-white">{{ $totalTaps }}</p>
        </div>
        <div class="glass-panel rounded-2xl p-4">
            <p class="text-xs text-slate-400">Unique Visitors</p>
            <p class="text-2xl font-bold text-white">{{ $uniqueVisitors }}</p>
        </div>
        <div class="glass-panel rounded-2xl p-4">
            <p class="text-xs text-slate-400">Today</p>
            <p class="text-2xl font-bold text-white">{{ $tapsToday }}</p>
        </div>
        <div class="glass-panel rounded-2xl p-4">
            <p class="text-xs text-slate-400">Last 7 Days</p>
            <p class="text-2xl font-bold text-white">{{ $taps7 }}</p>
        </div>
        <div class="glass-panel rounded-2xl p-4">
            <p class="text-xs text-slate-400">Last 30 Days</p>
            <p class="text-2xl font-bold text-white">{{ $taps30 }}</p>
        </div>
    </div>

    <div class="glass-panel rounded-2xl p-6 mb-6">
        <h2 class="text-white font-bold mb-4">Taps — Last 30 Days</h2>
        <canvas id="tapsChart" height="100"></canvas>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div class="glass-panel rounded-2xl p-6">
            <h2 class="text-white font-bold mb-4">Devices (30 days)</h2>
            <ul class="space-y-2 text-sm">
                @foreach($deviceCounts as $device => $count)
                    <li class="flex justify-between text-slate-300">
                        <span>{{ $device }}</span>
                        <span class="text-white font-semibold">{{ $count }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="glass-panel rounded-2xl p-6">
            <h2 class="text-white font-bold mb-4">Top Cards</h2>
            <table class="w-full text-sm">
                <thead class="text-slate-400">
                    <tr>
                        <th class="text-left py-2">Card</th>
                        <th class="text-left py-2">Owner</th>
                        <th class="text-right py-2">Taps</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800">
                    @forelse($topCards as $card)
                        <tr>
                            <td class="py-2 text-cyan-400">
                                <a href="{{ route('admin.cards.edit', $card) }}">{{ $card->code }}</a>
                            </td>
                            <td class="py-2 text-slate-300">{{ $card->user?->email ?? '-' }}</td>
                            <td class="py-2 text-right text-white">{{ $card->taps_count }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="py-4 text-center text-slate-500">No data.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="glass-panel rounded-2xl p-6">
        <h2 class="text-white font-bold mb-4">Recent Taps</h2>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-900/50 text-slate-400">
                    <tr>
                        <th class="px-4 py-3 text-left">Time</th>
                        <th class="px-4 py-3 text-left">Card</th>
                        <th class="px-4 py-3 text-left">IP</th>
                        <th class="px-4 py-3 text-left">Device</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800">
                    @forelse($recentTaps as $tap)
                        <tr>
                            <td class="px-4 py-3 text-slate-300">{{ $tap->tapped_at->format('Y-m-d H:i') }}</td>
                            <td class="px-4 py-3 text-cyan-400">{{ $tap->card?->code ?? '-' }}</td>
                            <td class="px-4 py-3 text-slate-300">{{ $tap->ip ?? '-' }}</td>
                            <td class="px-4 py-3 text-slate-300">{{ $tap->user_agent ? \Illuminate\Support\Str::limit($tap->user_agent, 40) : '-' }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="px-4 py-6 text-center text-slate-500">No taps yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('tapsChart');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Taps',
                    data: @json($values),
                    borderColor: 'rgba(34,211,238,1)',
                    backgroundColor: 'rgba(34,211,238,0.2)',
                    fill: true,
                    tension: 0.3
                }]
            },
            options: { responsive: true, scales: { y: { beginAtZero: true, ticks: { precision: 0 } } } }
        });
    </script>
@endsection