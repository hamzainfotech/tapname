<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Primary Meta Tags -->
    <title>TAP.NAME — Identity, Just a Tap Away | NFC Business Cards & Google Review Stands</title>
    <meta name="title" content="TAP.NAME — Identity, Just a Tap Away | NFC Business Cards & Google Review Stands">
    <meta name="description" content="Next-gen NFC digital business cards, anti-metal phone stickers, epoxy keychains, and table stands in Hong Kong. Share contacts, social links, and drive 5-star Google reviews instantly. Zero app needed.">
    <meta name="keywords" content="NFC business cards Hong Kong, digital business card HK, Google review NFC stand, NFC phone sticker, Tap.Name, smart business card, contactless networking, NTAG216">
    <meta name="author" content="Hamza Pervaiz">
    <meta name="robots" content="index, follow">
    <meta name="language" content="English">
    <meta name="geo.region" content="HK">
    <meta name="geo.placename" content="Hong Kong">

    <!-- Open Graph / Facebook / LinkedIn / WhatsApp -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://tap.name/">
    <meta property="og:title" content="TAP.NAME — Identity, Just a Tap Away">
    <meta property="og:description" content="Upgrade your networking and F&B business reviews with custom NFC hardware in Hong Kong. Order sample packs and bulk orders today.">
    <meta property="og:image" content="https://tap.name/tapnamelogo.png">

    <!-- Twitter Card -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://tap.name/">
    <meta property="twitter:title" content="TAP.NAME — Identity, Just a Tap Away">
    <meta property="twitter:description" content="Next-gen NFC digital business cards and review redirect hardware in Hong Kong.">
    <meta property="twitter:image" content="https://tap.name/tapnamelogo.png">

    <!-- Favicon / Website Icons -->
    <link rel="icon" type="image/png" href="tapnamelogowhite.png">
    <link rel="apple-touch-icon" href="tapnamelogo.png">
    
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        darkBg: '#0b0f19',
                        darkCard: 'rgba(17, 24, 39, 0.7)',
                        brandCyan: '#00f2fe',
                        brandBlue: '#4facfe',
                        brandAccent: '#3b82f6',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    boxShadow: {
                        'neon-glow': '0 0 25px -5px rgba(0, 242, 254, 0.4)',
                        'neon-card': '0 8px 32px 0 rgba(0, 0, 0, 0.37)',
                    }
                }
            }
        }
    </script>
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts Inter -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0b0f19;
            color: #f3f4f6;
            overflow-x: hidden;
        }
        /* Custom Glassmorphism Effect */
        .glass-panel {
            background: rgba(17, 24, 39, 0.65);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        .glass-nav {
            background: rgba(11, 15, 25, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        /* Gradient Text */
        .text-gradient {
            background: linear-gradient(135deg, #00f2fe 0%, #4facfe 50%, #3b82f6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .bg-gradient-brand {
            background: linear-gradient(135deg, #00f2fe 0%, #3b82f6 100%);
        }
        /* Mouse Interactive Canvas Background */
        #nfcCanvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            pointer-events: none;
            z-index: 0;
        }
        /* Phone Mockup Animations */
        @keyframes nfcPulse {
            0% { transform: scale(0.98); box-shadow: 0 0 0 0 rgba(0, 242, 254, 0.7); }
            70% { transform: scale(1.02); box-shadow: 0 0 0 20px rgba(0, 242, 254, 0); }
            100% { transform: scale(0.98); box-shadow: 0 0 0 0 rgba(0, 242, 254, 0); }
        }
        .nfc-tap-pulse {
            animation: nfcPulse 2s infinite;
        }
        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #0b0f19;
        }
        ::-webkit-scrollbar-thumb {
            background: #1f2937;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #374151;
        }
    </style>
</head>
<body class="antialiased selection:bg-cyan-500 selection:text-white relative">

    <!-- Dynamic Mouse Responsive NFC Canvas Background -->
    <canvas id="nfcCanvas"></canvas>

    <!-- NAVBAR -->
    <header class="fixed top-0 left-0 right-0 z-50 glass-nav transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <!-- Brand Logo -->
            <a href="https://tap.name/" class="flex items-center gap-3 group relative z-10">
                <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center shadow-lg shadow-cyan-500/20 group-hover:scale-105 transition-transform overflow-hidden p-1.5">
                    <img src="tapnamelogo.png" alt="Tap.Name Logo" class="w-full h-full object-contain">
                </div>
                <div class="flex flex-col">
                    <span class="text-xl font-extrabold tracking-wider text-white">TAP<span class="text-cyan-400">.NAME</span></span>
                    <span class="text-[10px] tracking-widest text-slate-400 uppercase -mt-1 font-medium">Hong Kong</span>
                </div>
            </a>

            <!-- Desktop Nav Items -->
            <nav class="hidden md:flex items-center gap-8 text-sm font-medium text-slate-300 relative z-10">
                <a href="#products" class="hover:text-cyan-400 transition-colors">Hardware Line</a>
                <a href="#solutions" class="hover:text-cyan-400 transition-colors">Solutions</a>
                <a href="#advantages" class="hover:text-cyan-400 transition-colors">Why Tap.Name</a>
                <a href="#specs" class="hover:text-cyan-400 transition-colors">Technology</a>
                <a href="#inquiry" class="hover:text-cyan-400 transition-colors">Order & Inquiry</a>
            </nav>

            <!-- CTA & Mobile Toggle -->
            <div class="flex items-center gap-4 relative z-10">
                <a href="#inquiry" class="hidden sm:inline-flex items-center justify-center px-5 py-2.5 text-xs font-bold uppercase tracking-wider text-slate-950 bg-gradient-brand rounded-full hover:shadow-neon-glow hover:scale-105 transition-all">
                    Request Sample
                </a>
                <button id="mobileMenuBtn" class="md:hidden text-slate-300 hover:text-white focus:outline-none p-2">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Drawer -->
        <div id="mobileMenu" class="hidden md:hidden glass-panel border-t border-slate-800 px-6 py-6 flex flex-col gap-4 text-slate-200">
            <a href="#products" class="mobile-link text-lg font-medium hover:text-cyan-400">Hardware Line</a>
            <a href="#solutions" class="mobile-link text-lg font-medium hover:text-cyan-400">Solutions</a>
            <a href="#advantages" class="mobile-link text-lg font-medium hover:text-cyan-400">Why Tap.Name</a>
            <a href="#specs" class="mobile-link text-lg font-medium hover:text-cyan-400">Technology</a>
            <a href="#inquiry" class="mobile-link text-lg font-medium hover:text-cyan-400">Order & Inquiry</a>
            <a href="#inquiry" class="mobile-link mt-2 w-full text-center py-3 font-bold text-slate-950 bg-gradient-brand rounded-xl">Request Sample</a>
        </div>
    </header>

    <!-- HERO SECTION -->
    <section class="relative pt-32 pb-20 md:pt-44 md:pb-32 overflow-hidden z-10">
        <!-- Ambient Glowing Background Orbs -->
        <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-cyan-500/10 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute top-1/3 right-10 w-[400px] h-[400px] bg-blue-600/10 rounded-full blur-[100px] pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
                
                <!-- Left Hero Text -->
                <div class="lg:col-span-7 text-center lg:text-left space-y-6">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full glass-panel border border-cyan-500/30 text-cyan-300 text-xs font-semibold tracking-wide uppercase">
                        <span class="w-2 h-2 rounded-full bg-cyan-400 animate-ping"></span>
                        Next-Gen Hong Kong NFC Tech Startup
                    </div>
                    
                    <h1 class="text-4xl sm:text-6xl lg:text-7xl font-extrabold tracking-tight text-white leading-tight">
                        {{ $sections->firstWhere('key','hero')->title ?? 'Identity, Just a Tap Away.' }}
                    </h1>
                    
                    <p class="text-lg sm:text-xl text-slate-300 max-w-2xl mx-auto lg:mx-0 font-light leading-relaxed">
                        {{ $sections->firstWhere('key','hero')->subtitle ?? 'Replace outdated paper cards and friction-filled forms. Tap.Name delivers high-impact NFC business cards, social stickers, and instant Google Review redirect hardware. Zero app download required.' }}
                    </p>

                    <!-- Feature Badges with Vector Icons -->
                    <div class="flex flex-wrap justify-center lg:justify-start gap-4 text-xs font-semibold text-slate-400 pt-2">
                        <span class="flex items-center gap-2 glass-panel px-3 py-1.5 rounded-lg border-slate-800"><i class="fa-solid fa-bolt text-cyan-400"></i> Instant 1-Sec Sync</span>
                        <span class="flex items-center gap-2 glass-panel px-3 py-1.5 rounded-lg border-slate-800"><i class="fa-brands fa-apple text-slate-200"></i> iOS & Android Native</span>
                        <span class="flex items-center gap-2 glass-panel px-3 py-1.5 rounded-lg border-slate-800"><i class="fa-solid fa-shield-halved text-blue-400"></i> Anti-Metal Tech</span>
                    </div>

                    <!-- Call To Action Buttons -->
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-4">
                        <a href="{{ $sections->firstWhere('key','hero')->button_url ?? '#inquiry' }}" class="w-full sm:w-auto px-8 py-4 text-sm font-bold text-slate-950 bg-gradient-brand rounded-2xl shadow-neon-glow hover:scale-105 transition-all text-center">
                            {{ $sections->firstWhere('key','hero')->button_text ?? 'Order Sample Pack' }}
                        </a>
                        <button onclick="triggerDemo()" class="w-full sm:w-auto px-8 py-4 text-sm font-bold text-white glass-panel hover:bg-slate-800/80 rounded-2xl border border-slate-700 hover:border-cyan-500/50 transition-all flex items-center justify-center gap-3">
                            <i class="fa-solid fa-mobile-screen text-cyan-400"></i> Test Live NFC Demo
                        </button>
                    </div>
                </div>

                <!-- Right Hero Interactive Phone Simulator -->
                <div class="lg:col-span-5 flex justify-center relative">
                    <div class="relative w-[300px] sm:w-[320px] h-[610px] bg-slate-950 rounded-[48px] p-4 border-4 border-slate-800 shadow-2xl shadow-cyan-950/50 flex flex-col justify-between">
                        <!-- Top Notch -->
                        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-32 h-5 bg-slate-800 rounded-b-2xl z-30"></div>
                        
                        <!-- Dynamic Screen Container -->
                        <div id="phoneScreen" class="w-full h-full bg-slate-900 rounded-[36px] overflow-hidden relative flex flex-col transition-all duration-500">
                            
                            <!-- Idle State Screen -->
                            <div id="screenIdle" class="absolute inset-0 flex flex-col items-center justify-center p-6 text-center space-y-6">
                                <div class="w-20 h-20 rounded-full bg-cyan-500/10 border border-cyan-500/30 flex items-center justify-center text-cyan-400 text-3xl nfc-tap-pulse">
                                    <i class="fa-solid fa-hand-pointer"></i>
                                </div>
                                <div>
                                    <h3 class="text-white font-bold text-lg">Interactive NFC Demo</h3>
                                    <p class="text-xs text-slate-400 mt-1">Click the NFC Card below to simulate tapping a phone</p>
                                </div>
                                <!-- Vector Illustration Badge -->
                                <div class="p-3 bg-slate-950/60 rounded-2xl border border-slate-800 flex items-center gap-3 text-left">
                                    <svg class="w-8 h-8 text-cyan-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.288 15.038a5.25 5.25 0 017.424 0M5.106 11.856c3.807-3.808 9.98-3.808 13.788 0M1.924 8.674c5.565-5.565 14.587-5.565 20.152 0M12.53 18.22l-.53.53-.53-.53a.75.75 0 011.06 0z"/></svg>
                                    <div class="text-[11px]">
                                        <p class="text-white font-semibold">NTAG216 Chip Active</p>
                                        <p class="text-slate-400">13.56 MHz RF Protocol</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Tapped State Screen (Simulated Profile) -->
                            <div id="screenProfile" class="absolute inset-0 bg-slate-950 flex flex-col p-5 opacity-0 pointer-events-none transition-all duration-500 overflow-y-auto">
                                <!-- Banner & Avatar -->
                                <div class="relative w-full h-24 bg-gradient-brand rounded-2xl mb-8 flex-shrink-0">
                                    <div class="absolute -bottom-6 left-1/2 -translate-x-1/2 w-16 h-16 rounded-full border-2 border-slate-950 bg-slate-800 flex items-center justify-center text-white font-bold text-xl overflow-hidden shadow-lg">
                                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=200&q=80" alt="Profile" class="w-full h-full object-cover">
                                    </div>
                                </div>

                                <!-- User Info -->
                                <div class="text-center space-y-1 mb-4">
                                    <h4 class="text-white font-bold text-base">Sarah Wong</h4>
                                    <p class="text-[11px] text-cyan-400 font-medium">Managing Director @ HK Tech</p>
                                    <p class="text-[10px] text-slate-400">Central, Hong Kong</p>
                                </div>

                                <!-- Action Buttons -->
                                <div class="space-y-2 text-xs">
                                    <a href="#" class="w-full py-2.5 px-3 bg-cyan-500/10 border border-cyan-500/30 rounded-xl text-cyan-300 font-medium flex items-center justify-between">
                                        <span><i class="fa-solid fa-address-book text-cyan-400 mr-2"></i> Save Contact (.vcf)</span>
                                        <i class="fa-solid fa-download text-xs"></i>
                                    </a>
                                    <a href="#" class="w-full py-2.5 px-3 bg-slate-900 border border-slate-800 rounded-xl text-slate-200 font-medium flex items-center justify-between">
                                        <span><i class="fa-brands fa-linkedin text-blue-400 mr-2"></i> LinkedIn Profile</span>
                                        <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                                    </a>
                                    <a href="#" class="w-full py-2.5 px-3 bg-slate-900 border border-slate-800 rounded-xl text-slate-200 font-medium flex items-center justify-between">
                                        <span><i class="fa-brands fa-whatsapp text-emerald-400 mr-2"></i> Direct WhatsApp</span>
                                        <i class="fa-solid fa-comment text-[10px]"></i>
                                    </a>
                                    <a href="#" class="w-full py-2.5 px-3 bg-amber-500/10 border border-amber-500/30 rounded-xl text-amber-300 font-semibold flex items-center justify-between">
                                        <span><i class="fa-solid fa-star text-amber-400 mr-2"></i> Leave Google Review</span>
                                        <i class="fa-solid fa-chevron-right text-[10px]"></i>
                                    </a>
                                </div>

                                <button onclick="resetDemo()" class="mt-4 text-[10px] text-slate-500 underline text-center w-full">Reset Demo</button>
                            </div>
                        </div>

                        <!-- Simulated NFC Card Trigger Button at bottom of phone -->
                        <div class="pt-3">
                            <button id="nfcCardBtn" onclick="triggerDemo()" class="w-full py-3 bg-gradient-brand text-slate-950 font-extrabold text-xs rounded-2xl shadow-lg flex items-center justify-center gap-2 hover:opacity-90 transition-opacity">
                                <i class="fa-solid fa-wifi rotate-90"></i> TAP CARD HERE TO DEMO
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- HARDWARE PRODUCT SHOWCASE -->
    <section id="products" class="scroll-mt-20 py-24 relative border-t border-slate-800/80 bg-slate-950/50 z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
                <span class="text-cyan-400 font-bold text-xs uppercase tracking-widest flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    Product Catalog
                </span>
                <h2 class="text-3xl sm:text-5xl font-extrabold text-white">{{ $sections->firstWhere('key','products')->title ?? 'Hardware Built For Impact' }}</h2>
                <p class="text-slate-400 text-sm sm:text-base">{{ $sections->firstWhere('key','products')->subtitle ?? 'Custom-engineered NFC form factors tailored for executive networking, fast social sharing, and high-footfall F&B table engagement.' }}</p>
            </div>

            <!-- Product Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                
                <!-- Product 1: PVC / Metal Cards -->
                <div class="glass-panel rounded-3xl p-6 flex flex-col justify-between hover:border-cyan-500/50 transition-all group">
                    <div>
                        <div class="relative w-full h-48 rounded-2xl overflow-hidden mb-6 bg-slate-900 border border-slate-800 flex items-center justify-center">
                            <img src="https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?auto=format&fit=crop&w=600&q=80" alt="NFC Business Card" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <span class="absolute top-3 left-3 bg-slate-950/80 border border-slate-700 text-cyan-300 text-[10px] font-bold px-2.5 py-1 rounded-full">NTAG215 / 216</span>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Smart NFC Cards</h3>
                        <p class="text-xs text-slate-400 leading-relaxed mb-4">Matte PVC, Eco-Wood, or Brushed Stainless Steel. Lifetime contact sharing for executives and sales leaders.</p>
                    </div>
                    <ul class="text-[11px] text-slate-300 space-y-2 border-t border-slate-800 pt-4 mb-6">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-cyan-400"></i> ISO/IEC 7810 ID-1 Standard</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-cyan-400"></i> Full Matte / Gold / Anodized Finish</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-cyan-400"></i> Re-writeable & Lockable</li>
                    </ul>
                    <a href="#inquiry" class="w-full py-2.5 text-center bg-slate-800 hover:bg-cyan-500 text-white hover:text-slate-950 text-xs font-bold rounded-xl transition-all">Inquire Product A</a>
                </div>

                <!-- Product 2: Anti-Metal Phone Stickers -->
                <div class="glass-panel rounded-3xl p-6 flex flex-col justify-between hover:border-cyan-500/50 transition-all group">
                    <div>
                        <div class="relative w-full h-48 rounded-2xl overflow-hidden mb-6 bg-slate-900 border border-slate-800 flex items-center justify-center">
                            <img src="https://images.unsplash.com/photo-1512499617640-c74ae3a79d37?auto=format&fit=crop&w=600&q=80" alt="NFC Phone Sticker" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <span class="absolute top-3 left-3 bg-slate-950/80 border border-slate-700 text-cyan-300 text-[10px] font-bold px-2.5 py-1 rounded-full">Anti-Metal Shield</span>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Phone Case Stickers</h3>
                        <p class="text-xs text-slate-400 leading-relaxed mb-4">Sleek, low-profile stickers with ferrite shielding layer for zero signal interference on iPhone & Android phone backs.</p>
                    </div>
                    <ul class="text-[11px] text-slate-300 space-y-2 border-t border-slate-800 pt-4 mb-6">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-cyan-400"></i> 30mm Diameter / 3M Adhesive</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-cyan-400"></i> Built-in Ferrite Anti-Interference</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-cyan-400"></i> Waterproof Epoxy Surface</li>
                    </ul>
                    <a href="#inquiry" class="w-full py-2.5 text-center bg-slate-800 hover:bg-cyan-500 text-white hover:text-slate-950 text-xs font-bold rounded-xl transition-all">Inquire Product B</a>
                </div>

                <!-- Product 3: Epoxy Keychain Tags -->
                <div class="glass-panel rounded-3xl p-6 flex flex-col justify-between hover:border-cyan-500/50 transition-all group">
                    <div>
                        <div class="relative w-full h-48 rounded-2xl overflow-hidden mb-6 bg-slate-900 border border-slate-800 flex items-center justify-center">
                            <img src="https://images.unsplash.com/photo-1607604276583-eef5d076aa5f?auto=format&fit=crop&w=600&q=80" alt="NFC Keychain Tag" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <span class="absolute top-3 left-3 bg-slate-950/80 border border-slate-700 text-cyan-300 text-[10px] font-bold px-2.5 py-1 rounded-full">IP67 Waterproof</span>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Epoxy Keychain Tags</h3>
                        <p class="text-xs text-slate-400 leading-relaxed mb-4">Ultra-durable, scratch-resistant keychains perfect for nightlife lovers, creators, and field staff on the move.</p>
                    </div>
                    <ul class="text-[11px] text-slate-300 space-y-2 border-t border-slate-800 pt-4 mb-6">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-cyan-400"></i> Stainless Steel Split Ring</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-cyan-400"></i> Glossy Crystal Epoxy Dome</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-cyan-400"></i> High RF Read Distance</li>
                    </ul>
                    <a href="#inquiry" class="w-full py-2.5 text-center bg-slate-800 hover:bg-cyan-500 text-white hover:text-slate-950 text-xs font-bold rounded-xl transition-all">Inquire Product C</a>
                </div>

                <!-- Product 4: Table Displays / Stands -->
                <div class="glass-panel rounded-3xl p-6 flex flex-col justify-between hover:border-cyan-500/50 transition-all group">
                    <div>
                        <div class="relative w-full h-48 rounded-2xl overflow-hidden mb-6 bg-slate-900 border border-slate-800 flex items-center justify-center">
                            <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=600&q=80" alt="NFC Table Stand" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <span class="absolute top-3 left-3 bg-slate-950/80 border border-slate-700 text-amber-400 text-[10px] font-bold px-2.5 py-1 rounded-full">Google Review Boost</span>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Acrylic Table Stands</h3>
                        <p class="text-xs text-slate-400 leading-relaxed mb-4">Heavy-duty acrylic or wooden tent displays engineered for restaurants, bars, and salons to drive 5-star Google reviews.</p>
                    </div>
                    <ul class="text-[11px] text-slate-300 space-y-2 border-t border-slate-800 pt-4 mb-6">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-cyan-400"></i> UV Printed Brand Artwork</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-cyan-400"></i> Dual NFC + QR Backup Code</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-cyan-400"></i> Spill & Wipe Resistant</li>
                    </ul>
                    <a href="#inquiry" class="w-full py-2.5 text-center bg-slate-800 hover:bg-cyan-500 text-white hover:text-slate-950 text-xs font-bold rounded-xl transition-all">Inquire Product D</a>
                </div>

            </div>
        </div>
    </section>

    <!-- TARGET CUSTOMER SOLUTIONS -->
    <section id="solutions" class="scroll-mt-20 py-24 relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
                <span class="text-cyan-400 font-bold text-xs uppercase tracking-widest">Industry Solutions</span>
                <h2 class="text-3xl sm:text-5xl font-extrabold text-white">{{ $sections->firstWhere('key','solutions')->title ?? 'Tailored For Every Segment' }}</h2>
                <p class="text-slate-400 text-sm sm:text-base">{{ $sections->firstWhere('key','solutions')->subtitle ?? 'Discover how Tap.Name replaces friction points across Hong Kong\'s most competitive industries.' }}</p>
            </div>

            <!-- Tab Navigation Buttons -->
            <div class="flex justify-center gap-3 mb-12 flex-wrap">
                <button onclick="switchTab('tab-corporate')" id="btn-corporate" class="tab-btn active px-6 py-3 rounded-2xl font-bold text-xs border border-cyan-500/50 bg-cyan-500/10 text-cyan-300 transition-all">
                    <i class="fa-solid fa-briefcase mr-2"></i> Corporate & B2B
                </button>
                <button onclick="switchTab('tab-social')" id="btn-social" class="tab-btn px-6 py-3 rounded-2xl font-bold text-xs border border-slate-800 glass-panel text-slate-400 hover:text-white transition-all">
                    <i class="fa-solid fa-icons mr-2"></i> Nightlife & Social
                </button>
                <button onclick="switchTab('tab-fnb')" id="btn-fnb" class="tab-btn px-6 py-3 rounded-2xl font-bold text-xs border border-slate-800 glass-panel text-slate-400 hover:text-white transition-all">
                    <i class="fa-solid fa-utensils mr-2"></i> F&B & Hospitality
                </button>
            </div>

            <!-- Tab Contents -->
            <div class="glass-panel p-8 sm:p-12 rounded-3xl border border-slate-800">
                
                <!-- Tab 1: Corporate -->
                <div id="tab-corporate" class="tab-content grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    <div class="lg:col-span-7 space-y-4">
                        <span class="text-xs font-bold text-cyan-400 uppercase tracking-wider">For Wealth Managers, Consultants & Executives</span>
                        <h3 class="text-2xl sm:text-3xl font-extrabold text-white">Never Run Out of Business Cards in Central Again</h3>
                        <p class="text-sm text-slate-300 leading-relaxed">
                            Hong Kong's fast-paced corporate market demands quick, sophisticated lead capture. With a single tap of your custom PVC or Brushed Metal Tap.Name card, hand over your phone profile, LinkedIn, WeChat, Calendly booking link, and company portfolio instantly.
                        </p>
                        <ul class="text-xs text-slate-300 space-y-2 pt-2">
                            <li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-cyan-400"></i> Direct Save-to-Phone Contact (.vcf format)</li>
                            <li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-cyan-400"></i> Dynamic URL routing (update details anytime without re-printing)</li>
                            <li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-cyan-400"></i> Enterprise team management options available</li>
                        </ul>
                    </div>
                    <div class="lg:col-span-5 rounded-2xl overflow-hidden border border-slate-800">
                        <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?auto=format&fit=crop&w=700&q=80" alt="Corporate B2B Networking" class="w-full h-64 object-cover">
                    </div>
                </div>

                <!-- Tab 2: Social -->
                <div id="tab-social" class="tab-content hidden grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    <div class="lg:col-span-7 space-y-4">
                        <span class="text-xs font-bold text-pink-400 uppercase tracking-wider">For LKF Nightlife, Creators & Students</span>
                        <h3 class="text-2xl sm:text-3xl font-extrabold text-white">Share Your Instagram & WhatsApp in 1 Second</h3>
                        <p class="text-sm text-slate-300 leading-relaxed">
                            No more shouting handle spellings over loud club music in Lan Kwai Fong or Wan Chai. Stick a Tap.Name Anti-Metal phone sticker to your phone case or attach an Epoxy Keychain to your keys. Tap against a new friend's phone and connect instantly.
                        </p>
                        <ul class="text-xs text-slate-300 space-y-2 pt-2">
                            <li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-pink-400"></i> Multi-social profile toggle (Instagram, TikTok, WhatsApp)</li>
                            <li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-pink-400"></i> Durable, waterproof, party-proof build</li>
                            <li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-pink-400"></i> Instant conversation starter</li>
                        </ul>
                    </div>
                    <div class="lg:col-span-5 rounded-2xl overflow-hidden border border-slate-800">
                        <img src="https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?auto=format&fit=crop&w=700&q=80" alt="Nightlife Social Connections" class="w-full h-64 object-cover">
                    </div>
                </div>

                <!-- Tab 3: F&B -->
                <div id="tab-fnb" class="tab-content hidden grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    <div class="lg:col-span-7 space-y-4">
                        <span class="text-xs font-bold text-amber-400 uppercase tracking-wider">For Restaurants, Cafés, Bars & Salons</span>
                        <h3 class="text-2xl sm:text-3xl font-extrabold text-white">Drive 5-Star Google Reviews Right From the Table</h3>
                        <p class="text-sm text-slate-300 leading-relaxed">
                            Local foot traffic in Hong Kong relies heavily on Google Maps ratings. Place our sleek Acrylic Table Stands or Wood Blocks at dining tables or cash registers. Diners tap their phone while paying the bill and leave a review in under 3 seconds.
                        </p>
                        <ul class="text-xs text-slate-300 space-y-2 pt-2">
                            <li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-amber-400"></i> Bypasses slow post-dining email/SMS campaigns</li>
                            <li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-amber-400"></i> Dual NFC + QR Code backup for complete device coverage</li>
                            <li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-amber-400"></i> Digital menu & PayMe / AlipayHK redirect integration</li>
                        </ul>
                    </div>
                    <div class="lg:col-span-5 rounded-2xl overflow-hidden border border-slate-800">
                        <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=700&q=80" alt="Restaurant Google Review Redirect" class="w-full h-64 object-cover">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- NEW SECTION: WHY TAP.NAME OVER PAPER (ADVANTAGES) -->
    <section id="advantages" class="scroll-mt-20 py-24 relative border-t border-slate-800/80 bg-slate-950/40 z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
                <span class="text-cyan-400 font-bold text-xs uppercase tracking-widest flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    The Smart Upgrade
                </span>
                <h2 class="text-3xl sm:text-5xl font-extrabold text-white">{{ $sections->firstWhere('key','advantages')->title ?? 'Why Professionals Switch to Tap.Name' }}</h2>
                <p class="text-slate-400 text-sm sm:text-base">{{ $sections->firstWhere('key','advantages')->subtitle ?? 'Traditional paper business cards end up in the trash bin. Tap.Name guarantees your identity stays stored in your prospect\'s smartphone forever.' }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Advantage 1 -->
                <div class="glass-panel p-8 rounded-3xl border border-slate-800 space-y-4 relative overflow-hidden group">
                    <div class="absolute -right-4 -bottom-4 text-slate-800/30 group-hover:text-cyan-500/10 transition-colors">
                        <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2a10 10 0 100 20 10 10 0 000-20zm1 14h-2v-2h2v2zm0-4h-2V7h2v5z"/></svg>
                    </div>
                    <div class="w-12 h-12 rounded-2xl bg-cyan-500/10 border border-cyan-500/30 text-cyan-400 flex items-center justify-center text-xl font-bold">
                        <i class="fa-solid fa-infinity"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white">One Card, Infinite Uses</h3>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        Never re-print boxes of paper cards when your job title, phone number, or office address changes. Update your profile dashboard instantly anytime, anywhere.
                    </p>
                </div>

                <!-- Advantage 2 -->
                <div class="glass-panel p-8 rounded-3xl border border-slate-800 space-y-4 relative overflow-hidden group">
                    <div class="absolute -right-4 -bottom-4 text-slate-800/30 group-hover:text-blue-500/10 transition-colors">
                        <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M16 11V7a4 4 0 00-8 0v4H5v10h14V11h-3zm-6-4a2 2 0 114 0v4h-4V7zm6 10H8v-2h8v2z"/></svg>
                    </div>
                    <div class="w-12 h-12 rounded-2xl bg-blue-500/10 border border-blue-500/30 text-blue-400 flex items-center justify-center text-xl font-bold">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white">Lead Conversion Analytics</h3>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        Track how many times your card has been tapped, which links get clicked the most, and measure your networking ROI across events and client meetings.
                    </p>
                </div>

                <!-- Advantage 3 -->
                <div class="glass-panel p-8 rounded-3xl border border-slate-800 space-y-4 relative overflow-hidden group">
                    <div class="absolute -right-4 -bottom-4 text-slate-800/30 group-hover:text-emerald-500/10 transition-colors">
                        <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                    </div>
                    <div class="w-12 h-12 rounded-2xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 flex items-center justify-center text-xl font-bold">
                        <i class="fa-solid fa-seedling"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white">Eco-Friendly Sustainability</h3>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        Reduce paper waste and carbon footprint. A single Tap.Name NFC product replaces thousands of paper business cards throughout its operational lifespan.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- HOW IT WORKS -->
    
    <!-- HOW IT WORKS (3 STEPS) -->
<section id="how-it-works" class="scroll-mt-20 py-24 relative border-t border-slate-800/80 bg-slate-950/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Heading -->
        <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
            <span class="text-cyan-400 font-bold text-xs uppercase tracking-widest flex items-center justify-center gap-2">
                <i class="fa-solid fa-route"></i> Frictionless Process
            </span>
            <h2 class="text-3xl sm:text-5xl font-extrabold text-white">{{ $sections->firstWhere('key','how_it_works')->title ?? 'How It Works (3 Steps)' }}</h2>
            <p class="text-slate-400 text-sm sm:text-base">{{ $sections->firstWhere('key','how_it_works')->subtitle ?? 'Get started in minutes with zero complicated setup required.' }}</p>
        </div>

        <!-- 3-Step Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative">
            
            <!-- Step 1 Card -->
            <div class="glass-panel p-8 rounded-3xl relative flex flex-col justify-between hover:border-cyan-500/50 transition-all duration-300 group">
                <div>
                    <!-- Step Badge & Icon Header -->
                    <div class="flex items-center justify-between mb-6">
                        <div class="w-14 h-14 rounded-2xl bg-cyan-500/10 border border-cyan-500/30 text-cyan-400 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </div>
                        <span class="text-3xl font-black text-slate-800 group-hover:text-cyan-500/20 transition-colors">01</span>
                    </div>

                    <!-- Content -->
                    <h3 class="text-xl font-bold text-white mb-3 group-hover:text-cyan-400 transition-colors">
                        Step 1: Buy Your Tap
                    </h3>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        Choose from premium PVC cards, phone stickers, keychains, or restaurant table stands tailored to your needs.
                    </p>
                </div>

                <!-- Footer Feature Pills -->
                <div class="pt-6 mt-6 border-t border-slate-800/80 flex flex-wrap gap-2 text-[10px] font-semibold text-slate-400">
                    <span class="px-2.5 py-1 rounded-md bg-slate-900 border border-slate-800"><i class="fa-solid fa-credit-card text-cyan-400 mr-1"></i> PVC Cards</span>
                    <span class="px-2.5 py-1 rounded-md bg-slate-900 border border-slate-800"><i class="fa-solid fa-mobile-screen text-cyan-400 mr-1"></i> Stickers</span>
                    <span class="px-2.5 py-1 rounded-md bg-slate-900 border border-slate-800"><i class="fa-solid fa-store text-cyan-400 mr-1"></i> Stands</span>
                </div>
            </div>

            <!-- Step 2 Card -->
            <div class="glass-panel p-8 rounded-3xl relative flex flex-col justify-between hover:border-cyan-500/50 transition-all duration-300 group">
                <div>
                    <!-- Step Badge & Icon Header -->
                    <div class="flex items-center justify-between mb-6">
                        <div class="w-14 h-14 rounded-2xl bg-blue-500/10 border border-blue-500/30 text-blue-400 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                            <i class="fa-solid fa-qrcode"></i>
                        </div>
                        <span class="text-3xl font-black text-slate-800 group-hover:text-blue-500/20 transition-colors">02</span>
                    </div>

                    <!-- Content -->
                    <h3 class="text-xl font-bold text-white mb-3 group-hover:text-cyan-400 transition-colors">
                        Step 2: Tap & Claim
                    </h3>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        Scan the unique QR code on the back of your product to claim it on our platform. No account setup required immediately.
                    </p>
                </div>

                <!-- Footer Feature Pills -->
                <div class="pt-6 mt-6 border-t border-slate-800/80 flex flex-wrap gap-2 text-[10px] font-semibold text-slate-400">
                    <span class="px-2.5 py-1 rounded-md bg-slate-900 border border-slate-800"><i class="fa-solid fa-bolt text-blue-400 mr-1"></i> Instant Setup</span>
                    <span class="px-2.5 py-1 rounded-md bg-slate-900 border border-slate-800"><i class="fa-solid fa-shield-halved text-blue-400 mr-1"></i> Secure QR</span>
                </div>
            </div>

            <!-- Step 3 Card -->
            <div class="glass-panel p-8 rounded-3xl relative flex flex-col justify-between hover:border-cyan-500/50 transition-all duration-300 group">
                <div>
                    <!-- Step Badge & Icon Header -->
                    <div class="flex items-center justify-between mb-6">
                        <div class="w-14 h-14 rounded-2xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                            <i class="fa-solid fa-sliders"></i>
                        </div>
                        <span class="text-3xl font-black text-slate-800 group-hover:text-emerald-500/20 transition-colors">03</span>
                    </div>

                    <!-- Content -->
                    <h3 class="text-xl font-bold text-white mb-3 group-hover:text-cyan-400 transition-colors">
                        Step 3: Customize & Go
                    </h3>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        Paste your links (Instagram, WhatsApp, LinkedIn, Google Review page) into your dashboard. Tap your phone to the product, and watch it instantly open your page.
                    </p>
                </div>

                <!-- Footer Feature Icons -->
                <div class="pt-6 mt-6 border-t border-slate-800/80 flex items-center gap-3 text-sm text-slate-400">
                    <i class="fa-brands fa-instagram text-pink-400 hover:scale-125 transition-transform" title="Instagram"></i>
                    <i class="fa-brands fa-whatsapp text-emerald-400 hover:scale-125 transition-transform" title="WhatsApp"></i>
                    <i class="fa-brands fa-linkedin text-blue-400 hover:scale-125 transition-transform" title="LinkedIn"></i>
                    <i class="fa-solid fa-star text-amber-400 hover:scale-125 transition-transform" title="Google Review"></i>
                </div>
            </div>

        </div>
    </div>
</section>

    <section id="how-it-tap" class="scroll-mt-20 py-24 border-t border-slate-800/80 bg-slate-950/30 z-10 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
                <span class="text-cyan-400 font-bold text-xs uppercase tracking-widest">Watch the magic happen</span>
                <h2 class="text-3xl sm:text-5xl font-extrabold text-white">3 Simple Steps to Tap</h2>
                <p class="text-slate-400 text-sm sm:text-base">No apps, no complex setup. Designed for maximum speed and conversion.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Step 1 -->
                <div class="glass-panel p-8 rounded-3xl relative">
                    <div class="w-12 h-12 rounded-2xl bg-cyan-500/10 border border-cyan-500/30 text-cyan-400 font-extrabold text-xl flex items-center justify-center mb-6">
                        01
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Tap Device</h3>
                    <p class="text-xs text-slate-400 leading-relaxed">Hold your Tap.Name card, sticker, or stand near any iPhone or Android phone. The built-in NFC reader triggers instantly.</p>
                </div>

                <!-- Step 2 -->
                <div class="glass-panel p-8 rounded-3xl relative">
                    <div class="w-12 h-12 rounded-2xl bg-blue-500/10 border border-blue-500/30 text-blue-400 font-extrabold text-xl flex items-center justify-center mb-6">
                        02
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Instant Launch</h3>
                    <p class="text-xs text-slate-400 leading-relaxed">A native browser notification pops up in real-time. Tapping it opens your custom web profile or Google Review screen immediately.</p>
                </div>

                <!-- Step 3 -->
                <div class="glass-panel p-8 rounded-3xl relative">
                    <div class="w-12 h-12 rounded-2xl bg-purple-500/10 border border-purple-500/30 text-purple-400 font-extrabold text-xl flex items-center justify-center mb-6">
                        03
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Connect & Convert</h3>
                    <p class="text-xs text-slate-400 leading-relaxed">The receiving user saves your contact directly to their address book, follows your socials, or leaves a 5-star Google review on the spot.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- TECHNICAL SPECIFICATIONS MATRIX -->
    
    <!-- RFQ PRODUCT REFERENCE SHOWCASE SECTION -->
<section id="rfq-showcase" class="scroll-mt-20 py-24 relative bg-slate-950 border-t border-slate-800 text-slate-100 overflow-hidden">
    <!-- Ambient Background Glows -->
    <div class="absolute top-1/2 left-1/4 -translate-y-1/2 w-[500px] h-[500px] bg-cyan-500/10 rounded-full blur-[140px] pointer-events-none"></div>
    <div class="absolute bottom-10 right-10 w-[400px] h-[400px] bg-blue-600/10 rounded-full blur-[120px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-cyan-500/10 border border-cyan-500/30 text-cyan-300 text-xs font-semibold uppercase tracking-wider">
                <i class="fa-solid fa-layer-group"></i> RFQ Hardware Architecture
            </div>
            <h2 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight">{{ $sections->firstWhere('key','rfq_showcase')->title ?? 'Interactive Product Lineup' }}</h2>
            <p class="text-slate-400 text-sm sm:text-base">{{ $sections->firstWhere('key','rfq_showcase')->subtitle ?? 'Explore our standard NFC form factors, anti-metal shielding technology, epoxy keychains, and custom QR review stands.' }}</p>
        </div>

        <!-- Interactive Product Navigation Tabs -->
        <div class="flex justify-center gap-3 mb-12 flex-wrap">
            <button onclick="scrollToProduct('product-a')" class="rfq-tab-btn active px-4 py-2.5 rounded-xl text-xs font-bold border border-cyan-500/50 bg-cyan-500/10 text-cyan-300 transition-all flex items-center gap-2">
                <i class="fa-solid fa-credit-card"></i> Product A: PVC Card
            </button>
            <button onclick="scrollToProduct('product-b')" class="rfq-tab-btn px-4 py-2.5 rounded-xl text-xs font-bold border border-slate-800 bg-slate-900/80 text-slate-400 hover:text-white transition-all flex items-center gap-2">
                <i class="fa-solid fa-circle-dot"></i> Product B: Sticker
            </button>
            <button onclick="scrollToProduct('product-c')" class="rfq-tab-btn px-4 py-2.5 rounded-xl text-xs font-bold border border-slate-800 bg-slate-900/80 text-slate-400 hover:text-white transition-all flex items-center gap-2">
                <i class="fa-solid fa-key"></i> Product C: Keychain Tag
            </button>
            <button onclick="scrollToProduct('product-d')" class="rfq-tab-btn px-4 py-2.5 rounded-xl text-xs font-bold border border-slate-800 bg-slate-900/80 text-slate-400 hover:text-white transition-all flex items-center gap-2">
                <i class="fa-solid fa-store"></i> Product D: Table Stand
            </button>
        </div>

        <!-- Product Cards Showcase Grid -->
        <div class="space-y-12">

            <!-- PRODUCT A: PVC NFC CARD -->
            <div id="product-a" class="rfq-card glass-panel rounded-3xl p-8 border border-slate-800 hover:border-cyan-500/40 transition-all duration-500 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-6 bg-slate-900/90 rounded-2xl p-6 border border-slate-800/80 relative overflow-hidden flex items-center justify-center min-h-[260px] group">
                    <div class="absolute inset-0 bg-gradient-to-tr from-cyan-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative w-72 h-44 bg-slate-200 rounded-xl shadow-2xl p-4 flex flex-col justify-between border border-slate-300 transform group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-4 rounded-lg border-2 border-amber-600/60 flex items-center justify-center p-2 opacity-80">
                            <div class="w-full h-full border-2 border-amber-600/60 rounded-md flex items-center justify-center p-2">
                                <div class="w-full h-full border-2 border-amber-600/60 rounded-sm flex items-center justify-center">
                                    <div class="w-8 h-8 bg-slate-400 rounded-sm border border-slate-500 shadow-inner flex items-center justify-center">
                                        <div class="w-2 h-2 bg-slate-600 rounded-xs"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-between items-center relative z-10">
                            <span class="text-[10px] font-bold text-slate-500 tracking-wider uppercase">Tap.Name PVC</span>
                            <i class="fa-solid fa-wifi text-slate-400 rotate-90 text-xs"></i>
                        </div>
                        <div class="relative z-10 text-[9px] text-slate-400 font-mono">ISO/IEC 14443A • NTAG216</div>
                    </div>
                </div>
                <div class="lg:col-span-6 space-y-4">
                    <div class="inline-block px-3 py-1 rounded-md bg-cyan-500/10 text-cyan-400 text-xs font-bold uppercase tracking-wider">
                        Product A Reference
                    </div>
                    <h3 class="text-2xl font-bold text-white">Standard PVC NFC Card</h3>
                    <p class="text-slate-300 text-xs leading-relaxed">
                        Precision-molded PVC card with high-frequency copper loop antenna embedded inside. Engineered for seamless save-to-contact profile transfers on all modern smartphones.
                    </p>
                    <div class="grid grid-cols-2 gap-3 pt-2 text-xs text-slate-300">
                        <div class="p-3 bg-slate-900/60 rounded-xl border border-slate-800">
                            <span class="text-slate-500 block text-[10px] uppercase font-bold">Standard Size</span>
                            85.5 mm × 54 mm (CR80)
                        </div>
                        <div class="p-3 bg-slate-900/60 rounded-xl border border-slate-800">
                            <span class="text-slate-500 block text-[10px] uppercase font-bold">Chip Type</span>
                            NTAG215 / NTAG216
                        </div>
                    </div>
                </div>
            </div>

            <!-- PRODUCT B: ANTI-METAL PHONE STICKER -->
            <div id="product-b" class="rfq-card glass-panel rounded-3xl p-8 border border-slate-800 hover:border-cyan-500/40 transition-all duration-500 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-6 bg-slate-900/90 rounded-2xl p-6 border border-slate-800/80 relative flex flex-col sm:flex-row items-center justify-around min-h-[280px] gap-6 group">
                    <div class="flex flex-col items-center gap-2">
                        <div class="w-20 h-20 rounded-full bg-slate-900 border-2 border-slate-700 shadow-xl flex items-center justify-center relative group-hover:border-cyan-400 transition-colors">
                            <div class="w-16 h-16 rounded-full bg-slate-950 border border-slate-800 flex items-center justify-center text-slate-500 text-xs font-bold">
                                30mm
                            </div>
                        </div>
                        <span class="text-[10px] text-slate-400 font-mono">30mm Diameter</span>
                    </div>
                    <div class="flex flex-col gap-2 relative w-48">
                        <div class="p-2.5 bg-slate-900 rounded-lg border border-slate-700 shadow-md text-xs font-semibold text-slate-200 flex items-center justify-between group-hover:-translate-y-1 transition-transform">
                            <span>1. Matte Black Layer</span>
                            <span class="w-2.5 h-2.5 rounded-full bg-slate-950 border border-slate-700"></span>
                        </div>
                        <div class="p-2.5 bg-slate-800 rounded-lg border border-cyan-500/40 shadow-md text-xs font-semibold text-cyan-300 flex items-center justify-between group-hover:translate-x-1 transition-transform">
                            <span>2. Anti-Metal Shield</span>
                            <span class="w-2.5 h-2.5 rounded-full bg-slate-600"></span>
                        </div>
                        <div class="p-2.5 bg-slate-700 rounded-lg border border-slate-600 shadow-md text-xs font-semibold text-slate-200 flex items-center justify-between group-hover:translate-y-1 transition-transform">
                            <span>3. Epoxy Adhesive</span>
                            <span class="w-2.5 h-2.5 rounded-full bg-slate-300"></span>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-6 space-y-4">
                    <div class="inline-block px-3 py-1 rounded-md bg-cyan-500/10 text-cyan-400 text-xs font-bold uppercase tracking-wider">
                        Product B Reference
                    </div>
                    <h3 class="text-2xl font-bold text-white">NFC Phone Sticker (Anti-Metal)</h3>
                    <p class="text-slate-300 text-xs leading-relaxed">
                        Designed with an integrated ferrite absorber layer. Solves the magnetic interference issue caused by aluminum/metal smartphone backing plates.
                    </p>
                    <ul class="text-xs text-slate-300 space-y-2 pt-1">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-cyan-400"></i> Matte black protective top surface finish</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-cyan-400"></i> Specialized anti-metal shielding layer for zero signal loss</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-cyan-400"></i> Strong 3M epoxy backing adhesive</li>
                    </ul>
                </div>
            </div>

            <!-- PRODUCT C: EPOXY NFC KEYCHAIN TAG -->
            <div id="product-c" class="rfq-card glass-panel rounded-3xl p-8 border border-slate-800 hover:border-cyan-500/40 transition-all duration-500 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-6 bg-slate-900/90 rounded-2xl p-6 border border-slate-800/80 relative flex items-center justify-center min-h-[280px] group">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <!-- Keychain Accessory Graphic Vector -->
                    <div class="flex flex-col items-center gap-3 transform group-hover:scale-105 transition-transform duration-500">
                        <div class="w-10 h-10 rounded-full border-4 border-slate-400 shadow-md -mb-4 z-20 flex items-center justify-center">
                            <div class="w-3 h-3 rounded-full bg-slate-950"></div>
                        </div>
                        <div class="w-32 h-32 rounded-3xl bg-gradient-to-br from-slate-800 to-slate-950 border-2 border-slate-700 shadow-2xl p-4 flex flex-col justify-between items-center relative overflow-hidden">
                            <div class="absolute inset-0 bg-white/5 backdrop-blur-[2px]"></div>
                            <div class="w-full flex justify-between items-center relative z-10">
                                <span class="text-[8px] font-bold text-cyan-400 tracking-wider">TAP.NAME</span>
                                <i class="fa-solid fa-wifi text-[10px] text-slate-400 rotate-90"></i>
                            </div>
                            <div class="w-10 h-10 rounded-full bg-cyan-500/10 border border-cyan-500/30 flex items-center justify-center text-cyan-400 text-sm relative z-10">
                                <i class="fa-solid fa-key"></i>
                            </div>
                            <span class="text-[8px] text-slate-400 font-mono relative z-10">IP67 Waterproof</span>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-6 space-y-4">
                    <div class="inline-block px-3 py-1 rounded-md bg-purple-500/10 text-purple-400 text-xs font-bold uppercase tracking-wider">
                        Product C Reference
                    </div>
                    <h3 class="text-2xl font-bold text-white">Epoxy NFC Keychain Tag</h3>
                    <p class="text-slate-300 text-xs leading-relaxed">
                        Ultra-durable, scratch-resistant crystal epoxy dome key fob designed for daily keychain carry. Provides high RF read distance and waterproof resilience for nightlife, events, and field staff.
                    </p>
                    <ul class="text-xs text-slate-300 space-y-2 pt-1">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-cyan-400"></i> Stainless steel split ring attachment included</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-cyan-400"></i> Crystal-clear glossy epoxy dome (IP67 waterproof)</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-cyan-400"></i> Embedded NTAG216 chip for lightning-fast reads</li>
                    </ul>
                </div>
            </div>

            <!-- PRODUCT D: ACRYLIC NFC TABLE STAND -->
            <div id="product-d" class="rfq-card glass-panel rounded-3xl p-8 border border-slate-800 hover:border-cyan-500/40 transition-all duration-500 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-6 bg-slate-900/90 rounded-2xl p-6 border border-slate-800/80 relative flex items-center justify-center min-h-[280px] group">
                    <div class="relative w-44 h-56 bg-slate-800/40 border border-slate-700/80 rounded-xl p-3 flex flex-col justify-between items-center shadow-2xl backdrop-blur-sm transform group-hover:rotate-1 transition-transform">
                        <div class="w-full h-36 bg-white rounded-lg p-2 flex flex-col items-center justify-between text-slate-900 shadow-inner">
                            <div class="w-full flex justify-end">
                                <i class="fa-solid fa-wifi text-[9px] text-cyan-600 rotate-90"></i>
                            </div>
                            <div class="w-20 h-20 bg-slate-900 rounded p-1 flex items-center justify-center">
                                <i class="fa-solid fa-qrcode text-white text-3xl"></i>
                            </div>
                            <span class="text-[9px] font-black tracking-wider text-cyan-600 uppercase">TAP.NAME</span>
                        </div>
                        <div class="w-full h-4 bg-slate-700/60 rounded-b-md border-t border-slate-600"></div>
                    </div>
                </div>
                <div class="lg:col-span-6 space-y-4">
                    <div class="inline-block px-3 py-1 rounded-md bg-amber-500/10 text-amber-400 text-xs font-bold uppercase tracking-wider">
                        Product D Reference
                    </div>
                    <h3 class="text-2xl font-bold text-white">Acrylic NFC Table Stand</h3>
                    <p class="text-slate-300 text-xs leading-relaxed">
                        Heavy-duty transparent acrylic display tent engineered for restaurant dining tables, bar tops, and checkout counters. Directs patrons to leave 5-star Google reviews via dual NFC & QR code redirect.
                    </p>
                    <div class="grid grid-cols-2 gap-3 pt-2 text-xs text-slate-300">
                        <div class="p-3 bg-slate-900/60 rounded-xl border border-slate-800">
                            <span class="text-slate-500 block text-[10px] uppercase font-bold">Primary Use</span>
                            Google Review / PayMe / Menu Redirect
                        </div>
                        <div class="p-3 bg-slate-900/60 rounded-xl border border-slate-800">
                            <span class="text-slate-500 block text-[10px] uppercase font-bold">Structure</span>
                            Heavy Acrylic Base + Dual NFC Tag
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Scroll-Spy & Tab Interaction Script -->
<script>
    function scrollToProduct(productId) {
        const target = document.getElementById(productId);
        if (target) {
            target.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    }

    window.addEventListener('scroll', () => {
        const products = ['product-a', 'product-b', 'product-c', 'product-d'];
        const tabs = document.querySelectorAll('.rfq-tab-btn');

        let activeIndex = -1;
        products.forEach((id, index) => {
            const el = document.getElementById(id);
            if (el) {
                const rect = el.getBoundingClientRect();
                if (rect.top <= window.innerHeight / 2 && rect.bottom >= window.innerHeight / 2) {
                    activeIndex = index;
                }
            }
        });

        if (activeIndex === -1) return;

        tabs.forEach((tab, index) => {
            const isActive = index === activeIndex;
            tab.classList.toggle('active', isActive);
            tab.classList.toggle('border-cyan-500/50', isActive);
            tab.classList.toggle('bg-cyan-500/10', isActive);
            tab.classList.toggle('text-cyan-300', isActive);
            tab.classList.toggle('border-slate-800', !isActive);
            tab.classList.toggle('bg-slate-900/80', !isActive);
            tab.classList.toggle('text-slate-400', !isActive);
        });
    });
</script>
    <section id="specs" class="scroll-mt-20 py-24 relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
                <span class="text-cyan-400 font-bold text-xs uppercase tracking-widest">Enterprise Engineering</span>
                <h2 class="text-3xl sm:text-5xl font-extrabold text-white">{{ $sections->firstWhere('key','specs')->title ?? 'Technical Specifications' }}</h2>
                <p class="text-slate-400 text-sm sm:text-base">{{ $sections->firstWhere('key','specs')->subtitle ?? 'We source high-grade NTAG chips and tuned antennas to guarantee maximum RF sensitivity and zero read failures.' }}</p>
            </div>

            <div class="glass-panel rounded-3xl p-6 sm:p-10 border border-slate-800 overflow-x-auto">
                <table class="w-full text-left border-collapse text-xs sm:text-sm">
                    <thead>
                        <tr class="border-b border-slate-800 text-cyan-400 font-bold uppercase tracking-wider">
                            <th class="py-4 px-4">Parameter</th>
                            <th class="py-4 px-4">Technical Specification</th>
                            <th class="py-4 px-4">Business Benefit</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/60 text-slate-300">
                        <tr>
                            <td class="py-4 px-4 font-semibold text-white">NFC Microchip</td>
                            <td class="py-4 px-4">NTAG215 / NTAG216 (NXP Semiconductors)</td>
                            <td class="py-4 px-4 text-slate-400">High memory capacity for complex URLs & secure parameters.</td>
                        </tr>
                        <tr>
                            <td class="py-4 px-4 font-semibold text-white">Operating Frequency</td>
                            <td class="py-4 px-4">13.56 MHz (ISO/IEC 14443A Protocol)</td>
                            <td class="py-4 px-4 text-slate-400">Global standard compatible with 99%+ of smartphones worldwide.</td>
                        </tr>
                        <tr>
                            <td class="py-4 px-4 font-semibold text-white">Anti-Metal Shielding</td>
                            <td class="py-4 px-4">Integrated Ferrite Isolation Layer</td>
                            <td class="py-4 px-4 text-slate-400">Prevents metal body interference on smartphones and aluminum fixtures.</td>
                        </tr>
                        <tr>
                            <td class="py-4 px-4 font-semibold text-white">Read Distance</td>
                            <td class="py-4 px-4">3 cm – 5 cm Optimal Read Range</td>
                            <td class="py-4 px-4 text-slate-400">Instant connection without needing to awkwardly press phones together.</td>
                        </tr>
                        <tr>
                            <td class="py-4 px-4 font-semibold text-white">Security & Locking</td>
                            <td class="py-4 px-4">Password Protection & Permanent Read-Only Lock</td>
                            <td class="py-4 px-4 text-slate-400">Prevents malicious unauthorized URL overwrites by third parties.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- INQUIRY / ORDER FORM -->
    <section id="inquiry" class="scroll-mt-20 py-24 relative bg-slate-950 border-t border-slate-800 z-10">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="glass-panel rounded-3xl p-8 sm:p-12 border border-slate-800 shadow-2xl relative">
                
                <div class="text-center space-y-3 mb-10">
                    <span class="text-cyan-400 font-bold text-xs uppercase tracking-widest">Get In Touch</span>
                    <h2 class="text-3xl font-extrabold text-white">{{ $sections->firstWhere('key','inquiry')->title ?? 'Request Samples or Bulk Quotes' }}</h2>
                    <p class="text-slate-400 text-xs sm:text-sm">{{ $sections->firstWhere('key','inquiry')->subtitle ?? 'Based in Hong Kong. We supply sample packs (5–10 pcs) and bulk orders (50, 100, 500+ pcs) across HK & worldwide.' }}</p>
                </div>

                <form action="https://formspree.io/f/xnpjroke" method="POST" id="inquiryForm" onsubmit="handleInquirySubmit(event)" class="space-y-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 uppercase mb-2">Your Name *</label>
                            <input type="text" name="name" required placeholder="e.g. Hamza Pervaiz" class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-cyan-500 transition-colors">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 uppercase mb-2">Company / Business Name</label>
                            <input type="text" name="company" placeholder="e.g. Tap.Name Startup" class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-cyan-500 transition-colors">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 uppercase mb-2">WhatsApp / WeChat / Phone *</label>
                            <input type="text" name="phone" required placeholder="+852 69565404" class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-cyan-500 transition-colors">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 uppercase mb-2">Order Type *</label>
                            <select name="order_type" required class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-cyan-500 transition-colors">
                                <option value="">Select Requirement</option>
                                <option value="personal-single">Personal 1Pc</option>
                                <option value="sample">Sample Pack (5 - 10 pcs mixed)</option>
                                <option value="large-50">Large Order (10 - 100 units)</option>
                                <option value="bulk-100">Bulk Order (100+ units)</option>
                                <option value="custom">Custom OEM / Stand Request</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-300 uppercase mb-2">Interested Hardware Form Factor</label>
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 text-xs">
                            <label class="flex items-center gap-2 p-3 bg-slate-900 rounded-xl border border-slate-800 cursor-pointer hover:border-cyan-500/50">
                                <input type="checkbox" name="hardware[]" value="PVC/Metal Cards" class="accent-cyan-400"> PVC/Metal Cards
                            </label>
                            <label class="flex items-center gap-2 p-3 bg-slate-900 rounded-xl border border-slate-800 cursor-pointer hover:border-cyan-500/50">
                                <input type="checkbox" name="hardware[]" value="Phone Stickers" class="accent-cyan-400"> Phone Stickers
                            </label>
                            <label class="flex items-center gap-2 p-3 bg-slate-900 rounded-xl border border-slate-800 cursor-pointer hover:border-cyan-500/50">
                                <input type="checkbox" name="hardware[]" value="Epoxy Keychains" class="accent-cyan-400"> Epoxy Keychains
                            </label>
                            <label class="flex items-center gap-2 p-3 bg-slate-900 rounded-xl border border-slate-800 cursor-pointer hover:border-cyan-500/50">
                                <input type="checkbox" name="hardware[]" value="Table Stands" class="accent-cyan-400"> Table Stands
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-300 uppercase mb-2">Message or Custom Notes</label>
                        <textarea name="message" rows="4" placeholder="Tell us about your requirements or delivery address in Hong Kong / overseas..." class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-cyan-500 transition-colors"></textarea>
                    </div>

                    <button type="submit" class="w-full py-4 bg-gradient-brand text-slate-950 font-extrabold text-sm uppercase tracking-wider rounded-2xl shadow-neon-glow hover:scale-[1.01] transition-transform">
                        Submit Inquiry
                    </button>
                </form>

                <!-- Feedback Toast -->
                <div id="formSuccessToast" class="hidden absolute inset-0 bg-slate-950/95 rounded-3xl flex flex-col items-center justify-center p-8 text-center space-y-4">
                    <div class="w-16 h-16 rounded-full bg-cyan-500/20 border border-cyan-400 text-cyan-400 flex items-center justify-center text-3xl">
                        <i class="fa-solid fa-check"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white">Inquiry Received!</h3>
                    <p class="text-xs text-slate-300 max-w-md">Thank you for reaching out to Tap.Name. Our founder Hamza Pervaiz will review your inquiry and connect via WhatsApp/WeChat shortly.</p>
                    <button onclick="resetInquiryForm()" class="px-6 py-2 bg-slate-800 text-white rounded-xl text-xs font-semibold hover:bg-slate-700">Send Another Message</button>
                </div>

            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-slate-950 border-t border-slate-800/80 py-12 text-slate-400 text-xs relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center justify-between gap-6">
            
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-950 font-black p-1">
                    <img src="tapnamelogowhite.png" alt="Tap.Name Logo" class="w-full h-full object-contain">
                </div>
                <div>
                    <span class="text-white font-bold text-sm tracking-wider">{{ $settings['site_name']->value ?? 'Tap.Name' }}</span>
                    <p class="text-[10px] text-slate-500">{{ $settings['site_tagline']->value ?? 'Identity, Just a Tap Away.' }} © 2026</p>
                </div>
            </div>

            <div class="flex flex-wrap justify-center gap-6 text-slate-400 text-sm font-medium">
                <a href="mailto:{{ $settings['contact_email']->value ?? 'connect@tap.name' }}" class="flex items-center hover:text-cyan-400 transition-colors">
                    <i class="fa-solid fa-envelope text-cyan-400 mr-2"></i>
                    {{ $settings['contact_email']->value ?? 'connect@tap.name' }}
                </a>

                <a href="https://wa.me/{{ preg_replace('/\D+/', '', $settings['whatsapp']->value ?? '+85269565404') }}" target="_blank" rel="noopener noreferrer" class="flex items-center hover:text-emerald-400 transition-colors">
                    <i class="fa-brands fa-whatsapp text-emerald-400 mr-2"></i>
                    {{ $settings['whatsapp']->value ?? '+852 6956 5404' }}
                </a>

                <span class="flex items-center hover:text-green-400 transition-colors" title="WeChat ID: {{ $settings['wechat']->value ?? '+852 6956 5404' }}">
                    <i class="fa-brands fa-weixin text-green-500 mr-2"></i>
                    WeChat: {{ $settings['wechat']->value ?? '+852 6956 5404' }}
                </span>
                
                <span class="flex items-center hover:text-slate-200 transition-colors">
                    <i class="fa-solid fa-location-dot text-red-400 mr-2"></i>
                    {{ $settings['address']->value ?? 'Hong Kong' }}
                </span>
            </div>

            <div class="text-[10px] text-slate-500 text-center md:text-right">
                <span class="flex items-center justify-center md:justify-end hover:text-slate-200 transition-colors mb-1">
                    <i class="fa-solid fa-user text-cyan-400 mr-2"></i>
                    Founder: Hamza Pervaiz
                </span>
                Built for Hong Kong &amp; Global B2B / F&amp;B / Social Tech
            </div>
        </div>
    </footer>

    <!-- INTERACTIVE JAVASCRIPT LOGIC -->
    <script>
        // Dynamic Mouse-Responsive NFC Background Animation
        const canvas = document.getElementById('nfcCanvas');
        const ctx = canvas.getContext('2d');

        let width, height;
        let particles = [];
        let mouse = { x: null, y: null, radius: 150 };

        function resizeCanvas() {
            width = canvas.width = window.innerWidth;
            height = canvas.height = window.innerHeight;
        }

        window.addEventListener('resize', resizeCanvas);
        resizeCanvas();

        window.addEventListener('mousemove', (e) => {
            mouse.x = e.clientX;
            mouse.y = e.clientY;
        });

        window.addEventListener('mouseout', () => {
            mouse.x = null;
            mouse.y = null;
        });

        class NfcParticle {
            constructor() {
                this.x = Math.random() * width;
                this.y = Math.random() * height;
                this.vx = (Math.random() - 0.5) * 0.8;
                this.vy = (Math.random() - 0.5) * 0.8;
                this.radius = Math.random() * 2 + 1;
            }

            update() {
                this.x += this.vx;
                this.y += this.vy;

                if (this.x < 0 || this.x > width) this.vx *= -1;
                if (this.y < 0 || this.y > height) this.vy *= -1;

                // Mouse interactivity repulsion/attraction
                if (mouse.x !== null && mouse.y !== null) {
                    let dx = mouse.x - this.x;
                    let dy = mouse.y - this.y;
                    let distance = Math.sqrt(dx * dx + dy * dy);
                    if (distance < mouse.radius) {
                        let angle = Math.atan2(dy, dx);
                        this.x -= Math.cos(angle) * 1.5;
                        this.y -= Math.sin(angle) * 1.5;
                    }
                }
            }

            draw() {
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
                ctx.fillStyle = 'rgba(0, 242, 254, 0.4)';
                ctx.fill();
            }
        }

        function initParticles() {
            particles = [];
            let count = Math.floor((width * height) / 18000);
            for (let i = 0; i < count; i++) {
                particles.push(new NfcParticle());
            }
        }

        initParticles();

        function animateNfcBackground() {
            ctx.clearRect(0, 0, width, height);

            for (let i = 0; i < particles.length; i++) {
                particles[i].update();
                particles[i].draw();

                // Connect nearby particles with cyber lines
                for (let j = i + 1; j < particles.length; j++) {
                    let dx = particles[i].x - particles[j].x;
                    let dy = particles[i].y - particles[j].y;
                    let dist = Math.sqrt(dx * dx + dy * dy);

                    if (dist < 120) {
                        ctx.beginPath();
                        ctx.moveTo(particles[i].x, particles[i].y);
                        ctx.lineTo(particles[j].x, particles[j].y);
                        ctx.strokeStyle = `rgba(79, 172, 254, ${0.15 * (1 - dist / 120)})`;
                        ctx.lineWidth = 0.5;
                        ctx.stroke();
                    }
                }

                // Connect particles to mouse cursor if close
                if (mouse.x !== null && mouse.y !== null) {
                    let mdx = particles[i].x - mouse.x;
                    let mdy = particles[i].y - mouse.y;
                    let mdist = Math.sqrt(mdx * mdx + mdy * mdy);
                    if (mdist < mouse.radius) {
                        ctx.beginPath();
                        ctx.moveTo(particles[i].x, particles[i].y);
                        ctx.lineTo(mouse.x, mouse.y);
                        ctx.strokeStyle = `rgba(0, 242, 254, ${0.3 * (1 - mdist / mouse.radius)})`;
                        ctx.lineWidth = 0.8;
                        ctx.stroke();
                    }
                }
            }

            requestAnimationFrame(animateNfcBackground);
        }

        animateNfcBackground();

        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        document.querySelectorAll('.mobile-link').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });

        // Interactive Phone Tap Demo Logic
        let isDemoActive = false;
        function triggerDemo() {
            const screenIdle = document.getElementById('screenIdle');
            const screenProfile = document.getElementById('screenProfile');
            
            if (!isDemoActive) {
                screenIdle.classList.add('opacity-0', 'pointer-events-none');
                screenProfile.classList.remove('opacity-0', 'pointer-events-none');
                isDemoActive = true;
            } else {
                resetDemo();
            }
        }

        function resetDemo() {
            const screenIdle = document.getElementById('screenIdle');
            const screenProfile = document.getElementById('screenProfile');
            
            screenProfile.classList.add('opacity-0', 'pointer-events-none');
            screenIdle.classList.remove('opacity-0', 'pointer-events-none');
            isDemoActive = false;
        }

        // Tab Switching Logic for Industry Solutions
        function switchTab(tabId) {
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
            });
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('active', 'border-cyan-500/50', 'bg-cyan-500/10', 'text-cyan-300');
                btn.classList.add('border-slate-800', 'glass-panel', 'text-slate-400');
            });

            document.getElementById(tabId).classList.remove('hidden');
            
            const activeBtn = document.getElementById('btn-' + tabId.replace('tab-', ''));
            if(activeBtn) {
                activeBtn.classList.add('active', 'border-cyan-500/50', 'bg-cyan-500/10', 'text-cyan-300');
                activeBtn.classList.remove('border-slate-800', 'glass-panel', 'text-slate-400');
            }
        }
    
        async function handleInquirySubmit(e) {
            e.preventDefault();
            const form = e.target;
            const data = new FormData(form);

            try {
                const response = await fetch(form.action, {
                    method: form.method,
                    body: data,
                    headers: {
                        'Accept': 'application/json'
                    }
                });

                const result = await response.json();

                if (response.ok) {
                    document.getElementById('formSuccessToast').classList.remove('hidden');
                } else {
                    if (result.errors) {
                        alert(result.errors.map(err => err.message).join(", "));
                    } else {
                        alert("Submission failed. Please try again or contact us directly.");
                    }
                }
            } catch (error) {
                alert("An error occurred. Please check your internet connection.");
            }
        }

        function resetInquiryForm() {
            document.getElementById('inquiryForm').reset();
            document.getElementById('formSuccessToast').classList.add('hidden');
        }
    </script>
    
    <div class="gtranslate_wrapper"></div>
