@extends('layouts.account')

@section('title', 'Create Card')

@section('content')
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-extrabold text-white mb-6 flex items-center gap-2">
            <i class="fa-solid fa-plus-circle text-cyan-400" aria-hidden="true"></i>
            <span>Create NFC Card</span>
        </h1>
        <form method="POST" action="{{ route('cards.store') }}" enctype="multipart/form-data" class="space-y-4 bg-slate-900 border border-slate-800 rounded-3xl p-6">
            @csrf
            @include('cards._form', ['card' => null])
            <button type="submit" class="w-full py-2.5 bg-gradient-to-r from-cyan-400 to-blue-500 text-slate-950 font-bold rounded-xl flex items-center justify-center gap-2">
                <i class="fa-solid fa-check" aria-hidden="true"></i>
                <span>Create</span>
            </button>
        </form>
    </div>
@endsection