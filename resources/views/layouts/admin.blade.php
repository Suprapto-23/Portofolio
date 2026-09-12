<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Workspace - Portofolio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="font-sans antialiased text-slate-800 bg-slate-50 overflow-hidden" x-data="{ sidebarOpen: window.innerWidth >= 1024 }">

    <!-- Wrapper Utama Latar Belakang -->
    <div class="flex h-screen w-full bg-slate-50/50">
        
        <!-- Panggil Komponen Sidebar -->
        @include('layouts.partials.sidebar')

        <!-- Area Konten Utama -->
        <div class="flex-1 flex flex-col min-w-0 h-screen overflow-hidden transition-all duration-300">
            
            <!-- Top Navbar Konten -->
            <header class="bg-white/80 backdrop-blur-md border-b border-slate-200/60 h-20 flex shrink-0 items-center justify-between px-6 lg:px-10 z-10">
                <div class="flex items-center">
                    <!-- Tombol Hide/Show Sidebar -->
                    <button @click="sidebarOpen = !sidebarOpen" class="text-slate-400 hover:text-blue-600 focus:outline-none p-2 bg-white rounded-xl border border-slate-200 hover:border-blue-200 shadow-sm transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                </div>
                
                <div class="flex items-center gap-5">
                    <div class="hidden sm:flex items-center gap-3 bg-white px-4 py-2 rounded-2xl border border-slate-100 shadow-sm">
                        <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs">
                            {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                        </div>
                        <div class="text-sm font-bold text-blue-950">
                            {{ Auth::user()->name ?? 'Admin' }}
                        </div>
                    </div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm px-6 py-2.5 rounded-xl font-bold text-red-600 bg-red-50 hover:bg-red-600 hover:text-white transition-all shadow-sm">Logout</button>
                    </form>
                </div>
            </header>

            <!-- Area Scroll Khusus Konten -->
            <main class="flex-1 w-full h-full overflow-y-auto p-6 sm:p-8 lg:p-10 scroll-smooth relative">
                
                @if(session('success'))
                    <div x-data="{ show: true }" x-show="show" class="mb-8 p-5 rounded-2xl bg-emerald-50 border border-emerald-100 flex justify-between items-center shadow-sm">
                        <div class="flex items-center text-emerald-800">
                            <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center mr-4">
                                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <span class="text-sm font-bold">{{ session('success') }}</span>
                        </div>
                        <button @click="show = false" class="text-emerald-600 hover:text-emerald-800 p-2 rounded-lg hover:bg-emerald-100 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>
                @endif

                <!-- Yield Tempat Dasbor Dimuat -->
                @yield('content')

            </main>
            
        </div>
    </div>

</body>
</html>