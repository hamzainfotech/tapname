<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CardTap;
use App\Models\NfcCard;

class AnalyticsController extends Controller
{
    public function index()
    {
        $days = 30;
        $since = now()->subDays($days - 1)->startOfDay();

        $totalTaps = (int) CardTap::count();
        $uniqueVisitors = (int) CardTap::distinct('ip')->count('ip');
        $tapsToday = (int) CardTap::whereDate('tapped_at', today())->count();
        $taps7 = (int) CardTap::where('tapped_at', '>=', now()->subDays(7)->startOfDay())->count();
        $taps30 = (int) CardTap::where('tapped_at', '>=', $since)->count();

        $dailyRaw = CardTap::selectRaw('DATE(tapped_at) as day, COUNT(*) as count')
            ->where('tapped_at', '>=', $since)
            ->groupBy('day')
            ->pluck('count', 'day');

        $labels = [];
        $values = [];
        for ($i = $days - 1; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $key = $date->format('Y-m-d');
            $labels[] = $date->format('M d');
            $values[] = (int) ($dailyRaw[$key] ?? 0);
        }

        $topCards = NfcCard::with('user')
            ->withCount('taps')
            ->orderByDesc('taps_count')
            ->limit(10)
            ->get();

        $recentTaps = CardTap::with('card.user')
            ->latest('tapped_at')
            ->limit(30)
            ->get();

        $deviceCounts = $this->deviceBreakdown(CardTap::where('tapped_at', '>=', $since)->pluck('user_agent'));

        return view('admin.analytics.index', compact(
            'totalTaps',
            'uniqueVisitors',
            'tapsToday',
            'taps7',
            'taps30',
            'labels',
            'values',
            'topCards',
            'recentTaps',
            'deviceCounts'
        ));
    }

    protected function deviceBreakdown($userAgents): array
    {
        $counts = ['Mobile' => 0, 'Tablet' => 0, 'Desktop' => 0, 'Bot' => 0, 'Other' => 0];

        foreach ($userAgents as $ua) {
            $ua = strtolower((string) $ua);
            if ($ua === '') {
                $counts['Other']++;
                continue;
            }
            if (str_contains($ua, 'bot') || str_contains($ua, 'crawler') || str_contains($ua, 'spider') || str_contains($ua, 'curl')) {
                $counts['Bot']++;
            } elseif (str_contains($ua, 'ipad') || str_contains($ua, 'tablet')) {
                $counts['Tablet']++;
            } elseif (str_contains($ua, 'mobile') || str_contains($ua, 'android') || str_contains($ua, 'iphone')) {
                $counts['Mobile']++;
            } else {
                $counts['Desktop']++;
            }
        }

        return $counts;
    }
}