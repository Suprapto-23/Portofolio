<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suprapto - Portfolio Web & Backend Developer</title>
    @vite('resources/css/app.css')
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
    <style>
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f8fafc; }
        ::-webkit-scrollbar-thumb { background: #bfdbfe; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #60a5fa; }
        
        .project-swiper .swiper-slide { 
            transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out; 
            opacity: 0.4; 
            transform: scale(0.9); 
        }
        .project-swiper .swiper-slide-active { 
            opacity: 1; 
            transform: scale(1); 
            z-index: 10;
        }
        .project-swiper .swiper-slide-next,
        .project-swiper .swiper-slide-prev { 
            opacity: 0.6; 
            transform: scale(0.95); 
        }
    </style>
</head>
<body class="font-sans antialiased text-slate-700 bg-[#f8fafc] selection:bg-blue-100 selection:text-blue-700 overflow-x-hidden">

    <div class="fixed inset-0 -z-10 h-full w-full bg-white">
        <div class="absolute inset-0 bg-[radial-gradient(#e2e8f0_1px,transparent_1px)] [background-size:40px_40px] opacity-50"></div>
        <div class="absolute top-[-10%] left-[-10%] w-[60%] h-[60%] rounded-full bg-blue-100/40 blur-[120px]"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[50%] h-[50%] rounded-full bg-blue-50/50 blur-[120px]"></div>
    </div>

    <!-- NAVBAR PREMIUM -->
    <header x-data="{ mobileMenuOpen: false, scrolled: false }" 
            @scroll.window="scrolled = (window.pageYOffset > 20)"
            :class="{ 'bg-white/80 backdrop-blur-xl shadow-[0_4px_30px_rgb(0,0,0,0.02)] border-b border-slate-100': scrolled, 'bg-transparent border-b border-transparent': !scrolled }"
            class="fixed top-0 inset-x-0 z-50 transition-all duration-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-24 flex items-center justify-between">
            <a href="/" class="text-2xl font-black text-blue-900 tracking-tighter flex items-center gap-2">
                <div class="w-10 h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center shadow-lg shadow-blue-500/20">S</div>
                Suprapto<span class="text-blue-500">.</span>
            </a>
            
            <!-- PERBAIKAN LINK NAVBAR -->
            <nav class="hidden md:flex items-center justify-center gap-10 font-bold text-sm text-slate-500 flex-1">
                <a href="/" class="{{ request()->is('/') ? 'text-blue-600' : 'hover:text-blue-600' }} transition-colors">Beranda</a>
                <a href="/pengalaman" class="{{ request()->is('pengalaman') ? 'text-blue-600' : 'hover:text-blue-600' }} transition-colors">Pengalaman</a>
                <a href="/proyek" class="{{ request()->is('proyek') ? 'text-blue-600' : 'hover:text-blue-600' }} transition-colors">Project</a>
                <a href="/tentang" class="{{ request()->is('tentang') ? 'text-blue-600' : 'hover:text-blue-600' }} transition-colors">Tentang Saya</a>
            </nav>

            <div class="hidden md:block w-10"></div> 

            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 text-blue-600 bg-blue-50 rounded-xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </div>

        <div x-show="mobileMenuOpen" @click.away="mobileMenuOpen = false" class="md:hidden absolute top-24 left-0 w-full bg-white/95 backdrop-blur-xl border-b border-blue-50 shadow-xl" x-transition>
            <div class="flex flex-col px-6 py-6 space-y-2 font-bold text-slate-500 text-center">
                <!-- PERBAIKAN LINK NAVBAR MOBILE -->
                <a href="/" class="hover:text-blue-600 p-3 bg-slate-50/50 rounded-xl">Beranda</a>
                <a href="/pengalaman" class="hover:text-blue-600 p-3 bg-slate-50/50 rounded-xl">Pengalaman</a>
                <a href="/proyek" class="hover:text-blue-600 p-3 bg-slate-50/50 rounded-xl">Project</a>
                <a href="/tentang" class="hover:text-blue-600 p-3 bg-slate-50/50 rounded-xl">Tentang Saya</a>
            </div>
        </div>
    </header>

    <main class="pt-24">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-white border-t border-slate-100 pt-16 pb-10 mt-20" data-aos="fade-up">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-10">
                <div class="text-center md:text-left">
                    <a href="/" class="text-2xl font-black text-blue-900 tracking-tighter flex items-center justify-center md:justify-start gap-2 mb-3">
                        <div class="w-8 h-8 rounded-lg bg-blue-600 text-white flex items-center justify-center shadow-md shadow-blue-500/20">S</div>
                        Suprapto<span class="text-blue-500">.</span>
                    </a>
                    <p class="text-sm text-slate-500 max-w-xs font-medium">
                        Merancang arsitektur perangkat lunak dan antarmuka web yang efisien dan dapat diskalakan.
                    </p>
                </div>

                <div class="flex flex-col text-center space-y-2 font-bold text-slate-500 text-sm">
                    <span class="text-blue-900 tracking-widest uppercase text-xs mb-1">Navigasi</span>
                    <a href="/pengalaman" class="hover:text-blue-600 transition">Pengalaman Kerja</a>
                    <a href="/proyek" class="hover:text-blue-600 transition">Kumpulan Project</a>
                    <a href="/tentang" class="hover:text-blue-600 transition">Profil & Resume</a>
                </div>

                <div class="flex flex-col items-center md:items-end">
                    <span class="text-blue-900 font-bold tracking-widest uppercase mb-3 text-xs">Mari Terhubung</span>
                    <div class="flex gap-3">
                        <a href="https://github.com/suprapto" target="_blank" class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 hover:bg-blue-600 hover:text-white transition-all duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                        </a>
                        <a href="https://www.linkedin.com/in/supraptokulo" target="_blank" class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 hover:bg-blue-600 hover:text-white transition-all duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="mt-8 pt-8 border-t border-slate-100 text-center text-slate-400 text-xs font-semibold">
                &copy; {{ date('Y') }} Suprapto. Seluruh Hak Cipta Dilindungi.
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        // PERBAIKAN ANIMASI SCROLL (BOLAK-BALIK)
        AOS.init({ 
            once: false,  // Wajib false agar bisa berulang
            mirror: true, // Wajib true agar animasi fade out saat di-scroll ke atas
            offset: 50, 
            duration: 800, 
            easing: 'ease-out-cubic' 
        });
    </script>
    @stack('scripts')
</body>
</html>