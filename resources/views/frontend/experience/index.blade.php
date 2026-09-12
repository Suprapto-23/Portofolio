@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-20 pb-32">
    
    <div class="text-center mb-20" data-aos="fade-down">
        <h1 class="text-4xl md:text-5xl font-black text-blue-950 tracking-tight mb-4">Jejak <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-blue-400">Profesional</span></h1>
        <p class="text-lg text-slate-500 font-medium">Pengalaman kerja dan implementasi sistem nyata.</p>
    </div>

    <!-- Timeline Container -->
    <div class="relative before:absolute before:inset-y-0 before:left-8 md:before:left-1/2 md:before:-ml-0.5 before:w-1 before:bg-blue-100 space-y-12">
        
        <!-- Experience 1 -->
        <div class="relative flex flex-col md:flex-row items-center justify-between md:justify-normal group" data-aos="fade-up">
            <div class="md:w-1/2 md:pr-16 text-left md:text-right w-full pl-24 md:pl-0">
                <span class="inline-block px-4 py-1.5 bg-blue-50 text-blue-600 text-sm font-bold rounded-lg mb-3">Februari 2025 - Juni 2025</span>
                <h3 class="text-2xl font-bold text-blue-950">Web Developer</h3>
                <p class="text-lg font-bold text-slate-400 mb-4">Lolong Adventure</p>
                <p class="text-slate-600 leading-relaxed font-medium text-sm md:text-base">Merancang dan mengembangkan sistem pemesanan tiket wisata berbasis web. Mendampingi mitra dalam pengoperasian sistem secara mandiri serta berkontribusi dalam program PKM Pengabdian Masyarakat yang didanai DIKTI 2025. Sistem digunakan untuk transaksi operasional[cite: 7].</p>
            </div>
            
            <div class="absolute left-8 md:left-1/2 -translate-x-1/2 w-12 h-12 rounded-full bg-white border-4 border-blue-200 group-hover:border-blue-500 shadow-lg flex items-center justify-center transition-colors">
                <div class="w-4 h-4 rounded-full bg-blue-600"></div>
            </div>
            
            <div class="md:w-1/2 md:pl-16 hidden md:block"></div>
        </div>

        <!-- Experience 2 -->
        <div class="relative flex flex-col md:flex-row items-center justify-between md:justify-normal group" data-aos="fade-up" data-aos-delay="100">
            <div class="md:w-1/2 md:pr-16 hidden md:block"></div>
            
            <div class="absolute left-8 md:left-1/2 -translate-x-1/2 w-12 h-12 rounded-full bg-white border-4 border-blue-200 group-hover:border-blue-500 shadow-lg flex items-center justify-center transition-colors">
                <div class="w-4 h-4 rounded-full bg-blue-400"></div>
            </div>
            
            <div class="md:w-1/2 md:pl-16 text-left w-full pl-24 md:pl-16">
                <span class="inline-block px-4 py-1.5 bg-blue-50 text-blue-600 text-sm font-bold rounded-lg mb-3">Januari 2025 - Februari 2025</span>
                <h3 class="text-2xl font-bold text-blue-950">Backend Developer</h3>
                <p class="text-lg font-bold text-slate-400 mb-4">Creatifla Multimedia</p>
                <p class="text-slate-600 leading-relaxed font-medium text-sm md:text-base">Merancang database MySQL dan mengembangkan backend menggunakan PHP untuk Sistem Manajemen Pelanggan. Mengembangkan fitur CRUD, laporan proyek, serta mengintegrasikan WhatsApp Blast API untuk mendukung otomatisasi promosi[cite: 7].</p>
            </div>
        </div>

    </div>
</div>
@endsection