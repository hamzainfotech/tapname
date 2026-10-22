@extends('layouts.account')

@section('title', 'Analytics')

@section('content')
    <div class="space-y-6">
        <h1 class="text-3xl font-extrabold text-white flex items-center gap-2">
            <i class="fa-solid fa-chart-line text-cyan-400" aria-hidden="true"></i>
            <span>Tap Analytics — {{ $card->label ?? $card->code }}</span>
        </h1>

        <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
            <div class="bg-slate-900 border border-slate-800 rounded-2xl p-4">
                <p class="text-xs text-slate-400">Total Taps</p>
                <p class="text-2xl font-bold text-white">{{ $totalTaps }}</p>
            </div>
            <div class="bg-slate-900 border border-slate-800 rounded-2xl p-4">
                <p class="text-xs text-slate-400">Unique Visitors</p>
                <p class="text-2xl font-bold text-white">{{ $uniqueVisitors }}</p>
            </div>
            <div class="bg-slate-900 border border-slate-800 rounded-2xl p-4">
                <p class="text-xs text-slate-400">Today</p>
                <p class="text-2xl font-bold text-white">{{ $tapsToday }}</p>
            </div>
            <div class="bg-slate-900 border border-slate-800 rounded-2xl p-4">
                <p class="text-xs text-slate-400">Last 7 Days</p>
                <p class="text-2xl font-bold text-white">{{ $taps7 }}</p>
            </div>
            <div class="bg-slate-900 border border-slate-800 rounded-2xl p-4">
                <p class="text-xs text-slate-400">Last 30 Days</p>
                <p class="text-2xl font-bold text-white">{{ $taps30 }}</p>
            </div>
        </div>

        <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6">
            <h2 class="text-white font-bold mb-4">Taps — Last 30 Days</h2>
            <canvas id="tapsChart" height="120"></canvas>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6">
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
            <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6">
                <h2 class="text-white font-bold mb-4">Recent Taps</h2>
                <div class="space-y-2 max-h-72 overflow-y-auto text-xs">
                    @forelse($recentTaps as $tap)
                        <div class="flex justify-between text-slate-300 border-b border-slate-800 pb-1">
                            <span>{{ $tap->tapped_at->format('M d, H:i') }}</span>
                            <span class="text-slate-500 truncate max-w-[120px]">{{ $tap->ip ?? '-' }}</span>
                        </div>
                    @empty
                        <p class="text-slate-500">No taps yet.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 text-cyan-400 hover:underline">
            <i class="fa-solid fa-arrow-left" aria-hidden="true"></i> Back to dashboard
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('tapsChart');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Taps',
                    data: @json($values),
                    backgroundColor: 'rgba(34,211,238,0.6)',
                    borderColor: 'rgba(34,211,238,1)',
                    borderWidth: 1
                }]
            },
            options: { responsive: true, scales: { y: { beginAtZero: true, ticks: { precision: 0 } } } }
        });
    </script>
@endsection