<?php

namespace App\Http\Controllers;

use App\Models\CardProfile;
use App\Models\NfcCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CardCrudController extends Controller
{
    public function create()
    {
        return view('cards.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'label' => ['nullable', 'string', 'max:255'],
            'display_name' => ['nullable', 'string', 'max:255'],
            'job_title' => ['nullable', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'bio' => ['nullable', 'string', 'max:2000'],
            'phone' => ['nullable', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:255'],
            'website' => ['nullable', 'url', 'max:255'],
            'google_review_url' => ['nullable', 'url', 'max:2048'],
            'theme' => ['nullable', 'string', 'max:50'],
            'links' => ['nullable', 'array'],
            'links.*.label' => ['nullable', 'string', 'max:100'],
            'links.*.url' => ['nullable', 'url', 'max:2048'],
            'avatar' => ['nullable', 'image', 'max:2048'],
        ]);

        $user = Auth::user();

        $card = NfcCard::create([
            'user_id' => $user->id,
            'code' => NfcCard::generateUniqueCode(),
            'label' => $data['label'] ?? null,
            'is_active' => true,
            'leads_enabled' => true,
        ]);

        $profileData = [
            'nfc_card_id' => $card->id,
            'display_name' => $data['display_name'] ?? ($user->display_name ?: $user->name),
            'job_title' => $data['job_title'] ?? $user->job_title,
            'company' => $data['company'] ?? $user->company,
            'bio' => $data['bio'] ?? $user->bio,
            'phone' => $data['phone'] ?? $user->phone,
            'email' => $data['email'] ?? ($user->email ?: null),
            'website' => $data['website'] ?? $user->website,
            'google_review_url' => $data['google_review_url'] ?? $user->google_review_url,
            'theme' => $data['theme'] ?? ($user->theme ?? 'default'),
            'links' => $this->filterLinks($data['links'] ?? ($user->links ?? [])),
        ];

        if ($request->hasFile('avatar')) {
            $profileData['avatar_path'] = $request->file('avatar')->store('avatars', 'public');
        } elseif ($user->avatar_path) {
            $profileData['avatar_path'] = $user->avatar_path;
        }

        CardProfile::create($profileData);

        return redirect()->route('cards.edit', $card)->with('status', 'Card created.');
    }

    public function edit(NfcCard $card)
    {
        Gate::authorize('update', $card);
        $card->load('profile');

        return view('cards.edit', compact('card'));
    }

    public function update(Request $request, NfcCard $card)
    {
        Gate::authorize('update', $card);

        $data = $request->validate([
            'label' => ['nullable', 'string', 'max:255'],
            'is_active' => ['nullable', 'boolean'],
            'leads_enabled' => ['nullable', 'boolean'],
            'display_name' => ['nullable', 'string', 'max:255'],
            'job_title' => ['nullable', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'bio' => ['nullable', 'string', 'max:2000'],
            'phone' => ['nullable', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:255'],
            'website' => ['nullable', 'url', 'max:255'],
            'google_review_url' => ['nullable', 'url', 'max:2048'],
            'theme' => ['nullable', 'string', 'max:50'],
            'links' => ['nullable', 'array'],
            'links.*.label' => ['nullable', 'string', 'max:100'],
            'links.*.url' => ['nullable', 'url', 'max:2048'],
            'avatar' => ['nullable', 'image', 'max:2048'],
        ]);

        $card->update([
            'label' => $data['label'] ?? $card->label,
            'is_active' => $request->boolean('is_active'),
            'leads_enabled' => $request->boolean('leads_enabled'),
        ]);

        $profile = $card->profile ?? new CardProfile(['nfc_card_id' => $card->id]);

        $profile->fill([
            'display_name' => $data['display_name'] ?? null,
            'job_title' => $data['job_title'] ?? null,
            'company' => $data['company'] ?? null,
            'bio' => $data['bio'] ?? null,
            'phone' => $data['phone'] ?? null,
            'email' => $data['email'] ?? null,
            'website' => $data['website'] ?? null,
            'google_review_url' => $data['google_review_url'] ?? null,
            'theme' => $data['theme'] ?? ($profile->theme ?? 'default'),
            'links' => $this->filterLinks($data['links'] ?? []),
        ]);

        if ($request->hasFile('avatar')) {
            $profile->avatar_path = $request->file('avatar')->store('avatars', 'public');
        }

        $profile->save();

        return redirect()->route('cards.edit', $card)->with('status', 'Card updated.');
    }

    public function destroy(NfcCard $card)
    {
        Gate::authorize('delete', $card);
        $card->delete();

        return redirect()->route('dashboard')->with('status', 'Card deleted.');
    }

    private function filterLinks(array $links): array
    {
        return array_values(array_filter($links, function ($link) {
            return ! empty($link['url']);
        }));
    }
}