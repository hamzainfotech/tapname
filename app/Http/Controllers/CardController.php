<?php

namespace App\Http\Controllers;

use App\Models\CardLead;
use App\Models\CardTap;
use App\Models\NfcCard;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function show(string $code)
    {
        $card = NfcCard::where('code', $code)
            ->where('is_active', true)
            ->with('profile')
            ->firstOrFail();

        $card->increment('tap_count');

        CardTap::create([
            'nfc_card_id' => $card->id,
            'ip' => request()->ip(),
            'user_agent' => substr((string) request()->userAgent(), 0, 1000),
            'tapped_at' => now(),
        ]);

        return view('profile', compact('card'));
    }

    public function vcard(string $code)
    {
        $card = NfcCard::where('code', $code)
            ->where('is_active', true)
            ->with('profile')
            ->firstOrFail();

        $profile = $card->profile;
        $name = $profile?->display_name ?? $card->label ?? 'Tap.Name User';
        $org = $profile?->company ?? '';
        $title = $profile?->job_title ?? '';
        $phone = $profile?->phone ?? '';
        $email = $profile?->email ?? '';
        $url = $profile?->website ?? '';

        $vcard = "BEGIN:VCARD\nVERSION:3.0\n";
        $vcard .= "FN:{$name}\n";
        if ($title) $vcard .= "TITLE:{$title}\n";
        if ($org) $vcard .= "ORG:{$org}\n";
        if ($phone) $vcard .= "TEL:{$phone}\n";
        if ($email) $vcard .= "EMAIL:{$email}\n";
        if ($url) $vcard .= "URL:{$url}\n";
        $vcard .= "END:VCARD\n";

        return response($vcard, 200, [
            'Content-Type' => 'text/vcard; charset=utf-8',
            'Content-Disposition' => 'attachment; filename="' . $code . '.vcf"',
        ]);
    }

    public function storeLead(Request $request, string $code)
    {
        $card = NfcCard::where('code', $code)
            ->where('is_active', true)
            ->firstOrFail();

        $validated = $request->validate([
            'name' => ['nullable', 'string', 'max:120'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:40'],
            'message' => ['nullable', 'string', 'max:1000'],
        ]);

        CardLead::create([
            'nfc_card_id' => $card->id,
            'name' => $validated['name'] ?? null,
            'email' => $validated['email'] ?? null,
            'phone' => $validated['phone'] ?? null,
            'message' => $validated['message'] ?? null,
            'ip' => $request->ip(),
            'user_agent' => substr((string) $request->userAgent(), 0, 1000),
        ]);

        return back()->with('status', 'Thanks! Your message was sent.');
    }
}