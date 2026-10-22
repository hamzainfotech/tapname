@extends('layouts.account')

@section('title', 'Edit Card')

@section('content')
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-extrabold text-white mb-2 flex items-center gap-2">
            <i class="fa-solid fa-pen-to-square text-cyan-400" aria-hidden="true"></i>
            <span>Edit Card</span>
        </h1>
        <p class="text-xs text-slate-500 mb-6 font-mono">{{ $card->code }} · <a href="{{ route('card.show', $card->code) }}" target="_blank" class="text-cyan-400">View live</a></p>
        <form method="POST" action="{{ route('cards.update', $card) }}" enctype="multipart/form-data" class="space-y-4 bg-slate-900 border border-slate-800 rounded-3xl p-6">
            @csrf @method('PUT')
            @include('cards._form', ['card' => $card])
            <button type="submit" class="w-full py-2.5 bg-gradient-to-r from-cyan-400 to-blue-500 text-slate-950 font-bold rounded-xl flex items-center justify-center gap-2">
                <i class="fa-solid fa-floppy-disk" aria-hidden="true"></i>
                <span>Save</span>
            </button>
        </form>
    </div>
@endsection