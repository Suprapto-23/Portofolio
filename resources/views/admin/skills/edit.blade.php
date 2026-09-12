@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto space-y-8">

    <div class="flex items-center gap-4">
        <a href="{{ route('admin.skills.index') }}"
           class="p-2.5 rounded-xl bg-white border border-slate-200 text-slate-500 hover:text-blue-600 hover:border-blue-200 transition shadow-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        </a>
        <div>
            <h1 class="text-2xl font-black text-blue-950">Edit Skill</h1>
            <p class="text-sm text-slate-500 font-medium mt-1">{{ $skill->name }}</p>
        </div>
    </div>

    <form action="{{ route('admin.skills.update', $skill) }}" method="POST" enctype="multipart/form-data"
          class="bg-white rounded-3xl border border-slate-200/70 shadow-sm p-6 sm:p-8">
        @csrf
        @method('PUT')
        @include('admin.skills._form')

        <div class="mt-8 flex items-center justify-end gap-3">
            <a href="{{ route('admin.skills.index') }}"
               class="px-5 py-3 rounded-xl bg-white text-slate-600 text-sm font-bold border border-slate-200 hover:bg-slate-50 transition">
                Batal
            </a>
            <button type="submit"
                    class="px-6 py-3 rounded-xl bg-blue-600 text-white text-sm font-bold hover:bg-blue-700 transition shadow-sm shadow-blue-600/20">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
