@php
    $skill = $skill ?? null;
    $inputClass = 'w-full px-4 py-3 rounded-xl border border-slate-200 text-sm font-medium text-slate-700 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500 transition';
    $labelClass = 'block text-sm font-bold text-slate-700 mb-2';
    $categories = ['Frontend', 'Backend', 'Database', 'Tools', 'Lainnya'];
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label for="name" class="{{ $labelClass }}">Nama Skill</label>
        <input type="text" name="name" id="name"
               value="{{ old('name', $skill?->name) }}"
               class="{{ $inputClass }} @error('name') border-red-400 @enderror"
               placeholder="Contoh: Laravel">
        @error('name') <p class="mt-1.5 text-xs font-bold text-red-500">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="category" class="{{ $labelClass }}">Kategori</label>
        <select name="category" id="category"
                class="{{ $inputClass }} @error('category') border-red-400 @enderror">
            @foreach($categories as $category)
                <option value="{{ $category }}" {{ old('category', $skill?->category) === $category ? 'selected' : '' }}>
                    {{ $category }}
                </option>
            @endforeach
        </select>
        @error('category') <p class="mt-1.5 text-xs font-bold text-red-500">{{ $message }}</p> @enderror
    </div>
</div>

<div class="mt-6" x-data="{ value: {{ old('proficiency_percentage', $skill?->proficiency_percentage ?? 70) }} }">
    <div class="flex items-center justify-between mb-2">
        <label for="proficiency_percentage" class="{{ $labelClass }} mb-0">Tingkat Keahlian</label>
        <span class="text-sm font-black text-blue-600" x-text="value + '%'"></span>
    </div>
    <input type="range" name="proficiency_percentage" id="proficiency_percentage" min="0" max="100" step="5"
           x-model="value"
           value="{{ old('proficiency_percentage', $skill?->proficiency_percentage ?? 70) }}"
           class="w-full h-2 rounded-full bg-slate-100 accent-blue-600 cursor-pointer">
    @error('proficiency_percentage') <p class="mt-1.5 text-xs font-bold text-red-500">{{ $message }}</p> @enderror
</div>

<div class="mt-6">
    <label for="icon" class="{{ $labelClass }}">Ikon Skill <span class="text-slate-400 font-medium">(opsional, gambar)</span></label>
    <input type="file" name="icon" id="icon" accept="image/*"
           class="block w-full text-sm text-slate-600 font-medium file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-bold file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100">
    @error('icon') <p class="mt-1.5 text-xs font-bold text-red-500">{{ $message }}</p> @enderror

    @if($skill?->icon_path)
        <div class="mt-3 flex items-center gap-3">
            <img src="{{ asset('storage/' . $skill->icon_path) }}" alt="{{ $skill->name }}" class="w-10 h-10 object-contain rounded-lg border border-slate-200 p-1.5">
            <span class="text-xs text-slate-500 font-medium">Ikon saat ini &mdash; upload file baru untuk menggantinya.</span>
        </div>
    @endif
</div>
