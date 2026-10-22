@extends('admin.layouts.app')
@section('title', 'Users')
@section('content')
    <h1 class="text-2xl font-extrabold text-white mb-6">Users</h1>
    <div class="glass-panel rounded-2xl overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-900/50 text-slate-400">
                <tr>
                    <th class="px-4 py-3 text-left">ID</th>
                    <th class="px-4 py-3 text-left">Name</th>
                    <th class="px-4 py-3 text-left">Email</th>
                    <th class="px-4 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800">
                @foreach($users as $user)
                    <tr>
                        <td class="px-4 py-3 text-slate-300">{{ $user->id }}</td>
                        <td class="px-4 py-3 text-white">{{ $user->name }}</td>
                        <td class="px-4 py-3 text-slate-300">{{ $user->email }}</td>
                        <td class="px-4 py-3 space-x-2">
                            <a href="{{ route('admin.users.edit', $user) }}" class="text-cyan-400 hover:underline">Edit</a>
                            <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="inline" onsubmit="return confirm('Delete user?')">
                                @csrf @method('DELETE')
                                <button class="text-red-400 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $users->links() }}</div>
@endsection