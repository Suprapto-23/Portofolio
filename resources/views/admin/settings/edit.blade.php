@extends('layouts.admin')

@section('content')
@php
    $inputClass = 'w-full px-4 py-3 rounded-xl border border-slate-200 text-sm font-medium text-slate-700 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500 transition';
    $labelClass = 'block text-sm font-bold text-slate-700 mb-2';
@endphp

<div class="max-w-4xl mx-auto space-y-8">

    <div>
        <h1 class="text-2xl font-black text-blue-950">Pengaturan Website</h1>
        <p class="text-sm text-slate-500 font-medium mt-1">Konten umum yang tampil di beranda, tentang, dan kontak.</p>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        {{-- Identitas Situs --}}
        <div class="bg-white rounded-3xl border border-slate-200/70 shadow-sm p-6 sm:p-8">
            <h2 class="text-sm font-black text-blue-950 uppercase tracking-wide mb-6">Identitas Situs</h2>

            <div>
                <label for="site_title" class="{{ $labelClass }}">Judul Situs</label>
                <input type="text" name="site_title" id="site_title"
                       value="{{ old('site_title', $setting->site_title) }}"
                       class="{{ $inputClass }} @error('site_title') border-red-400 @enderror"
                       placeholder="Portofolio Saya">
                @error('site_title') <p class="mt-1.5 text-xs font-bold text-red-500">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <div>
                    <label for="hero_title" class="{{ $labelClass }}">Judul Hero (Beranda)</label>
                    <input type="text" name="hero_title" id="hero_title"
                           value="{{ old('hero_title', $setting->hero_title) }}"
                           class="{{ $inputClass }} @error('hero_title') border-red-400 @enderror"
                           placeholder="Contoh: Halo, Saya Suprapto">
                    @error('hero_title') <p class="mt-1.5 text-xs font-bold text-red-500">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="email_contact" class="{{ $labelClass }}">Email Kontak</label>
                    <input type="email" name="email_contact" id="email_contact"
                           value="{{ old('email_contact', $setting->email_contact) }}"
                           class="{{ $inputClass }} @error('email_contact') border-red-400 @enderror"
                           placeholder="nama@email.com">
                    @error('email_contact') <p class="mt-1.5 text-xs font-bold text-red-500">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="mt-6">
                <label for="hero_subtitle" class="{{ $labelClass }}">Subjudul Hero</label>
                <textarea name="hero_subtitle" id="hero_subtitle" rows="2"
                          class="{{ $inputClass }} @error('hero_subtitle') border-red-400 @enderror"
                          placeholder="Kalimat singkat di bawah judul hero">{{ old('hero_subtitle', $setting->hero_subtitle) }}</textarea>
                @error('hero_subtitle') <p class="mt-1.5 text-xs font-bold text-red-500">{{ $message }}</p> @enderror
            </div>
        </div>

        {{-- Tentang Saya --}}
        <div class="bg-white rounded-3xl border border-slate-200/70 shadow-sm p-6 sm:p-8">
            <h2 class="text-sm font-black text-blue-950 uppercase tracking-wide mb-6">Tentang Saya</h2>

            <div>
                <label for="about_summary" class="{{ $labelClass }}">Ringkasan Singkat</label>
                <textarea name="about_summary" id="about_summary" rows="2"
                          class="{{ $inputClass }} @error('about_summary') border-red-400 @enderror"
                          placeholder="Ringkasan singkat yang tampil di beranda">{{ old('about_summary', $setting->about_summary) }}</textarea>
                @error('about_summary') <p class="mt-1.5 text-xs font-bold text-red-500">{{ $message }}</p> @enderror
            </div>

            <div class="mt-6">
                <label for="about_detail" class="{{ $labelClass }}">Detail Lengkap</label>
                <textarea name="about_detail" id="about_detail" rows="6"
                          class="{{ $inputClass }} @error('about_detail') border-red-400 @enderror"
                          placeholder="Cerita lengkap tentang dirimu untuk halaman Tentang">{{ old('about_detail', $setting->about_detail) }}</textarea>
                @error('about_detail') <p class="mt-1.5 text-xs font-bold text-red-500">{{ $message }}</p> @enderror
            </div>
        </div>

        {{-- Tautan & Dokumen --}}
        <div class="bg-white rounded-3xl border border-slate-200/70 shadow-sm p-6 sm:p-8">
            <h2 class="text-sm font-black text-blue-950 uppercase tracking-wide mb-6">Tautan & Dokumen</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="github_url" class="{{ $labelClass }}">URL GitHub</label>
                    <input type="url" name="github_url" id="github_url"
                           value="{{ old('github_url', $setting->github_url) }}"
                           class="{{ $inputClass }} @error('github_url') border-red-400 @enderror"
                           placeholder="https://github.com/username">
                    @error('github_url') <p class="mt-1.5 text-xs font-bold text-red-500">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="linkedin_url" class="{{ $labelClass }}">URL LinkedIn</label>
                    <input type="url" name="linkedin_url" id="linkedin_url"
                           value="{{ old('linkedin_url', $setting->linkedin_url) }}"
                           class="{{ $inputClass }} @error('linkedin_url') border-red-400 @enderror"
                           placeholder="https://linkedin.com/in/username">
                    @error('linkedin_url') <p class="mt-1.5 text-xs font-bold text-red-500">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="mt-6">
                <label for="resume_link" class="{{ $labelClass }}">Link CV / Resume</label>
                <input type="url" name="resume_link" id="resume_link"
                       value="{{ old('resume_link', $setting->resume_link) }}"
                       class="{{ $inputClass }} @error('resume_link') border-red-400 @enderror"
                       placeholder="https://drive.google.com/... (opsional jika upload file di bawah)">
                @error('resume_link') <p class="mt-1.5 text-xs font-bold text-red-500">{{ $message }}</p> @enderror
                <p class="mt-1.5 text-xs text-slate-400 font-medium">Isi link eksternal, atau upload file PDF di bawah untuk menggantikannya secara otomatis.</p>
            </div>

            <div class="mt-6">
                <label for="resume" class="{{ $labelClass }}">Upload CV Baru <span class="text-slate-400 font-medium">(PDF, opsional)</span></label>
                <input type="file" name="resume" id="resume" accept="application/pdf"
                       class="block w-full text-sm text-slate-600 font-medium file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-bold file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100 @error('resume') border-red-400 @enderror">
                @error('resume') <p class="mt-1.5 text-xs font-bold text-red-500">{{ $message }}</p> @enderror

                @if($setting->resume_link)
                    <a href="{{ $setting->resume_url }}" target="_blank"
                       class="mt-3 inline-flex items-center gap-2 text-xs font-bold text-blue-600 hover:underline">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H8a2 2 0 01-2-2V5a2 2 0 012-2h6l6 6v11a2 2 0 01-2 2z"></path></svg>
                        Lihat CV saat ini
                    </a>
                @endif
            </div>
        </div>

        <div class="flex items-center justify-end gap-3">
            <button type="submit"
                    class="px-6 py-3 rounded-xl bg-blue-600 text-white text-sm font-bold hover:bg-blue-700 transition shadow-sm shadow-blue-600/20">
                Simpan Pengaturan
            </button>
        </div>
    </form>
</div>
@endsection
