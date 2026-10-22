@extends('layouts.account')

@section('title', 'Edit Profile')

@section('content')
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-extrabold text-white mb-6 flex items-center gap-2">
            <i class="fa-solid fa-user-pen text-cyan-400" aria-hidden="true"></i>
            <span>Edit Profile</span>
        </h1>

        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-4 bg-slate-900 border border-slate-800 rounded-3xl p-6">
            @csrf
            @method('PUT')

            <x-input name="name" label="Name" icon="fa-solid fa-user" :value="old('name', $user->name)" />
            <x-input name="display_name" label="Display Name" icon="fa-solid fa-id-card" :value="old('display_name', $user->display_name)" />
            <div class="grid grid-cols-2 gap-4">
                <x-input name="job_title" label="Job Title" icon="fa-solid fa-briefcase" :value="old('job_title', $user->job_title)" />
                <x-input name="company" label="Company" icon="fa-solid fa-building" :value="old('company', $user->company)" />
            </div>

            <div>
                <label for="bio" class="block text-xs text-slate-400 mb-1 flex items-center gap-2">
                    <i class="fa-solid fa-align-left text-slate-500" aria-hidden="true"></i>
                    <span>Bio</span>
                </label>
                <textarea id="bio" name="bio" rows="3" class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">{{ old('bio', $user->bio) }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <x-input name="phone" label="Phone" icon="fa-solid fa-phone" :value="old('phone', $user->phone)" />
                <x-input name="email" label="Email" icon="fa-solid fa-envelope" type="email" :value="old('email', $user->email)" />
            </div>

            <x-input name="website" label="Website" icon="fa-solid fa-globe" type="url" :value="old('website', $user->website)" />
            <x-input name="google_review_url" label="Google Review URL" icon="fa-solid fa-star" type="url" :value="old('google_review_url', $user->google_review_url)" />
            <x-input name="theme" label="Theme" icon="fa-solid fa-palette" :value="old('theme', $user->theme ?? 'default')" />

            <div>
                <label for="avatar" class="block text-xs text-slate-400 mb-1 flex items-center gap-2">
                    <i class="fa-solid fa-image text-slate-500" aria-hidden="true"></i>
                    <span>Avatar</span>
                </label>
                <input id="avatar" type="file" name="avatar" accept="image/*" class="w-full text-slate-300">
                @if($user->avatar_path)
                    <img src="{{ asset('storage/'.$user->avatar_path) }}" class="w-16 h-16 rounded-full mt-2 object-cover">
                @endif
            </div>

            <div>
                <label class="block text-xs text-slate-400 mb-2 flex items-center gap-2">
                    <i class="fa-solid fa-link text-slate-500" aria-hidden="true"></i>
                    <span>Links</span>
                </label>
                @php $links = old('links', $user->links ?? []); @endphp
                @for($i=0;$i<5;$i++)
                    <div class="grid grid-cols-2 gap-2 mb-2">
                        <input type="text" name="links[{{ $i }}][label]" value="{{ $links[$i]['label'] ?? '' }}" placeholder="Label" class="px-3 py-2 bg-slate-950 border border-slate-800 rounded-xl text-white text-sm">
                        <input type="url" name="links[{{ $i }}][url]" value="{{ $links[$i]['url'] ?? '' }}" placeholder="https://..." class="px-3 py-2 bg-slate-950 border border-slate-800 rounded-xl text-white text-sm">
                    </div>
                @endfor
            </div>

            <div class="border-t border-slate-800 pt-4">
                <p class="text-xs text-slate-400 mb-3">Leave password blank to keep current password.</p>
                <x-input name="password" label="New Password" icon="fa-solid fa-lock" type="password" />
                <x-input name="password_confirmation" label="Confirm Password" icon="fa-solid fa-lock" type="password" />
            </div>

            <button type="submit" class="w-full py-2.5 bg-gradient-to-r from-cyan-400 to-blue-500 text-slate-950 font-bold rounded-xl flex items-center justify-center gap-2">
                <i class="fa-solid fa-floppy-disk" aria-hidden="true"></i>
                <span>Save Profile</span>
            </button>
        </form>
    </div>
@endsection