<script>window.gtranslateSettings = {"default_language":"en","native_language_names":true,"detect_browser_language":true,"languages":["en","zh-CN","zh-TW","fr","it","es","hi","ur","ne","tl"],"wrapper_selector":".gtranslate_wrapper","switcher_horizontal_position":"right","switcher_vertical_position":"top","float_switcher_open_direction":"bottom"}</script>
<script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>

<style>
.gtranslate_wrapper #gt_float_wrapper {
    top: 10px !important;
    right: 60px !important;
    scale: 0.8;
    /*position: absolute !important;*/
}

/* =========================================================
   GTranslate Dark Glassmorphism Styling for TAP.NAME
   ========================================================= */

/* Main Button Trigger Styling */
.gt_float_switcher {
    background-color: rgba(17, 24, 39, 0.85) !important;
    backdrop-filter: blur(12px) !important;
    -webkit-backdrop-filter: blur(12px) !important;
    border: 1px solid rgba(0, 242, 254, 0.3) !important;
    border-radius: 14px !important;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5), 0 0 15px rgba(0, 242, 254, 0.15) !important;
    color: #f3f4f6 !important;
    transition: all 0.3s ease !important;
}

.gt_float_switcher:hover {
    border-color: #00f2fe !important;
    box-shadow: 0 0 20px rgba(0, 242, 254, 0.35) !important;
}

