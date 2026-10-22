@extends('admin.layouts.app')
@section('title', 'Edit User')
@section('content')
    <h1 class="text-2xl font-extrabold text-white mb-6">Edit User</h1>
    <form method="POST" action="{{ route('admin.users.update', $user) }}" class="glass-panel rounded-2xl p-6 space-y-4 max-w-xl">
        @csrf @method('PUT')
        <div>
            <label class="block text-xs text-slate-400 mb-1">Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">
        </div>
        <div>
            <label class="block text-xs text-slate-400 mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">
        </div>
        <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-cyan-400 to-blue-500 text-slate-950 font-bold rounded-xl">Save</button>
    </form>
@endsection