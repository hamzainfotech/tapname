@php $p = $card?->profile ?? Auth::user(); @endphp

<details class="group border border-slate-800 rounded-2xl p-4 bg-slate-950/40">
    <summary class="cursor-pointer text-white font-bold flex items-center gap-2">
        <i class="fa-solid fa-id-card text-cyan-400"></i> Basic Information
    </summary>
    <div class="mt-4 space-y-4">
        <x-input name="label" label="Internal Label" icon="fa-solid fa-tag" :value="old('label', $card?->label)" />

        @if($card)
            <div class="flex items-center gap-2">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $card->is_active) ? 'checked' : '' }} id="is_active">
                <label for="is_active" class="text-xs text-slate-400 flex items-center gap-2">
                    <i class="fa-solid fa-toggle-on text-slate-500" aria-hidden="true"></i>
                    <span>Active</span>
                </label>
            </div>
        @endif

        <x-input name="display_name" label="Display Name" icon="fa-solid fa-user" :value="old('display_name', $p?->display_name ?? ($p?->name ?? null))" />
        <x-input name="job_title" label="Job Title" icon="fa-solid fa-briefcase" :value="old('job_title', $p?->job_title)" />
        <x-input name="company" label="Company" icon="fa-solid fa-building" :value="old('company', $p?->company)" />

        <div>
            <label for="bio" class="block text-xs text-slate-400 mb-1 flex items-center gap-2">
                <i class="fa-solid fa-align-left text-slate-500" aria-hidden="true"></i>
                <span>Bio</span>
            </label>
            <textarea id="bio" name="bio" rows="3" class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">{{ old('bio', $p?->bio) }}</textarea>
        </div>

        <x-input name="theme" label="Theme" icon="fa-solid fa-palette" :value="old('theme', $p?->theme ?? 'default')" />

        <div>
            <label for="avatar" class="block text-xs text-slate-400 mb-1 flex items-center gap-2">
                <i class="fa-solid fa-image text-slate-500" aria-hidden="true"></i>
                <span>Avatar</span>
            </label>
            <input id="avatar" type="file" name="avatar" accept="image/*" class="w-full text-slate-300">
            @if($p?->avatar_path)
                <img src="{{ asset('storage/'.$p->avatar_path) }}" class="w-16 h-16 rounded-full mt-2 object-cover">
            @endif
        </div>
    </div>
</details>

<details class="group border border-slate-800 rounded-2xl p-4 bg-slate-950/40">
    <summary class="cursor-pointer text-white font-bold flex items-center gap-2">
        <i class="fa-solid fa-address-book text-cyan-400"></i> Contact Information
    </summary>
    <div class="mt-4 space-y-4">
        <div class="grid grid-cols-2 gap-4">
            <x-input name="phone" label="Phone" icon="fa-solid fa-phone" :value="old('phone', $p?->phone)" />
            <x-input name="email" label="Email" icon="fa-solid fa-envelope" type="email" :value="old('email', $p?->email)" />
        </div>

        <x-input name="website" label="Website" icon="fa-solid fa-globe" type="url" :value="old('website', $p?->website)" />
        <x-input name="google_review_url" label="Google Review URL" icon="fa-solid fa-star" type="url" :value="old('google_review_url', $p?->google_review_url)" />
    </div>
</details>

<details class="group border border-slate-800 rounded-2xl p-4 bg-slate-950/40">
    <summary class="cursor-pointer text-white font-bold flex items-center gap-2">
        <i class="fa-solid fa-user-plus text-cyan-400"></i> Lead Capture
    </summary>
    <div class="mt-4 space-y-4">
        <div class="flex items-center gap-2">
            <input type="checkbox" name="leads_enabled" value="1" {{ old('leads_enabled', $card?->leads_enabled ?? true) ? 'checked' : '' }} id="leads_enabled">
            <label for="leads_enabled" class="text-xs text-slate-400 flex items-center gap-2">
                <i class="fa-solid fa-user-plus text-slate-500" aria-hidden="true"></i>
                <span>Enable Lead Form</span>
            </label>
        </div>

        <x-input name="lead_heading" label="Lead Form Heading" icon="fa-solid fa-heading" :value="old('lead_heading', $p?->lead_heading)" />
        <x-input name="lead_subheading" label="Lead Form Subheading" icon="fa-solid fa-align-left" :value="old('lead_subheading', $p?->lead_subheading)" />
    </div>
