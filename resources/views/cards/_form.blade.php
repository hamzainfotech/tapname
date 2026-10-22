@php $p = $card?->profile; @endphp

<x-input name="label" label="Internal Label" icon="fa-solid fa-tag" :value="$card?->label" />

@if($card)
<div class="flex items-center gap-2">
    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $card->is_active) ? 'checked' : '' }} id="is_active">
    <label for="is_active" class="text-xs text-slate-400 flex items-center gap-2">
        <i class="fa-solid fa-toggle-on text-slate-500" aria-hidden="true"></i>
        <span>Active</span>
    </label>
</div>
@endif

<x-input name="display_name" label="Display Name" icon="fa-solid fa-user" :value="$p?->display_name" />
<x-input name="job_title" label="Job Title" icon="fa-solid fa-briefcase" :value="$p?->job_title" />
<x-input name="company" label="Company" icon="fa-solid fa-building" :value="$p?->company" />

<div>
    <label for="bio" class="block text-xs text-slate-400 mb-1 flex items-center gap-2">
        <i class="fa-solid fa-align-left text-slate-500" aria-hidden="true"></i>
        <span>Bio</span>
    </label>
    <textarea id="bio" name="bio" rows="3" class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">{{ old('bio', $p?->bio) }}</textarea>
</div>

<div class="grid grid-cols-2 gap-4">
    <x-input name="phone" label="Phone" icon="fa-solid fa-phone" :value="$p?->phone" />
    <x-input name="email" label="Email" icon="fa-solid fa-envelope" type="email" :value="$p?->email" />
</div>

<x-input name="website" label="Website" icon="fa-solid fa-globe" type="url" :value="$p?->website" />
<x-input name="google_review_url" label="Google Review URL" icon="fa-solid fa-star" type="url" :value="$p?->google_review_url" />
<x-input name="theme" label="Theme" icon="fa-solid fa-palette" :value="$p?->theme ?? 'default'" />

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

<div>
    <label class="block text-xs text-slate-400 mb-2 flex items-center gap-2">
        <i class="fa-solid fa-link text-slate-500" aria-hidden="true"></i>
        <span>Links</span>
    </label>
    @php $links = old('links', $p?->links ?? []); @endphp
    @for($i=0;$i<5;$i++)
        <div class="grid grid-cols-2 gap-2 mb-2">
            <input type="text" name="links[{{ $i }}][label]" value="{{ $links[$i]['label'] ?? '' }}" placeholder="Label" class="px-3 py-2 bg-slate-950 border border-slate-800 rounded-xl text-white text-sm">
            <input type="url" name="links[{{ $i }}][url]" value="{{ $links[$i]['url'] ?? '' }}" placeholder="https://..." class="px-3 py-2 bg-slate-950 border border-slate-800 rounded-xl text-white text-sm">
        </div>
    @endfor
</div>