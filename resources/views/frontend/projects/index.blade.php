@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 pb-32">

    <div class="text-center mb-16" data-aos="fade-down">
        <h1 class="text-4xl md:text-5xl font-black text-blue-950 tracking-tight mb-4">Kumpulan <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-blue-400">Karya</span></h1>
        <p class="text-lg text-slate-500 font-medium">Implementasi arsitektur perangkat lunak ke dalam sistem fungsional.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($projects as $project)
            <div class="bg-white/80 backdrop-blur rounded-[2rem] border border-blue-50 overflow-hidden shadow-sm hover:shadow-xl hover:shadow-blue-900/5 hover:-translate-y-2 transition-all duration-500 flex flex-col group" data-aos="fade-up">
                <div class="h-64 overflow-hidden bg-slate-50 relative">
                    @if($project->cover_image)
                        <img src="{{ asset('storage/' . $project->cover_image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-700">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-slate-300">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M14 8h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                    @endif
                </div>
                <div class="p-8 flex flex-col flex-grow">
                    @if($project->category)
                        <div class="mb-3">
                            <span class="text-xs font-bold bg-blue-50 text-blue-600 px-2 py-1 rounded">{{ $project->category }}</span>
                        </div>
                    @endif
                    <h3 class="text-xl font-bold text-blue-950 mb-3 group-hover:text-blue-600 transition-colors">{{ $project->title }}</h3>
                    <p class="text-slate-500 text-sm leading-relaxed mb-8 flex-grow font-medium">{{ $project->short_description }}</p>

                    <div class="flex gap-3">
                        <a href="{{ route('project.show', $project->slug) }}" class="flex-1 text-center px-4 py-3 bg-blue-600 text-white font-bold rounded-xl hover:bg-blue-700 transition-colors">
                            Lihat Detail
                        </a>
                        @if($project->project_url)
                            <a href="{{ $project->project_url }}" target="_blank" class="flex-1 text-center px-4 py-3 bg-blue-50 text-blue-600 font-bold rounded-xl hover:bg-blue-100 transition-colors">
                                Kunjungi
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-24 text-slate-400 font-medium">
                Belum ada proyek yang dipublikasikan.
            </div>
        @endforelse
    </div>

    @if($projects->hasPages())
        <div class="mt-16">
            {{ $projects->links() }}
        </div>
    @endif
</div>
@endsection