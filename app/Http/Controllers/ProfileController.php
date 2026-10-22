<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'display_name' => ['nullable', 'string', 'max:255'],
            'job_title' => ['nullable', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'bio' => ['nullable', 'string', 'max:2000'],
            'phone' => ['nullable', 'string', 'max:50'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
            'website' => ['nullable', 'url', 'max:255'],
            'google_review_url' => ['nullable', 'url', 'max:2048'],
            'theme' => ['nullable', 'string', 'max:50'],
            'links' => ['nullable', 'array'],
            'links.*.label' => ['nullable', 'string', 'max:100'],
            'links.*.url' => ['nullable', 'url', 'max:2048'],
            'avatar' => ['nullable', 'image', 'max:2048'],
            'password' => ['nullable', 'confirmed', Password::defaults()],
        ]);

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->display_name = $data['display_name'] ?? null;
        $user->job_title = $data['job_title'] ?? null;
        $user->company = $data['company'] ?? null;
        $user->bio = $data['bio'] ?? null;
        $user->phone = $data['phone'] ?? null;
        $user->website = $data['website'] ?? null;
        $user->google_review_url = $data['google_review_url'] ?? null;
        $user->theme = $data['theme'] ?? ($user->theme ?? 'default');

        $links = [];
        foreach (($data['links'] ?? []) as $link) {
            if (! empty($link['url'])) {
                $links[] = [
                    'label' => $link['label'] ?? null,
                    'url' => $link['url'],
                ];
            }
        }
        $user->links = $links;

        if ($request->hasFile('avatar')) {
            $user->avatar_path = $request->file('avatar')->store('avatars', 'public');
        }

        if (! empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }

        $user->save();

        return redirect()->route('profile.edit')->with('status', 'Profile updated.');
    }
}