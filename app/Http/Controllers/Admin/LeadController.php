<?php

namespace App\Http\Controllers\Admin;

use App\Models\CardLead;
use Illuminate\Http\Request;

class LeadController extends \App\Http\Controllers\Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->query('search', ''));

        $leads = CardLead::with('card.user')
            ->when($search !== '', function ($q) use ($search) {
                $q->where(function ($inner) use ($search) {
                    $inner->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%")
                        ->orWhereHas('card', function ($cardQuery) use ($search) {
                            $cardQuery->where('code', 'like', "%{$search}%")
                                ->orWhere('label', 'like', "%{$search}%");
                        });
                });
            })
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('admin.leads.index', compact('leads', 'search'));
    }
}