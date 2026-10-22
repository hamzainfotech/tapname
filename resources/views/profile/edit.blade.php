@extends('layouts.account')

@section('title', 'Edit Profile')

@section('content')
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-extrabold text-white mb-6 flex items-center gap-2">
            <i class="fa-solid fa-user-pen text-cyan-400" aria-hidden="true"></i>
            <span>Edit Profile</span>
        </h1>

        <form method="POST" action="{{ route('profile.update') }}" class="space-y-4 bg-slate-900 border border-slate-800 rounded-3xl p-6">
            @csrf
            @method('PUT')

            <x-input name="name" label="Name" icon="fa-solid fa-user" :value="old('name', $user->name)" />
            <x-input name="email" label="Email" icon="fa-solid fa-envelope" type="email" :value="old('email', $user->email)" />

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