/* Selected Language Container & Text */
.gt_float_switcher .gt-selected {
    background: transparent !important;
    padding: 6px 12px !important;
}

.gt_float_switcher .gt-current-lang {
    color: #ffffff !important;
    font-family: 'Inter', sans-serif !important;
    font-weight: 600 !important;
    font-size: 15px !important;
}

.gt_float_switcher .gt-lang-code {
    color: #00f2fe !important; /* Cyan accent for active language code */
    text-transform: uppercase;
}

/* Dropdown Arrow Icon */
.gt_float_switcher .gt_float_switcher-arrow {
    border-top-color: #00f2fe !important;
}

/* Dropdown Options Container (When Opened) */
.gt_float_switcher .gt_options {
    background: rgba(11, 15, 25, 0.95) !important;
    backdrop-filter: blur(16px) !important;
    -webkit-backdrop-filter: blur(16px) !important;
    border: 1px solid rgba(255, 255, 255, 0.1) !important;
    border-radius: 16px !important;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.7), 0 0 25px rgba(0, 242, 254, 0.2) !important;
    padding: 6px !important;
    max-height: 280px !important;
    overflow-y: auto !important;
}

/* Custom Scrollbar inside Language Dropdown */
.gt_float_switcher .gt_options::-webkit-scrollbar {
    width: 5px;
}
.gt_float_switcher .gt_options::-webkit-scrollbar-track {
    background: rgba(15, 23, 42, 0.6);
}
.gt_float_switcher .gt_options::-webkit-scrollbar-thumb {
    background: #1e293b;
    border-radius: 4px;
}
.gt_float_switcher .gt_options::-webkit-scrollbar-thumb:hover {
    background: #00f2fe;
}

/* Individual Language Item Rows */
.gt_float_switcher .gt_options a {
    color: #cbd5e1 !important;
    font-family: 'Inter', sans-serif !important;
    font-size: 15px !important;
    font-weight: 500 !important;
    padding: 8px 12px !important;
    border-radius: 10px !important;
    transition: all 0.2s ease !important;
    display: flex !important;
    align-items: center !important;
    gap: 8px !important;
}

/* Language Item Hover & Active States */
.gt_float_switcher .gt_options a:hover {
    background: rgba(0, 242, 254, 0.15) !important;
    color: #00f2fe !important;
    transform: translateX(2px);
}

.gt_float_switcher .gt_options a.gt-current {
    background: linear-gradient(135deg, rgba(0, 242, 254, 0.2) 0%, rgba(59, 130, 246, 0.2) 100%) !important;
    color: #ffffff !important;
    font-weight: 700 !important;
    border: 1px solid rgba(0, 242, 254, 0.3) !important;
}

/* Flag Icon Formatting */
.gt_float_switcher img {
    border-radius: 3px !important;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4) !important;
}
</style>
</body>
</html>