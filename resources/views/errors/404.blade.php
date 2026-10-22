<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 — Card Not Found | Tap.Name</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>body{background:#0b0f19;color:#f3f4f6;}</style>
</head>
<body class="min-h-screen flex items-center justify-center p-6">
    <div class="w-full max-w-md text-center space-y-6">
        <div class="w-24 h-24 mx-auto rounded-full bg-slate-900 border border-slate-800 flex items-center justify-center text-4xl text-cyan-400">
            <i class="fa-solid fa-id-card-clip"></i>
        </div>
        <div>
            <h1 class="text-6xl font-extrabold text-white">404</h1>
            <p class="text-slate-400 mt-2">This card doesn't exist or is no longer active.</p>
        </div>
        <div class="flex gap-3 justify-center">
            <a href="{{ url('/') }}" class="px-5 py-2.5 bg-gradient-to-r from-cyan-400 to-blue-500 text-slate-950 font-bold rounded-xl">
                <i class="fa-solid fa-house mr-1"></i> Go Home
            </a>
            <a href="{{ route('login') }}" class="px-5 py-2.5 bg-slate-900 border border-slate-800 text-slate-200 font-semibold rounded-xl">
                <i class="fa-solid fa-right-to-bracket mr-1"></i> Log In
            </a>
        </div>
        <p class="text-[10px] text-slate-500">Powered by Tap.Name</p>
    </div>
</body>
</html>