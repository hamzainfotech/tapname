@extends('admin.layouts.app')
@section('title', 'Homepage Sections')
@section('content')
    <h1 class="text-2xl font-extrabold text-white mb-6">Homepage Sections</h1>
    <div class="glass-panel rounded-2xl overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-900/50 text-slate-400">
                <tr>
                    <th class="px-4 py-3 text-left">Order</th>
                    <th class="px-4 py-3 text-left">Key</th>
                    <th class="px-4 py-3 text-left">Title</th>
                    <th class="px-4 py-3 text-left">Active</th>
                    <th class="px-4 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800">
                @foreach($sections as $section)
                    <tr>
                        <td class="px-4 py-3 text-slate-300">{{ $section->sort_order }}</td>
                        <td class="px-4 py-3 text-white font-mono">{{ $section->key }}</td>
                        <td class="px-4 py-3 text-slate-300">{{ $section->title }}</td>
                        <td class="px-4 py-3 text-slate-300">{{ $section->is_active ? 'Yes' : 'No' }}</td>
                        <td class="px-4 py-3">
                            <a href="{{ route('admin.homepage.edit', $section) }}" class="text-cyan-400 hover:underline">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection