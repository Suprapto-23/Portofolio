@extends('layouts.admin')

@section('content')
<div class="max-w-6xl mx-auto space-y-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-black text-blue-950">Manajemen Proyek</h1>
            <p class="text-sm text-slate-500 font-medium mt-1">Kelola karya/proyek yang tampil di halaman "Project".</p>
        </div>
        <a href="{{ route('admin.projects.create') }}"
           class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-blue-600 text-white text-sm font-bold hover:bg-blue-700 transition shadow-sm shadow-blue-600/20 shrink-0">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Proyek
        </a>
    </div>

    {{-- Daftar Proyek (tabel) --}}
    <div class="bg-white rounded-3xl border border-slate-200/70 shadow-sm overflow-hidden">

        @if($projects->isEmpty())
            <div class="px-6 py-16 text-center text-slate-400 font-medium">
                Belum ada proyek. Klik "Tambah Proyek" untuk memulai.
            </div>
        @else
            {{-- Header kolom, desktop saja --}}
            <div class="hidden md:flex items-center gap-4 px-6 py-3.5 bg-slate-50/70 border-b border-slate-200/70 text-xs font-bold text-slate-400 uppercase tracking-wider">
                <div class="w-14 shrink-0">Cover</div>
                <div class="flex-1 min-w-0">Proyek</div>
                <div class="w-32 shrink-0">Kategori</div>
                <div class="w-24 shrink-0">Status</div>
                <div class="w-28 shrink-0 text-right">Aksi</div>
            </div>

            <div class="divide-y divide-slate-100">
                @foreach($projects as $project)
                    <div class="flex flex-col sm:flex-row sm:items-center gap-4 px-6 py-4 hover:bg-slate-50/60 transition-colors">

                        {{-- Cover thumbnail --}}
                        <div class="w-14 h-14 rounded-xl bg-slate-100 overflow-hidden shrink-0">
                            @if($project->cover_image)
                                <img src="{{ $project->cover_image }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M14 8h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                        </div>

                        {{-- Judul & deskripsi --}}
                        <div class="flex-1 min-w-0">
                            <h2 class="font-black text-blue-950 leading-snug truncate">{{ $project->title }}</h2>
                            <p class="text-sm text-slate-500 font-medium mt-0.5 truncate">{{ $project->short_description }}</p>
                            {{-- Kategori & status muncul di sini khusus mobile --}}
                            <div class="flex md:hidden items-center gap-2 mt-2">
                                @if($project->category)
                                    <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-blue-50 text-blue-700">{{ $project->category }}</span>
                                @endif
                                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold {{ $project->is_published ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                                    {{ $project->is_published ? 'Published' : 'Draft' }}
                                </span>
                            </div>
                        </div>

                        {{-- Kategori, desktop --}}
                        <div class="hidden md:block w-32 shrink-0">
                            @if($project->category)
                                <span class="inline-block px-2.5 py-1 rounded-full text-xs font-bold bg-blue-50 text-blue-700 truncate max-w-full">{{ $project->category }}</span>
                            @else
                                <span class="text-xs text-slate-300 font-medium">&mdash;</span>
                            @endif
                        </div>

                        {{-- Status, desktop --}}
                        <div class="hidden md:block w-24 shrink-0">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold {{ $project->is_published ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ $project->is_published ? 'bg-emerald-500' : 'bg-slate-400' }}"></span>
                                {{ $project->is_published ? 'Published' : 'Draft' }}
                            </span>
                        </div>

                        {{-- Aksi: Edit, Aktifkan/Nonaktifkan, Hapus --}}
                        <div class="flex items-center gap-1.5 w-full sm:w-28 shrink-0 justify-end pt-1 sm:pt-0 border-t sm:border-0 border-slate-100">

                            <a href="{{ route('admin.projects.edit', $project) }}"
                               class="p-2 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition" title="Edit">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </a>

                            <form action="{{ route('admin.projects.toggle-publish', $project) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                @if($project->is_published)
                                    <button type="submit" class="p-2 rounded-lg bg-amber-50 text-amber-600 hover:bg-amber-100 transition" title="Nonaktifkan (jadikan draft)">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path></svg>
                                    </button>
                                @else
                                    <button type="submit" class="p-2 rounded-lg bg-emerald-50 text-emerald-600 hover:bg-emerald-100 transition" title="Aktifkan (publikasikan)">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    </button>
                                @endif
                            </form>

                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST"
                                  onsubmit="return confirm('Hapus proyek {{ $project->title }}? Gambar juga akan terhapus.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition" title="Hapus">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </form>

                        </div>

                    </div>
                @endforeach
            </div>
        @endif
    </div>

    {{-- Pagination premium, inline langsung di file ini (tidak butuh view terpisah) --}}
    @if($projects->hasPages())
        <div class="bg-white rounded-3xl border border-slate-200/70 shadow-sm px-6 py-4 flex flex-col sm:flex-row items-center justify-between gap-4">

            <p class="text-xs font-medium text-slate-400 order-2 sm:order-1">
                Menampilkan <span class="font-bold text-slate-600">{{ $projects->firstItem() }}</span>
                &ndash; <span class="font-bold text-slate-600">{{ $projects->lastItem() }}</span>
                dari <span class="font-bold text-slate-600">{{ $projects->total() }}</span> proyek
            </p>

            <nav class="flex items-center gap-1.5 order-1 sm:order-2">
                {{-- Sebelumnya --}}
                @if ($projects->onFirstPage())
                    <span class="w-9 h-9 flex items-center justify-center rounded-xl text-slate-300 bg-slate-50 cursor-not-allowed">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                    </span>
                @else
                    <a href="{{ $projects->previousPageUrl() }}" rel="prev"
                       class="w-9 h-9 flex items-center justify-center rounded-xl text-slate-500 bg-slate-50 hover:bg-blue-50 hover:text-blue-600 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                    </a>
                @endif

                {{-- Nomor halaman (proyek portofolio biasanya tidak banyak, jadi tampil semua tanpa elipsis) --}}
                @for ($page = 1; $page <= $projects->lastPage(); $page++)
                    @if ($page == $projects->currentPage())
                        <span class="w-9 h-9 flex items-center justify-center rounded-xl text-sm font-bold bg-blue-600 text-white shadow-sm shadow-blue-600/30">{{ $page }}</span>
                    @else
                        <a href="{{ $projects->url($page) }}"
                           class="w-9 h-9 flex items-center justify-center rounded-xl text-sm font-bold text-slate-500 bg-slate-50 hover:bg-blue-50 hover:text-blue-600 transition">{{ $page }}</a>
                    @endif
                @endfor

                {{-- Berikutnya --}}
                @if ($projects->hasMorePages())
                    <a href="{{ $projects->nextPageUrl() }}" rel="next"
                       class="w-9 h-9 flex items-center justify-center rounded-xl text-slate-500 bg-slate-50 hover:bg-blue-50 hover:text-blue-600 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                @else
                    <span class="w-9 h-9 flex items-center justify-center rounded-xl text-slate-300 bg-slate-50 cursor-not-allowed">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                    </span>
                @endif
            </nav>
        </div>
    @endif

</div>
@endsection