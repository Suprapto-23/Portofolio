@extends('layouts.admin')

@section('content')
<div class="space-y-8 max-w-7xl mx-auto pb-10">

    <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-black text-blue-950 tracking-tight">Ringkasan Sistem</h1>
            <p class="text-sm text-slate-500 mt-2 font-medium">Pantau metrik portofolio Anda secara real-time.</p>
        </div>
        <div class="text-xs font-bold text-slate-400 bg-white px-4 py-2 rounded-xl border border-slate-100 shadow-sm">
            Diperbarui: {{ now()->translatedFormat('d M Y, H:i') }}
        </div>
    </div>

    <!-- Grid Statistik Utama -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-[0_4px_30px_rgb(0,0,0,0.03)] hover:shadow-lg hover:shadow-blue-900/5 transition-all flex items-center justify-between group">
            <div>
                <p class="text-sm font-bold text-slate-400 mb-1 group-hover:text-blue-500 transition-colors">Total Proyek</p>
                <h3 class="text-4xl font-black text-blue-950">{{ $stats['total_projects'] }}</h3>
                <p class="text-xs font-semibold text-slate-400 mt-1">{{ $stats['draft_projects'] }} masih draft</p>
            </div>
            <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center border border-blue-100 group-hover:scale-110 transition-transform shrink-0">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            </div>
        </div>

        <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-[0_4px_30px_rgb(0,0,0,0.03)] hover:shadow-lg hover:shadow-emerald-900/5 transition-all flex items-center justify-between group">
            <div>
                <p class="text-sm font-bold text-slate-400 mb-1 group-hover:text-emerald-500 transition-colors">Live Portofolio</p>
                <h3 class="text-4xl font-black text-blue-950">{{ $stats['published_projects'] }}</h3>
                <p class="text-xs font-semibold text-slate-400 mt-1">Tampil di halaman publik</p>
            </div>
            <div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center border border-emerald-100 group-hover:scale-110 transition-transform shrink-0">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>

        <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-[0_4px_30px_rgb(0,0,0,0.03)] hover:shadow-lg hover:shadow-indigo-900/5 transition-all flex items-center justify-between group">
            <div>
                <p class="text-sm font-bold text-slate-400 mb-1 group-hover:text-indigo-500 transition-colors">Pengalaman Kerja</p>
                <h3 class="text-4xl font-black text-blue-950">{{ $stats['total_experiences'] }}</h3>
                <p class="text-xs font-semibold text-slate-400 mt-1">{{ $stats['active_experiences'] }} sedang berjalan</p>
            </div>
            <div class="w-14 h-14 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center border border-indigo-100 group-hover:scale-110 transition-transform shrink-0">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            </div>
        </div>

        <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-[0_4px_30px_rgb(0,0,0,0.03)] hover:shadow-lg hover:shadow-amber-900/5 transition-all flex items-center justify-between group">
            <div>
                <p class="text-sm font-bold text-slate-400 mb-1 group-hover:text-amber-500 transition-colors">Keahlian (Skills)</p>
                <h3 class="text-4xl font-black text-blue-950">{{ $stats['total_skills'] }}</h3>
                <p class="text-xs font-semibold text-slate-400 mt-1">Rata-rata level {{ $stats['avg_skill_level'] }}%</p>
            </div>
            <div class="w-14 h-14 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center border border-amber-100 group-hover:scale-110 transition-transform shrink-0">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            </div>
        </div>
    </div>

    <!-- Baris Kedua: Distribusi Skill & Proyek Terbaru -->
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-6">

        <!-- Distribusi Skill per Kategori -->
        <div class="lg:col-span-2 bg-white rounded-[2rem] border border-slate-100 shadow-[0_4px_30px_rgb(0,0,0,0.03)] p-8">
            <h2 class="text-lg font-bold text-blue-950 mb-6">Distribusi Skill per Kategori</h2>

            @forelse($skillsByCategory as $item)
                <div class="mb-5 last:mb-0">
                    <div class="flex items-center justify-between mb-1.5">
                        <span class="text-sm font-bold text-slate-600">{{ $item->category }}</span>
                        <span class="text-xs font-bold text-slate-400">{{ $item->total }} skill &middot; avg {{ (int) $item->avg_level }}%</span>
                    </div>
                    <div class="w-full h-2.5 bg-slate-100 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full"
                             style="width: {{ max(4, round(($item->total / $maxSkillCategoryTotal) * 100)) }}%"></div>
                    </div>
                </div>
            @empty
                <div class="text-center py-10">
                    <p class="text-sm font-semibold text-slate-400">Belum ada data skill.</p>
                    <a href="{{ route('admin.skills.create') }}" class="text-sm font-bold text-blue-600 hover:underline mt-2 inline-block">+ Tambah skill pertama</a>
                </div>
            @endforelse
        </div>

        <!-- Proyek Terbaru -->
        <div class="lg:col-span-3 bg-white rounded-[2rem] border border-slate-100 shadow-[0_4px_30px_rgb(0,0,0,0.03)] p-8">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg font-bold text-blue-950">Proyek Terbaru</h2>
                <a href="{{ route('admin.projects.index') }}" class="text-xs font-bold text-blue-600 hover:underline">Lihat semua</a>
            </div>

            @forelse($recentProjects as $project)
                <div class="flex items-center justify-between py-3.5 {{ !$loop->last ? 'border-b border-slate-50' : '' }}">
                    <div class="min-w-0">
                        <p class="text-sm font-bold text-blue-950 truncate">{{ $project->title }}</p>
                        <p class="text-xs font-semibold text-slate-400 mt-0.5">
                            {{ $project->category ?? 'Tanpa kategori' }} &middot; {{ $project->created_at->diffForHumans() }}
                        </p>
                    </div>
                    @if($project->is_published)
                        <span class="shrink-0 ml-4 text-xs font-bold text-emerald-700 bg-emerald-50 border border-emerald-100 px-3 py-1 rounded-full">Publik</span>
                    @else
                        <span class="shrink-0 ml-4 text-xs font-bold text-amber-700 bg-amber-50 border border-amber-100 px-3 py-1 rounded-full">Draft</span>
                    @endif
                </div>
            @empty
                <div class="text-center py-10">
                    <p class="text-sm font-semibold text-slate-400">Belum ada proyek yang ditambahkan.</p>
                    <a href="{{ route('admin.projects.create') }}" class="text-sm font-bold text-blue-600 hover:underline mt-2 inline-block">+ Tambah proyek pertama</a>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Pengalaman Terbaru -->
    <div class="bg-white rounded-[2rem] border border-slate-100 shadow-[0_4px_30px_rgb(0,0,0,0.03)] p-8 lg:p-10">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-lg font-bold text-blue-950">Jejak Karir Terbaru</h2>
            <a href="{{ route('admin.experiences.index') }}" class="text-xs font-bold text-blue-600 hover:underline">Kelola pengalaman</a>
        </div>

        @forelse($recentExperiences as $experience)
            <div class="flex items-start gap-4 py-4 {{ !$loop->last ? 'border-b border-slate-50' : '' }}">
                <div class="w-2.5 h-2.5 rounded-full mt-1.5 shrink-0 {{ $experience->is_active ? 'bg-emerald-500' : 'bg-slate-300' }}"></div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-bold text-blue-950">{{ $experience->role }} &middot; {{ $experience->company_name }}</p>
                    <p class="text-xs font-semibold text-slate-400 mt-0.5">
                        {{ $experience->start_date->translatedFormat('M Y') }} &ndash;
                        {{ $experience->is_active ? 'Sekarang' : optional($experience->end_date)->translatedFormat('M Y') }}
                    </p>
                </div>
            </div>
        @empty
            <div class="text-center py-10">
                <p class="text-sm font-semibold text-slate-400">Belum ada riwayat pengalaman.</p>
                <a href="{{ route('admin.experiences.create') }}" class="text-sm font-bold text-blue-600 hover:underline mt-2 inline-block">+ Tambah pengalaman pertama</a>
            </div>
        @endforelse
    </div>

    <!-- Jalan Pintas -->
    <div class="bg-white rounded-[2rem] border border-slate-100 shadow-[0_4px_30px_rgb(0,0,0,0.03)] p-8 lg:p-10">
        <h2 class="text-xl font-bold text-blue-950 mb-6">Jalan Pintas Operasional</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <a href="{{ route('admin.settings.edit') }}" class="flex items-start p-6 border border-slate-100 rounded-3xl hover:border-blue-300 hover:bg-blue-50/50 hover:shadow-lg hover:shadow-blue-900/5 transition-all group">
                <div class="p-4 bg-slate-50 border border-slate-200 rounded-2xl group-hover:bg-white group-hover:border-blue-200 group-hover:text-blue-600 transition-colors shrink-0 text-slate-500 shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                </div>
                <div class="ml-5">
                    <p class="text-lg font-bold text-blue-950 mb-1 group-hover:text-blue-700">Pengaturan Web</p>
                    <p class="text-sm text-slate-500 font-medium leading-relaxed">Ubah judul utama, surel kontak, dan kelola tautan sosial media untuk footer publik.</p>
                </div>
            </a>

            <a href="{{ route('admin.projects.create') }}" class="flex items-start p-6 border border-slate-100 rounded-3xl hover:border-blue-300 hover:bg-blue-50/50 hover:shadow-lg hover:shadow-blue-900/5 transition-all group">
                <div class="p-4 bg-slate-50 border border-slate-200 rounded-2xl group-hover:bg-white group-hover:border-blue-200 group-hover:text-blue-600 transition-colors shrink-0 text-slate-500 shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                </div>
                <div class="ml-5">
                    <p class="text-lg font-bold text-blue-950 mb-1 group-hover:text-blue-700">Publikasi Proyek</p>
                    <p class="text-sm text-slate-500 font-medium leading-relaxed">Tambahkan entri portofolio baru, unggah gambar sampul, dan atur visibilitas ke ranah publik.</p>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
