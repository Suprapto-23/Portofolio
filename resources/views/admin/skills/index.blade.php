@extends('layouts.admin')

@section('content')
<div class="max-w-6xl mx-auto space-y-8">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-black text-blue-950">Keahlian (Skills)</h1>
            <p class="text-sm text-slate-500 font-medium mt-1">Kelola daftar teknologi dan tingkat keahlian yang tampil di halaman "Tentang".</p>
        </div>
        <a href="{{ route('admin.skills.create') }}"
           class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-blue-600 text-white text-sm font-bold hover:bg-blue-700 transition shadow-sm shadow-blue-600/20 shrink-0">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Skill
        </a>
    </div>

    @forelse($skills as $category => $items)
        <div class="bg-white rounded-3xl border border-slate-200/70 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-100 bg-slate-50/80">
                <h2 class="text-sm font-black text-blue-950 uppercase tracking-wide">{{ $category }}</h2>
            </div>
            <div class="divide-y divide-slate-100">
                @foreach($items as $skill)
                    <div class="flex items-center gap-4 px-6 py-4 hover:bg-slate-50/60 transition-colors">
                        <div class="w-11 h-11 rounded-xl bg-blue-50 flex items-center justify-center shrink-0 overflow-hidden">
                            @if($skill->icon_path)
                                <img src="{{ asset('storage/' . $skill->icon_path) }}" alt="{{ $skill->name }}" class="w-6 h-6 object-contain">
                            @else
                                <span class="text-blue-600 font-black text-sm">{{ strtoupper(substr($skill->name, 0, 1)) }}</span>
                            @endif
                        </div>

                        <div class="flex-1 min-w-0">
                            <div class="font-bold text-blue-950 truncate">{{ $skill->name }}</div>
                            <div class="mt-1.5 h-2 w-full max-w-xs bg-slate-100 rounded-full overflow-hidden">
                                <div class="h-full bg-blue-600 rounded-full" style="width: {{ $skill->proficiency_percentage ?? 0 }}%"></div>
                            </div>
                        </div>

                        <div class="text-sm font-bold text-slate-500 w-12 text-right shrink-0">
                            {{ $skill->proficiency_percentage ?? 0 }}%
                        </div>

                        <div class="flex items-center gap-2 shrink-0">
                            <a href="{{ route('admin.skills.edit', $skill) }}"
                               class="p-2.5 rounded-xl bg-blue-50 text-blue-600 hover:bg-blue-100 transition" title="Edit">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </a>
                            <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST"
                                  onsubmit="return confirm('Hapus skill {{ $skill->name }}?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2.5 rounded-xl bg-red-50 text-red-600 hover:bg-red-100 transition" title="Hapus">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @empty
        <div class="bg-white rounded-3xl border border-slate-200/70 shadow-sm px-6 py-16 text-center text-slate-400 font-medium">
            Belum ada data skill. Klik "Tambah Skill" untuk memulai.
        </div>
    @endforelse
</div>
@endsection
