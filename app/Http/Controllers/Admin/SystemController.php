<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class SystemController extends Controller
{
    public function index()
    {
        $dbStatus = 'Connected';
        try {
            DB::connection()->getPdo();
        } catch (\Throwable $e) {
            $dbStatus = 'Error: ' . $e->getMessage();
        }

        $status = [
            'php_version' => PHP_VERSION,
            'laravel_version' => app()->version(),
            'environment' => app()->environment(),
            'debug' => config('app.debug') ? 'Enabled' : 'Disabled',
            'cache_driver' => config('cache.default'),
            'queue_connection' => config('queue.default'),
            'database_connection' => config('database.default'),
            'database_status' => $dbStatus,
            'storage_link' => is_link(public_path('storage')) ? 'Linked' : 'Not linked',
            'storage_writable' => is_writable(storage_path()) ? 'Writable' : 'Not writable',
            'cache_writable' => is_writable(base_path('bootstrap/cache')) ? 'Writable' : 'Not writable',
            'disk_free' => $this->formatBytes(disk_free_space(base_path()) ?: 0),
            'disk_total' => $this->formatBytes(disk_total_space(base_path()) ?: 0),
        ];

        return view('admin.system.index', compact('status'));
    }

    public function clearCache(Request $request)
    {
        $request->validate([
            'confirm' => ['accepted'],
        ]);

        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Artisan::call('event:clear');

        return redirect()->route('admin.system.index')->with('status', 'Application caches cleared successfully.');
    }

    private function formatBytes(float $bytes): string
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $i = 0;
        while ($bytes >= 1024 && $i < count($units) - 1) {
            $bytes /= 1024;
            $i++;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }
}