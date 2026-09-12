@php
    // Aman dipakai di create.blade.php (belum ada data) maupun edit.blade.php (sudah ada data).
    // isset() dipakai (bukan $experience ?? null) supaya tidak memicu "Undefined variable".
    $experience = isset($experience) ? $experience : null;

    $inputClass = 'w-full px-4 py-3 rounded-xl border border-slate-200 text-sm font-medium text-slate-700 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500 transition';
    $labelClass = 'block text-sm font-bold text-slate-700 mb-2';
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label for="company_name" class="{{ $labelClass }}">Nama Perusahaan / Organisasi</label>
        <input type="text" name="company_name" id="company_name"
               value="{{ old('company_name', $experience?->company_name) }}"
               class="{{ $inputClass }} @error('company_name') border-red-400 @enderror"
               placeholder="Contoh: PT Teknologi Maju">
        @error('company_name') <p class="mt-1.5 text-xs font-bold text-red-500">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="role" class="{{ $labelClass }}">Jabatan / Peran</label>
        <input type="text" name="role" id="role"
               value="{{ old('role', $experience?->role) }}"
               class="{{ $inputClass }} @error('role') border-red-400 @enderror"
               placeholder="Contoh: Backend Developer">
        @error('role') <p class="mt-1.5 text-xs font-bold text-red-500">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="start_date" class="{{ $labelClass }}">Tanggal Mulai</label>
        <input type="date" name="start_date" id="start_date"
               value="{{ old('start_date', $experience?->start_date?->format('Y-m-d')) }}"
               class="{{ $inputClass }} @error('start_date') border-red-400 @enderror">
        @error('start_date') <p class="mt-1.5 text-xs font-bold text-red-500">{{ $message }}</p> @enderror
    </div>

    <div x-data="{ ongoing: {{ old('end_date', $experience?->end_date?->format('Y-m-d')) ? 'false' : 'true' }} }">
        <div class="flex items-center justify-between mb-2">
            <label for="end_date" class="{{ $labelClass }} mb-0">Tanggal Selesai</label>
            <label class="inline-flex items-center gap-2 text-xs font-bold text-slate-500 cursor-pointer">
                <input type="checkbox" x-model="ongoing" @change="if(ongoing) document.getElementById('end_date').value = ''"
                       class="rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                Masih berjalan
            </label>
        </div>
        <input type="date" name="end_date" id="end_date" x-bind:disabled="ongoing"
               value="{{ old('end_date', $experience?->end_date?->format('Y-m-d')) }}"
               class="{{ $inputClass }} disabled:bg-slate-50 disabled:text-slate-400 @error('end_date') border-red-400 @enderror">
        @error('end_date') <p class="mt-1.5 text-xs font-bold text-red-500">{{ $message }}</p> @enderror
    </div>
</div>

<div class="mt-6">
    <label for="summary" class="{{ $labelClass }}">Ringkasan Singkat</label>
    <textarea name="summary" id="summary" rows="2"
              class="{{ $inputClass }} @error('summary') border-red-400 @enderror"
              placeholder="Satu-dua kalimat ringkasan yang tampil di daftar pengalaman">{{ old('summary', $experience?->summary) }}</textarea>
    @error('summary') <p class="mt-1.5 text-xs font-bold text-red-500">{{ $message }}</p> @enderror
</div>

<div class="mt-6">
    <label for="description_detail" class="{{ $labelClass }}">Detail Lengkap <span class="text-slate-400 font-medium">(opsional)</span></label>
    <textarea name="description_detail" id="description_detail" rows="6"
              class="{{ $inputClass }} @error('description_detail') border-red-400 @enderror"
              placeholder="Deskripsi lengkap tanggung jawab, pencapaian, teknologi yang dipakai, dsb.">{{ old('description_detail', $experience?->description_detail) }}</textarea>
    @error('description_detail') <p class="mt-1.5 text-xs font-bold text-red-500">{{ $message }}</p> @enderror
</div>

<div class="mt-6 flex items-center justify-between bg-slate-50 rounded-2xl px-5 py-4">
    <div>
        <div class="text-sm font-bold text-slate-700">Tampilkan sebagai pengalaman aktif</div>
        <div class="text-xs text-slate-500 font-medium mt-0.5">Nonaktifkan jika ingin menyembunyikan tanpa menghapus datanya.</div>
    </div>
    <label class="relative inline-flex items-center cursor-pointer">
        <input type="checkbox" name="is_active" value="1" class="sr-only peer"
               {{ old('is_active', $experience?->is_active ?? true) ? 'checked' : '' }}>
        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
    </label>
</div>