<?php

namespace App\Http\Controllers;

use App\Models\NfcCard;
use Illuminate\Support\Carbon;

class CardAnalyticsController extends Controller
{
    public function show(NfcCard $card)
    {
        abort_unless($card->user_id === auth()->id(), 403);

        $data = $this->analyticsForCard($card);

        return view('cards.analytics', array_merge(compact('card'), $data));
    }

    protected function analyticsForCard(NfcCard $card): array
    {
        $days = 30;
        $since = now()->subDays($days - 1)->startOfDay();

        $tapQuery = $card->taps();

        $totalTaps = (int) $tapQuery->count();
        $uniqueVisitors = (int) $card->taps()->distinct('ip')->count('ip');
        $tapsToday = (int) $card->taps()->whereDate('tapped_at', today())->count();
        $taps7 = (int) $card->taps()->where('tapped_at', '>=', now()->subDays(7)->startOfDay())->count();
        $taps30 = (int) $card->taps()->where('tapped_at', '>=', $since)->count();

        $dailyRaw = $card->taps()
            ->selectRaw('DATE(tapped_at) as day, COUNT(*) as count')
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

        $deviceCounts = $this->deviceBreakdown($card->taps()->where('tapped_at', '>=', $since)->pluck('user_agent'));
        $recentTaps = $card->taps()->latest('tapped_at')->limit(20)->get();

        return compact(
            'totalTaps',
            'uniqueVisitors',
            'tapsToday',
            'taps7',
            'taps30',
            'labels',
            'values',
            'deviceCounts',
            'recentTaps'
        );
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