<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register — Tap.Name Account</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-slate-950 text-slate-100 p-6">
    <div class="w-full max-w-md bg-slate-900 border border-slate-800 rounded-3xl p-8">
        <h1 class="text-2xl font-extrabold text-white mb-6">Create account</h1>
        @if($errors->any())
            <div class="mb-4 text-red-400 text-sm">{{ $errors->first() }}</div>
        @endif
        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs text-slate-400 mb-1">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">
            </div>
            <div>
                <label class="block text-xs text-slate-400 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">
            </div>
            <div>
                <label class="block text-xs text-slate-400 mb-1">Password</label>
                <input type="password" name="password" required class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">
            </div>
            <div>
                <label class="block text-xs text-slate-400 mb-1">Confirm Password</label>
                <input type="password" name="password_confirmation" required class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">
            </div>
            <button type="submit" class="w-full py-2.5 bg-gradient-to-r from-cyan-400 to-blue-500 text-slate-950 font-bold rounded-xl">Register</button>
        </form>
        <p class="text-xs text-slate-500 mt-4">Already have an account? <a href="{{ route('login') }}" class="text-cyan-400">Log in</a></p>
    </div>
</body>
</html>