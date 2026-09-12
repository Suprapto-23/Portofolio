@php
    // Aman dipakai di create.blade.php (belum ada data) maupun edit.blade.php (sudah ada data).
    $project = isset($project) ? $project : null;

    $inputClass = 'w-full px-4 py-3 rounded-xl border border-slate-200 text-sm font-medium text-slate-700 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500 transition';
    $labelClass = 'block text-sm font-bold text-slate-700 mb-2';
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="md:col-span-2">
        <label for="title" class="{{ $labelClass }}">Judul Proyek</label>
        <input type="text" name="title" id="title"
               value="{{ old('title', $project?->title) }}"
               class="{{ $inputClass }} @error('title') border-red-400 @enderror"
               placeholder="Contoh: Sistem Diagnosis Sapi">
        @error('title') <p class="mt-1.5 text-xs font-bold text-red-500">{{ $message }}</p> @enderror
        @if($project)
            <p class="mt-1.5 text-xs text-slate-400 font-medium">
                Slug saat ini: <span class="font-bold text-slate-500">{{ $project->slug }}</span> &mdash; slug otomatis diperbarui kalau judul diubah.
            </p>
        @else
            <p class="mt-1.5 text-xs text-slate-400 font-medium">URL slug akan dibuat otomatis dari judul.</p>
        @endif
    </div>

    <div>
        <label for="category" class="{{ $labelClass }}">Kategori <span class="text-slate-400 font-medium">(opsional)</span></label>
        <input type="text" name="category" id="category"
               value="{{ old('category', $project?->category) }}"
               class="{{ $inputClass }} @error('category') border-red-400 @enderror"
               placeholder="Contoh: Big Data / Sistem Pakar">
        @error('category') <p class="mt-1.5 text-xs font-bold text-red-500">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="client_name" class="{{ $labelClass }}">Nama Klien <span class="text-slate-400 font-medium">(opsional)</span></label>
        <input type="text" name="client_name" id="client_name"
               value="{{ old('client_name', $project?->client_name) }}"
               class="{{ $inputClass }} @error('client_name') border-red-400 @enderror"
               placeholder="Contoh: Lolong Adventure">
        @error('client_name') <p class="mt-1.5 text-xs font-bold text-red-500">{{ $message }}</p> @enderror
    </div>
</div>

<div class="mt-6">
    <label for="short_description" class="{{ $labelClass }}">Deskripsi Singkat</label>
    <textarea name="short_description" id="short_description" rows="2"
              class="{{ $inputClass }} @error('short_description') border-red-400 @enderror"
              placeholder="Ringkasan yang tampil di kartu daftar proyek">{{ old('short_description', $project?->short_description) }}</textarea>
    @error('short_description') <p class="mt-1.5 text-xs font-bold text-red-500">{{ $message }}</p> @enderror
</div>

<div class="mt-6">
    <label for="content_detail" class="{{ $labelClass }}">Detail Lengkap Proyek</label>
    <textarea name="content_detail" id="content_detail" rows="8"
              class="{{ $inputClass }} @error('content_detail') border-red-400 @enderror"
              placeholder="Cerita lengkap: latar belakang, teknologi yang dipakai, tantangan, hasil, dsb.">{{ old('content_detail', $project?->content_detail) }}</textarea>
    @error('content_detail') <p class="mt-1.5 text-xs font-bold text-red-500">{{ $message }}</p> @enderror
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
    <div>
        <label for="project_url" class="{{ $labelClass }}">URL Live Demo <span class="text-slate-400 font-medium">(opsional)</span></label>
        <input type="url" name="project_url" id="project_url"
               value="{{ old('project_url', $project?->project_url) }}"
               class="{{ $inputClass }} @error('project_url') border-red-400 @enderror"
               placeholder="https://contoh-proyek.com">
        @error('project_url') <p class="mt-1.5 text-xs font-bold text-red-500">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="repository_url" class="{{ $labelClass }}">URL Repository <span class="text-slate-400 font-medium">(opsional)</span></label>
        <input type="url" name="repository_url" id="repository_url"
               value="{{ old('repository_url', $project?->repository_url) }}"
               class="{{ $inputClass }} @error('repository_url') border-red-400 @enderror"
               placeholder="https://github.com/username/repo">
        @error('repository_url') <p class="mt-1.5 text-xs font-bold text-red-500">{{ $message }}</p> @enderror
    </div>
</div>

<div class="mt-6" x-data="{
        preview: null,
        existing: @js($project?->cover_image ? asset('storage/' . $project->cover_image) : null),
        onFile(e) {
            const file = e.target.files[0];
            if (!file) { this.preview = null; return; }
            this.preview = URL.createObjectURL(file);
        }
    }">
    <label for="cover_image" class="{{ $labelClass }}">Gambar Sampul <span class="text-slate-400 font-medium">(JPG/PNG/WEBP, maks 2MB)</span></label>
    <input type="file" name="cover_image" id="cover_image" accept="image/jpeg,image/png,image/webp"
           @change="onFile"
           class="block w-full text-sm text-slate-600 font-medium file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-bold file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100 @error('cover_image') border-red-400 @enderror">
    @error('cover_image') <p class="mt-1.5 text-xs font-bold text-red-500">{{ $message }}</p> @enderror

    <!-- Preview gambar baru yang baru saja dipilih (belum disimpan) -->
    <div class="mt-3 flex items-center gap-3" x-show="preview" x-cloak>
        <img :src="preview" alt="Preview" class="w-24 aspect-video object-cover rounded-xl border border-blue-300 ring-2 ring-blue-100">
        <span class="text-xs text-blue-600 font-bold">Gambar baru siap diupload &mdash; klik simpan untuk menerapkannya.</span>
    </div>

    <!-- Gambar yang sudah tersimpan di database (hanya tampil kalau belum pilih file baru) -->
    <div class="mt-3 flex items-center gap-3" x-show="existing && !preview" x-cloak>
        <img :src="existing" alt="{{ $project->title ?? '' }}" class="w-24 aspect-video object-cover rounded-xl border border-slate-200">
        <span class="text-xs text-slate-500 font-medium">Gambar saat ini &mdash; upload file baru untuk menggantinya.</span>
    </div>
</div>

<div class="mt-6 flex items-center justify-between bg-slate-50 rounded-2xl px-5 py-4">
    <div>
        <div class="text-sm font-bold text-slate-700">Publikasikan proyek</div>
        <div class="text-xs text-slate-500 font-medium mt-0.5">Nonaktifkan untuk menyimpan sebagai draft, tidak tampil di halaman publik.</div>
    </div>
    <label class="relative inline-flex items-center cursor-pointer">
        <input type="checkbox" name="is_published" value="1" class="sr-only peer"
               {{ old('is_published', $project?->is_published ?? false) ? 'checked' : '' }}>
        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
    </label>
</div>