</details>

<details class="group border border-slate-800 rounded-2xl p-4 bg-slate-950/40">
    <summary class="cursor-pointer text-white font-bold flex items-center gap-2">
        <i class="fa-solid fa-hashtag text-cyan-400"></i> Social Media
    </summary>
    <div class="mt-4 space-y-4">
        <x-input name="social_instagram" label="Instagram Handle" icon="fa-brands fa-instagram" :value="old('social_instagram', $p?->social_instagram)" />
        <x-input name="social_facebook" label="Facebook Handle" icon="fa-brands fa-facebook" :value="old('social_facebook', $p?->social_facebook)" />
        <x-input name="social_x" label="X (Twitter) Handle" icon="fa-brands fa-x-twitter" :value="old('social_x', $p?->social_x)" />
        <x-input name="social_linkedin" label="LinkedIn Handle" icon="fa-brands fa-linkedin" :value="old('social_linkedin', $p?->social_linkedin)" />
        <x-input name="social_tiktok" label="TikTok Handle" icon="fa-brands fa-tiktok" :value="old('social_tiktok', $p?->social_tiktok)" />
        <x-input name="social_youtube" label="YouTube Handle" icon="fa-brands fa-youtube" :value="old('social_youtube', $p?->social_youtube)" />
    </div>
</details>

<details class="group border border-slate-800 rounded-2xl p-4 bg-slate-950/40">
    <summary class="cursor-pointer text-white font-bold flex items-center gap-2">
        <i class="fa-solid fa-link text-cyan-400"></i> Links
    </summary>
    <div class="mt-4 space-y-2">
        @php $links = old('links', $p?->links ?? []); @endphp
        @for($i=0;$i<5;$i++)
            <div class="grid grid-cols-2 gap-2 mb-2">
                <input type="text" name="links[{{ $i }}][label]" value="{{ $links[$i]['label'] ?? '' }}" placeholder="Label" class="px-3 py-2 bg-slate-950 border border-slate-800 rounded-xl text-white text-sm">
                <input type="url" name="links[{{ $i }}][url]" value="{{ $links[$i]['url'] ?? '' }}" placeholder="https://..." class="px-3 py-2 bg-slate-950 border border-slate-800 rounded-xl text-white text-sm">
            </div>
        @endfor
    </div>
</details>

<div class="border-2 border-amber-400/60 bg-gradient-to-r from-amber-500/10 to-orange-500/10 rounded-2xl p-4 space-y-3">
    <div class="flex items-center justify-between">
        <h3 class="text-white font-bold flex items-center gap-2">
            <i class="fa-solid fa-bolt text-amber-400"></i> Instant Link
        </h3>
        <span class="text-[10px] font-extrabold uppercase tracking-wider px-2 py-1 rounded-full bg-amber-400 text-slate-950">Pro</span>
    </div>
    <p class="text-xs text-slate-300">When enabled, tapping this card redirects instantly to the URL below without showing the profile page.</p>
    <div class="flex items-center gap-2">
        <input type="checkbox" name="instant_link_enabled" value="1" {{ old('instant_link_enabled', $card?->instant_link_enabled) ? 'checked' : '' }} id="instant_link_enabled">
        <label for="instant_link_enabled" class="text-xs text-slate-300 flex items-center gap-2">
            <span>Enable Instant Link</span>
        </label>
    </div>
    <x-input name="instant_link_url" label="Instant Link URL" icon="fa-solid fa-bolt" type="url" :value="old('instant_link_url', $card?->instant_link_url)" />
</div>
