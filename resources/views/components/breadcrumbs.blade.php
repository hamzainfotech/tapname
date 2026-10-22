@php
    $routeName = \Illuminate\Support\Facades\Route::currentRouteName();
    $parts = $routeName ? explode('.', $routeName) : [];
    $isAdmin = str_starts_with((string) $routeName, 'admin.');

    // Drop container prefix and trailing "index"
    if ($isAdmin && isset($parts[0]) && $parts[0] === 'admin') {
        array_shift($parts);
    }
    if (! empty($parts) && end($parts) === 'index') {
        array_pop($parts);
    }

    $labels = [
        'dashboard' => 'Dashboard',
        'users' => 'Users',
        'cards' => 'Cards',
        'leads' => 'Leads',
        'analytics' => 'Analytics',
        'admins' => 'Admins',
        'homepage' => 'Homepage',
        'settings' => 'Settings',
        'system' => 'System',
        'create' => 'Create',
        'profile' => 'Profile',
        'edit' => 'Edit',
    ];

    $crumbs = [];

    if ($isAdmin) {
        $crumbs[] = ['label' => 'Admin', 'url' => route('admin.dashboard')];
    }

    $accumulated = [];
    foreach ($parts as $index => $part) {
        $accumulated[] = $part;
        $label = $labels[$part] ?? \Illuminate\Support\Str::title(str_replace(['-', '_'], ' ', $part));
        $isLast = $index === array_key_last($parts);

        $url = null;
        if (! $isLast) {
            $candidate = $isAdmin
                ? 'admin.' . implode('.', $accumulated) . '.index'
                : implode('.', $accumulated);

            if (\Illuminate\Support\Facades\Route::has($candidate)) {
                $url = route($candidate);
            } elseif ($isAdmin && \Illuminate\Support\Facades\Route::has('admin.' . implode('.', $accumulated))) {
                $url = route('admin.' . implode('.', $accumulated));
            } elseif (! $isAdmin && $part === 'cards') {
                $url = route('dashboard');
            }
        }

        // Avoid duplicate "Admin > Dashboard" on the dashboard page itself
        if ($isAdmin && $part === 'dashboard' && count($crumbs) === 1) {
            array_pop($crumbs);
        }

        $crumbs[] = ['label' => $label, 'url' => $url];
    }

    if (empty($crumbs)) {
        $crumbs[] = ['label' => $isAdmin ? 'Admin' : 'Dashboard', 'url' => null];
    }
@endphp

@if(count($crumbs) > 1 || ($crumbs[0]['label'] ?? '') !== 'Dashboard')
<nav aria-label="Breadcrumb" class="mb-6">
    <ol class="flex flex-wrap items-center gap-2 text-sm text-slate-400">
        @foreach($crumbs as $i => $crumb)
            <li class="flex items-center gap-2">
                @if($crumb['url'] && $i < count($crumbs) - 1)
                    <a href="{{ $crumb['url'] }}" class="hover:text-cyan-400 transition-colors">{{ $crumb['label'] }}</a>
                @else
                    <span class="text-slate-200 font-medium">{{ $crumb['label'] }}</span>
                @endif
                @if($i < count($crumbs) - 1)
                    <i class="fa-solid fa-chevron-right text-[10px] text-slate-600" aria-hidden="true"></i>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
@endif