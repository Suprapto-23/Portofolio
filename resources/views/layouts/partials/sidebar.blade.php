<!-- Overlay Gelap (Hanya aktif di Mobile saat sidebar terbuka) -->
<div x-show="sidebarOpen" class="fixed inset-0 z-20 bg-slate-900/50 backdrop-blur-sm lg:hidden" @click="sidebarOpen = false" x-transition.opacity></div>

<!-- Komponen Sidebar -->
<aside :class="sidebarOpen ? 'translate-x-0 w-64' : '-translate-x-full w-0 lg:w-0 lg:-translate-x-full'" class="fixed lg:static inset-y-0 left-0 z-30 bg-white border-r border-slate-200 transition-all duration-300 flex flex-col h-full shrink-0 overflow-hidden shadow-[4px_0_24px_rgba(0,0,0,0.02)]">
    
    <div class="w-64 flex flex-col h-full">
        <!-- Header Logo Sidebar -->
        <div class="flex items-center justify-between h-20 px-6 border-b border-slate-100 shrink-0">
            <a href="{{ route('admin.dashboard') }}" class="text-xl font-black tracking-tighter text-blue-950 flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg bg-blue-600 text-white flex items-center justify-center shadow-md">S</div>
                Workspace<span class="text-blue-600">.</span>
            </a>
        </div>

        <!-- Menu Navigasi -->
        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-sm font-bold rounded-xl transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-700' : 'text-slate-500 hover:bg-slate-50 hover:text-blue-600' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                Dashboard
            </a>
            <a href="{{ route('admin.projects.index') }}" class="flex items-center px-4 py-3 text-sm font-bold rounded-xl transition-colors {{ request()->routeIs('admin.projects.*') ? 'bg-blue-50 text-blue-700' : 'text-slate-500 hover:bg-slate-50 hover:text-blue-600' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                Manajemen Proyek
            </a>
            <a href="{{ route('admin.experiences.index') }}" class="flex items-center px-4 py-3 text-sm font-bold rounded-xl transition-colors {{ request()->routeIs('admin.experiences.*') ? 'bg-blue-50 text-blue-700' : 'text-slate-500 hover:bg-slate-50 hover:text-blue-600' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                Pengalaman & Jejak
            </a>
            <a href="{{ route('admin.skills.index') }}" class="flex items-center px-4 py-3 text-sm font-bold rounded-xl transition-colors {{ request()->routeIs('admin.skills.*') ? 'bg-blue-50 text-blue-700' : 'text-slate-500 hover:bg-slate-50 hover:text-blue-600' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                Keahlian (Skills)
            </a>
            <a href="{{ route('admin.settings.edit') }}" class="flex items-center px-4 py-3 text-sm font-bold rounded-xl transition-colors {{ request()->routeIs('admin.settings.*') ? 'bg-blue-50 text-blue-700' : 'text-slate-500 hover:bg-slate-50 hover:text-blue-600' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                Pengaturan Web
            </a>
        </nav>
    </div>
</aside>