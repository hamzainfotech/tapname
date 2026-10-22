<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $card->profile?->display_name ?? $card->label ?? 'Tap.Name Profile' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>body{background:#0b0f19;color:#f3f46;}</style>
</head>
<body class="min-h-screen flex items-center justify-center p-6">
    <div class="w-full max-w-md glass rounded-3xl p-8 border border-slate-800" style="background:rgba(17,24,39,.7);backdrop-filter:blur(16px);">
        @php $p = $card->profile; @endphp
        <div class="text-center space-y-3">
            @if($p?->avatar_path)
                <img src="{{ asset('storage/'.$p->avatar_path) }}" alt="Avatar" class="w-24 h-24 rounded-full mx-auto object-cover border-2 border-cyan-400">
            @else
                <div class="w-24 h-24 rounded-full mx-auto bg-slate-800 flex items-center justify-center text-3xl text-cyan-400">
                    <i class="fa-solid fa-user"></i>
                </div>
            @endif
            <h1 class="text-2xl font-extrabold text-white">{{ $p?->display_name ?? $card->label ?? 'Tap.Name' }}</h1>
            @if($p?->job_title)
                <p class="text-cyan-400 text-sm font-semibold">{{ $p->job_title }}</p>
            @endif
            @if($p?->company)
                <p class="text-slate-400 text-xs">{{ $p->company }}</p>
            @endif
            @if($p?->bio)
                <p class="text-slate-300 text-sm mt-4">{{ $p->bio }}</p>
            @endif
        </div>

        <div class="mt-6 space-y-3">
            @if($p?->phone)
                <a href="tel:{{ $p->phone }}" class="block w-full py-2.5 px-4 bg-slate-900 border border-slate-800 rounded-xl text-slate-200 font-medium flex items-center justify-between">
                    <span><i class="fa-solid fa-phone text-cyan-400 mr-2"></i> {{ $p->phone }}</span>
                    <i class="fa-solid fa-chevron-right text-xs"></i>
                </a>
            @endif
            @if($p?->email)
                <a href="mailto:{{ $p->email }}" class="block w-full py-2.5 px-4 bg-slate-900 border border-slate-800 rounded-xl text-slate-200 font-medium flex items-center justify-between">
                    <span><i class="fa-solid fa-envelope text-cyan-400 mr-2"></i> {{ $p->email }}</span>
                    <i class="fa-solid fa-chevron-right text-xs"></i>
                </a>
            @endif
            @if($p?->website)
                <a href="{{ $p->website }}" target="_blank" class="block w-full py-2.5 px-4 bg-slate-900 border border-slate-800 rounded-xl text-slate-200 font-medium flex items-center justify-between">
                    <span><i class="fa-solid fa-globe text-cyan-400 mr-2"></i> Website</span>
                    <i class="fa-solid fa-arrow-up-right-from-square text-xs"></i>
                </a>
            @endif
            @foreach($p?->links ?? [] as $link)
                <a href="{{ $link['url'] }}" target="_blank" class="block w-full py-2.5 px-4 bg-slate-900 border border-slate-800 rounded-xl text-slate-200 font-medium flex items-center justify-between">
                    <span><i class="fa-solid fa-link text-cyan-400 mr-2"></i> {{ $link['label'] ?? 'Link' }}</span>
                    <i class="fa-solid fa-arrow-up-right-from-square text-xs"></i>
                </a>
            @endforeach
            @if($p?->google_review_url)
                <a href="{{ $p->google_review_url }}" target="_blank" class="block w-full py-2.5 px-4 bg-amber-500/10 border border-amber-500/30 rounded-xl text-amber-300 font-semibold flex items-center justify-between">
                    <span><i class="fa-solid fa-star text-amber-400 mr-2"></i> Leave Google Review</span>
                    <i class="fa-solid fa-chevron-right text-xs"></i>
                </a>
            @endif
        </div>

        <div class="mt-6 flex gap-3">
            <a href="{{ route('card.vcard', $card->code) }}" class="flex-1 text-center py-2.5 bg-gradient-to-r from-cyan-400 to-blue-500 text-slate-950 font-bold text-xs rounded-xl">
                <i class="fa-solid fa-download mr-1"></i> Save Contact
            </a>
        </div>

        @if($card->leads_enabled)
        <div class="mt-6 border-t border-slate-800 pt-6">
            <h2 class="text-white font-bold mb-3">Send a message</h2>
            @if(session('status'))
                <div class="mb-3 p-3 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-300 text-sm">{{ session('status') }}</div>
            @endif
            <form method="POST" action="{{ route('card.lead', $card->code) }}" class="space-y-3">
                @csrf
                <input type="text" name="name" placeholder="Your name" class="w-full px-4 py-2.5 bg-slate-900 border border-slate-800 rounded-xl text-white text-sm" value="{{ old('name') }}">
                <input type="email" name="email" placeholder="Your email" class="w-full px-4 py-2.5 bg-slate-900 border border-slate-800 rounded-xl text-white text-sm" value="{{ old('email') }}">
                <input type="text" name="phone" placeholder="Your phone" class="w-full px-4 py-2.5 bg-slate-900 border border-slate-800 rounded-xl text-white text-sm" value="{{ old('phone') }}">
                <textarea name="message" rows="3" placeholder="Message" class="w-full px-4 py-2.5 bg-slate-900 border border-slate-800 rounded-xl text-white text-sm">{{ old('message') }}</textarea>
                <button type="submit" class="w-full py-2.5 bg-gradient-to-r from-cyan-400 to-blue-500 text-slate-950 font-bold text-sm rounded-xl">
                    <i class="fa-solid fa-paper-plane mr-1"></i> Send Message
                </button>
            </form>
        </div>
        @endif
    </div>
    <p class="text-center text-[10px] text-slate-500 mt-6">Powered by Tap.Name</p>
</body>
</html>