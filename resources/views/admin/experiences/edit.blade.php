@extends('layouts.admin')

@section('content')
<div class="max-w-6xl mx-auto space-y-8">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-black text-blue-950">Pengalaman & Jejak</h1>
            <p class="text-sm text-slate-500 font-medium mt-1">Kelola riwayat pekerjaan dan organisasi yang tampil di halaman "Pengalaman".</p>
        </div>
        <a href="{{ route('admin.experiences.create') }}"
           class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-blue-600 text-white text-sm font-bold hover:bg-blue-700 transition shadow-sm shadow-blue-600/20 shrink-0">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Pengalaman
        </a>
    </div>

    {{-- Table Card --}}
    <div class="bg-white rounded-3xl border border-slate-200/70 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-slate-50/80 border-b border-slate-100">
                        <th class="text-left font-bold text-slate-500 uppercase tracking-wider text-xs px-6 py-4">Perusahaan / Peran</th>
                        <th class="text-left font-bold text-slate-500 uppercase tracking-wider text-xs px-6 py-4">Periode</th>
                        <th class="text-left font-bold text-slate-500 uppercase tracking-wider text-xs px-6 py-4">Status</th>
                        <th class="text-right font-bold text-slate-500 uppercase tracking-wider text-xs px-6 py-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($experiences as $experiences)
                        <tr class="hover:bg-slate-50/60 transition-colors">
                            <td class="px-6 py-4">
                                <div class="font-bold text-blue-950">{{ $experiences->company_name }}</div>
                                <div class="text-slate-500 font-medium">{{ $experiences->role }}</div>
                            </td>
                            <td class="px-6 py-4 text-slate-600 font-medium whitespace-nowrap">
                                {{ $experiences->start_date?->translatedFormat('M Y') }}
                                &ndash;
                                {{ $experiences->end_date?->translatedFormat('M Y') ?? 'Sekarang' }}
                            </td>
                            <td class="px-6 py-4">
                                @if($experiences->is_active)
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700">Aktif</span>
                                @else
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-slate-100 text-slate-500">Nonaktif</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.experiences.edit', $experiences) }}"
                                       class="p-2.5 rounded-xl bg-blue-50 text-blue-600 hover:bg-blue-100 transition" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                    <form action="{{ route('admin.experiences.destroy', $experiences) }}" method="POST"
                                          onsubmit="return confirm('Hapus data pengalaman ini? Tindakan tidak bisa dibatalkan.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2.5 rounded-xl bg-red-50 text-red-600 hover:bg-red-100 transition" title="Hapus">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-16 text-center text-slate-400 font-medium">
                                Belum ada data pengalaman. Klik "Tambah Pengalaman" untuk memulai.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($experiences->hasPages())
            <div class="px-6 py-4 border-t border-slate-100">
                {{ $experiences->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
