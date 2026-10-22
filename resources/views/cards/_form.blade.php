@php $p = $card?->profile; @endphp
<div>
    <label class="block text-xs text-slate-400 mb-1">Internal Label</label>
    <input type="text" name="label" value="{{ old('label', $card?->label) }}" class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">
</div>
@if($card)
<div class="flex items-center gap-2">
    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $card->is_active) ? 'checked' : '' }} id="is_active">
    <label for="is_active" class="text-xs text-slate-400">Active</label>
</div>
@endif
<div>
    <label class="block text-xs text-slate-400 mb-1">Display Name</label>
    <input type="text" name="display_name" value="{{ old('display_name', $p?->display_name) }}" class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">
</div>
<div>
    <label class="block text-xs text-slate-400 mb-1">Job Title</label>
    <input type="text" name="job_title" value="{{ old('job_title', $p?->job_title) }}" class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">
</div>
<div>
    <label class="block text-xs text-slate-400 mb-1">Company</label>
    <input type="text" name="company" value="{{ old('company', $p?->company) }}" class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">
</div>
<div>
    <label class="block text-xs text-slate-400 mb-1">Bio</label>
    <textarea name="bio" rows="3" class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">{{ old('bio', $p?->bio) }}</textarea>
</div>
<div class="grid grid-cols-2 gap-4">
    <div>
        <label class="block text-xs text-slate-400 mb-1">Phone</label>
        <input type="text" name="phone" value="{{ old('phone', $p?->phone) }}" class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">
    </div>
    <div>
        <label class="block text-xs text-slate-400 mb-1">Email</label>
        <input type="email" name="email" value="{{ old('email', $p?->email) }}" class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">
    </div>
</div>
<div>
    <label class="block text-xs text-slate-400 mb-1">Website</label>
    <input type="url" name="website" value="{{ old('website', $p?->website) }}" class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">
</div>
<div>
    <label class="block text-xs text-slate-400 mb-1">Google Review URL</label>
    <input type="url" name="google_review_url" value="{{ old('google_review_url', $p?->google_review_url) }}" class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">
</div>
<div>
    <label class="block text-xs text-slate-400 mb-1">Theme</label>
    <input type="text" name="theme" value="{{ old('theme', $p?->theme ?? 'default') }}" class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">
</div>
<div>
    <label class="block text-xs text-slate-400 mb-1">Avatar</label>
    <input type="file" name="avatar" accept="image/*" class="w-full text-slate-300">
    @if($p?->avatar_path)
        <img src="{{ asset('storage/'.$p->avatar_path) }}" class="w-16 h-16 rounded-full mt-2 object-cover">
    @endif
</div>
<div>
    <label class="block text-xs text-slate-400 mb-2">Links</label>
    @php $links = old('links', $p?->links ?? []); @endphp
    @for($i=0;$i<5;$i++)
        <div class="grid grid-cols-2 gap-2 mb-2">
            <input type="text" name="links[{{ $i }}][label]" value="{{ $links[$i]['label'] ?? '' }}" placeholder="Label" class="px-3 py-2 bg-slate-950 border border-slate-800 rounded-xl text-white text-sm">
            <input type="url" name="links[{{ $i }}][url]" value="{{ $links[$i]['url'] ?? '' }}" placeholder="https://..." class="px-3 py-2 bg-slate-950 border border-slate-800 rounded-xl text-white text-sm">
        </div>
    @endfor
</div>