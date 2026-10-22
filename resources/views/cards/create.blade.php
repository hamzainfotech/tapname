<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Card — Tap.Name</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-950 text-slate-100 p-6">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-extrabold text-white mb-6">Create NFC Card</h1>
        <form method="POST" action="{{ route('cards.store') }}" enctype="multipart/form-data" class="space-y-4 bg-slate-900 border border-slate-800 rounded-3xl p-6">
            @csrf
            @include('cards._form', ['card' => null])
            <button type="submit" class="w-full py-2.5 bg-gradient-to-r from-cyan-400 to-blue-500 text-slate-950 font-bold rounded-xl">Create</button>
        </form>
        <p class="mt-4"><a href="{{ route('dashboard') }}" class="text-cyan-400 text-xs">Back</a></p>
    </div>
</body>
</html>