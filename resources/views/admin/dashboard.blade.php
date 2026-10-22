@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1 class="text-3xl font-extrabold text-white mb-8">Dashboard</h1>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="glass-panel rounded-2xl p-6">
            <p class="text-slate-400 text-sm">Users</p>
            <p class="text-3xl font-bold text-white mt-2">{{ $userCount }}</p>
        </div>
        <div class="glass-panel rounded-2xl p-6">
            <p class="text-slate-400 text-sm">Admins</p>
            <p class="text-3xl font-bold text-white mt-2">{{ $adminCount }}</p>
        </div>
        <div class="glass-panel rounded-2xl p-6">
            <p class="text-slate-400 text-sm">Cards</p>
            <p class="text-3xl font-bold text-white mt-2">{{ $cardCount }}</p>
        </div>
        <div class="glass-panel rounded-2xl p-6">
            <p class="text-slate-400 text-sm">Total Taps</p>
            <p class="text-3xl font-bold text-white mt-2">{{ $tapCount }}</p>
        </div>
    </div>
@endsection