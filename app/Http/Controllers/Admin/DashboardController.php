<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\NfcCard;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'userCount' => User::count(),
            'adminCount' => Admin::count(),
            'cardCount' => NfcCard::count(),
            'tapCount' => NfcCard::sum('tap_count'),
        ]);
    }
}