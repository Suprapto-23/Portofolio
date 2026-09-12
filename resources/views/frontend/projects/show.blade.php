@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-20 pb-32">

    <a href="{{ route('project.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-blue-600 hover:underline mb-8">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        Kembali ke Semua Proyek
    </a>

    @if($project->cover_image)
        <div class="rounded-[2rem] overflow-hidden mb-10 shadow-sm border border-blue-50">
            <img src="{{ asset('storage/' . $project->cover_image) }}" alt="{{ $project->title }}" class="w-full h-auto object-cover">
        </div>
    @endif

    @if($project->category)
        <span class="inline-block text-xs font-bold bg-blue-50 text-blue-600 px-3 py-1 rounded mb-4">{{ $project->category }}</span>
    @endif

    <h1 class="text-3xl md:text-4xl font-black text-blue-950 mb-4">{{ $project->title }}</h1>

    @if($project->client_name)
        <p class="text-sm text-slate-500 font-medium mb-8">Klien / Organisasi: <span class="font-bold text-slate-700">{{ $project->client_name }}</span></p>
    @endif

    <div class="text-slate-600 font-medium leading-relaxed whitespace-pre-line">
        {{ $project->content_detail }}
    </div>

    <div class="flex flex-wrap gap-4 mt-10">
        @if($project->project_url)
            <a href="{{ $project->project_url }}" target="_blank" class="px-6 py-3 bg-blue-600 text-white font-bold rounded-xl hover:bg-blue-700 transition-colors">
                Kunjungi Website
            </a>
        @endif
        @if($project->repository_url)
            <a href="{{ $project->repository_url }}" target="_blank" class="px-6 py-3 bg-slate-100 text-slate-700 font-bold rounded-xl hover:bg-slate-200 transition-colors">
                Lihat Repository
            </a>
        @endif
    </div>
</div>
@endsection