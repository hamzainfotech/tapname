<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Card — Tap.Name</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-950 text-slate-100 p-6">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-extrabold text-white mb-2">Edit Card</h1>
        <p class="text-xs text-slate-500 mb-6 font-mono">{{ $card->code }} · <a href="{{ route('card.show', $card->code) }}" target="_blank" class="text-cyan-400">View live</a></p>
        <form method="POST" action="{{ route('cards.update', $card) }}" enctype="multipart/form-data" class="space-y-4 bg-slate-900 border border-slate-800 rounded-3xl p-6">
            @csrf @method('PUT')
            @include('cards._form', ['card' => $card])
            <button type="submit" class="w-full py-2.5 bg-gradient-to-r from-cyan-400 to-blue-500 text-slate-950 font-bold rounded-xl">Save</button>
        </form>
        <p class="mt-4"><a href="{{ route('dashboard') }}" class="text-cyan-400 text-xs">Back</a></p>
    </div>
</body>
</html>