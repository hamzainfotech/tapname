@extends('admin.layouts.app')
@section('title', 'Admins')
@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-extrabold text-white">Admins</h1>
        <a href="{{ route('admin.admins.create') }}" class="px-4 py-2 bg-gradient-to-r from-cyan-400 to-blue-500 text-slate-950 font-bold rounded-xl text-sm">New Admin</a>
    </div>
    <div class="glass-panel rounded-2xl overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-900/50 text-slate-400">
                <tr>
                    <th class="px-4 py-3 text-left">Name</th>
                    <th class="px-4 py-3 text-left">Email</th>
                    <th class="px-4 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800">
                @foreach($admins as $admin)
                    <tr>
                        <td class="px-4 py-3 text-white">{{ $admin->name }}</td>
                        <td class="px-4 py-3 text-slate-300">{{ $admin->email }}</td>
                        <td class="px-4 py-3 space-x-2">
                            <a href="{{ route('admin.admins.edit', $admin) }}" class="text-cyan-400 hover:underline">Edit</a>
                            <form method="POST" action="{{ route('admin.admins.destroy', $admin) }}" class="inline" onsubmit="return confirm('Delete admin?')">
                                @csrf @method('DELETE')
                                <button class="text-red-400 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $admins->links() }}</div>
@endsection