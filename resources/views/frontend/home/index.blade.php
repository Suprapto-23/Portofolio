@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-24 lg:space-y-36 pb-20 overflow-hidden">

    <!-- ================= 1. HERO SECTION ================= -->
    <section class="relative pt-8 lg:pt-16 flex items-center min-h-[70vh]" data-aos="fade-up">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center w-full">

            <div class="order-2 lg:order-1 flex flex-col items-center lg:items-start text-center lg:text-left z-10">
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-blue-50/50 backdrop-blur-sm shadow-sm text-xs font-bold text-blue-600 mb-6">
                    <span class="w-2 h-2 rounded-full bg-blue-500 mr-2.5 animate-pulse"></span>
                    Tersedia untuk Berkolaborasi
                </div>

                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-blue-950 tracking-tight leading-[1.15] mb-6">
                    Portofolio <br class="hidden sm:block">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-blue-400">Digital</span> <br class="hidden sm:block">
                    Suprapto.
                </h1>

                <p class="text-lg text-slate-500 leading-relaxed mb-10 max-w-lg font-medium">
                    Saya <b class="text-blue-900">Suprapto</b>, Fresh Graduate S1 Teknologi Informasi. Berspesialisasi dalam rekayasa Backend & Web Development untuk mengubah logika kompleks menjadi arsitektur aplikasi yang efisien, aman, dan mutakhir.
                </p>

                <a href="#pendidikan" class="px-8 py-4 bg-blue-600 text-white rounded-2xl font-bold hover:shadow-lg hover:shadow-blue-600/30 hover:-translate-y-1 transition-all duration-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                    Lihat Profil Lengkap &darr;
                </a>
            </div>

            <div class="order-1 lg:order-2 flex justify-center items-center">
                <div class="relative w-64 h-64 sm:w-80 sm:h-80 lg:w-[420px] lg:h-[420px] bg-blue-50/50 rounded-[3rem] overflow-hidden shadow-2xl shadow-blue-900/5">
                    <img src="{{ asset('img/profil.png') }}" alt="Suprapto" class="w-full h-full object-cover object-top hover:scale-105 transition-transform duration-700 ease-out">
                </div>
            </div>

        </div>
    </section>

    <!-- ================= 2. PENDIDIKAN ================= -->
    <section id="pendidikan" class="pt-8 scroll-mt-24" data-aos="fade-up">
        <div class="mb-10 text-center lg:text-left">
            <h2 class="text-3xl font-black text-blue-950 tracking-tight">Riwayat <span class="text-blue-600">Pendidikan</span></h2>
        </div>

        <div class="bg-white rounded-[2rem] p-8 lg:p-10 border border-slate-100 shadow-[0_4px_30px_rgb(0,0,0,0.02)] flex flex-col md:flex-row items-center justify-between gap-6 hover:shadow-lg hover:shadow-blue-900/5 transition-all">
            <div class="flex items-start gap-6">
                <div class="w-16 h-16 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14v7"></path></svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-blue-950">S1 Teknologi Informasi</h3>
                    <p class="text-blue-600 font-bold mb-2">Institut Teknologi dan Sains Nahdlatul Ulama Pekalongan</p>
                    <p class="text-slate-500 text-sm max-w-lg leading-relaxed font-medium">Berfokus pada pengembangan perangkat lunak, sistem basis data, dan arsitektur web modern.</p>
                </div>
            </div>
            <div class="text-center md:text-right shrink-0 bg-blue-50/50 p-6 rounded-2xl w-full md:w-auto">
                <p class="text-sm font-bold text-blue-600 mb-1">Tahun 2022 - 2026</p>
                <div class="text-3xl font-black text-blue-950">IPK: <span class="text-blue-500">3.76</span></div>
            </div>
        </div>
    </section>

    <!-- ================= 3. PENGALAMAN ================= -->
    <section data-aos="fade-up">
        <div class="mb-10 text-center lg:text-left">
            <h2 class="text-3xl font-black text-blue-950 tracking-tight">Pengalaman <span class="text-blue-600">Kerja</span></h2>
        </div>

        <div class="space-y-8 relative before:absolute before:inset-y-0 before:left-[39px] before:w-0.5 before:bg-blue-100">
            <div class="relative pl-24 group">
                <div class="absolute w-12 h-12 bg-white border-[3px] border-blue-400 rounded-full left-[16px] top-0 shadow-md flex items-center justify-center text-blue-600 font-black">1</div>
                <div class="bg-white rounded-[2rem] p-8 lg:p-10 border border-slate-100 shadow-[0_4px_30px_rgb(0,0,0,0.02)] group-hover:shadow-xl group-hover:shadow-blue-900/5 group-hover:border-blue-100 transition-all">
                    <div class="flex flex-col md:flex-row md:items-center justify-between mb-4 gap-4">
                        <div>
                            <h3 class="text-xl font-bold text-blue-950">Web Developer</h3>
                            <p class="text-blue-600 font-bold">Lolong Adventure</p>
                        </div>
                        <span class="px-4 py-2 bg-blue-50/50 text-blue-600 text-xs font-bold uppercase tracking-wider rounded-xl w-fit">Feb 2025 - Jun 2025</span>
                    </div>
                    <p class="text-slate-500 leading-relaxed text-sm font-medium">Merancang dan mengembangkan sistem pemesanan tiket wisata berbasis web. Mendampingi mitra operasional dan berkontribusi dalam program PKM Pengabdian Masyarakat yang didanai DIKTI 2025. Memperoleh nilai A dari institusi.</p>
                </div>
            </div>

            <div class="relative pl-24 group">
                <div class="absolute w-12 h-12 bg-white border-[3px] border-blue-200 group-hover:border-blue-400 transition-colors rounded-full left-[16px] top-0 shadow-sm flex items-center justify-center text-blue-400 group-hover:text-blue-600 font-black">2</div>
                <div class="bg-white rounded-[2rem] p-8 lg:p-10 border border-slate-100 shadow-[0_4px_30px_rgb(0,0,0,0.02)] group-hover:shadow-xl group-hover:shadow-blue-900/5 group-hover:border-blue-100 transition-all">
                    <div class="flex flex-col md:flex-row md:items-center justify-between mb-4 gap-4">
                        <div>
                            <h3 class="text-xl font-bold text-blue-950">Backend Developer</h3>
                            <p class="text-blue-600 font-bold">Creatifla Multimedia</p>
                        </div>
                        <span class="px-4 py-2 bg-blue-50/50 text-blue-600 text-xs font-bold uppercase tracking-wider rounded-xl w-fit">Jan 2025 - Feb 2025</span>
                    </div>
                    <p class="text-slate-500 leading-relaxed text-sm font-medium">Merancang database MySQL dan mengembangkan backend dengan PHP untuk Sistem Manajemen Pelanggan. Mengintegrasikan WhatsApp Blast API untuk otomatisasi promosi dan membuat laporan dashboard analitik.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= 4. PROJECT SAYA =================
         FIX: sebelumnya section ini pakai Swiper `loop: true` DITAMBAH
         6 slide manual (3 asli + 3 duplikat) di HTML. Dua-duanya
         sama-sama membuat "clone" — Swiper bikin clone-nya sendiri
         DI ATAS clone manual tadi. Itu penyebab tampilan kosong dan
         arah geser yang kebalik di desktop.

         Perbaikan: hanya 3 slide asli, tanpa loop (pakai `rewind`
         yang jauh lebih stabil), dan carousel HANYA dipakai di mobile
         (dengan efek fade + tombol panah kiri-kanan yang selalu
         terlihat). Di tablet/desktop, ketiga project sudah muat
         sekaligus jadi ditampilkan sebagai grid statis — tidak ada
         carousel sama sekali, jadi bug arah-geser-kebalik itu tidak
         mungkin muncul lagi di sana.
    ================================================== -->
    <section class="relative" data-aos="fade-up">

        <div class="mb-10 text-center">
            <h2 class="text-3xl font-black text-blue-950 tracking-tight">Project <span class="text-blue-600">Saya</span></h2>
            <p class="text-slate-500 mt-2 font-medium">Implementasi nyata dari logika ke sistem yang benar-benar dipakai pengguna.</p>
        </div>

        @if($projects->isEmpty())
            <div class="text-center py-16 text-slate-400 font-medium bg-white rounded-[2rem] border border-slate-100 max-w-md mx-auto">
                Belum ada proyek yang dipublikasikan.
            </div>
        @else
            {{-- MOBILE: satu kartu penuh, transisi fade, panah kiri-kanan selalu terlihat --}}
            <div class="md:hidden relative max-w-md mx-auto">
                <div class="swiper project-swiper overflow-hidden rounded-[2rem] cursor-grab active:cursor-grabbing">
                    <div class="swiper-wrapper">

                        @foreach($projects as $project)
                        <div class="swiper-slide">
                            <div class="bg-white rounded-[2rem] border border-slate-100 shadow-[0_10px_40px_rgb(0,0,0,0.05)] flex flex-col overflow-hidden">
                                <div class="h-56 overflow-hidden bg-slate-50 relative">
                                    @if($project->cover_image)
                                        <img src="{{ asset('storage/' . $project->cover_image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover object-top" loading="lazy">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-slate-300">
                                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M14 8h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-8 flex flex-col">
                                    <h3 class="text-xl font-bold text-blue-950 mb-3">{{ $project->title }}</h3>
                                    <p class="text-slate-500 text-sm leading-relaxed mb-8 font-medium">{{ $project->short_description }}</p>
                                    <a href="{{ $project->project_url ?: route('project.show', $project->slug) }}" {{ $project->project_url ? 'target=_blank rel=noopener' : '' }} class="inline-flex w-fit items-center text-sm font-bold text-blue-600 hover:text-blue-800 transition-colors mt-auto group/link">
                                        {{ $project->project_url ? 'Kunjungi Website' : 'Lihat Detail' }}
                                        <svg class="w-4 h-4 ml-1.5 group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

                <button type="button" class="swiper-btn-prev absolute left-1 top-28 -translate-y-1/2 z-20 w-11 h-11 rounded-full bg-white/90 backdrop-blur border border-blue-100 shadow-md flex items-center justify-center text-blue-600 active:scale-90 transition-transform focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600" aria-label="Project sebelumnya">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <button type="button" class="swiper-btn-next absolute right-1 top-28 -translate-y-1/2 z-20 w-11 h-11 rounded-full bg-white/90 backdrop-blur border border-blue-100 shadow-md flex items-center justify-center text-blue-600 active:scale-90 transition-transform focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600" aria-label="Project berikutnya">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                </button>

                <div class="swiper-pagination relative mt-5 flex justify-center gap-1.5"></div>
                <p class="text-center text-xs text-slate-400 font-semibold mt-2">Geser atau ketuk panah untuk lihat project lain</p>
            </div>

            {{-- TABLET/DESKTOP: sampai 3 project sudah muat sekaligus, jadi tampil sebagai grid statis (tanpa carousel) --}}
            <div class="hidden md:grid md:grid-cols-3 gap-8 max-w-[1400px] mx-auto">

                @foreach($projects as $project)
                <div class="bg-white rounded-[2rem] border border-slate-100 shadow-[0_10px_40px_rgb(0,0,0,0.03)] flex flex-col overflow-hidden hover:shadow-xl hover:shadow-blue-900/5 hover:-translate-y-1 transition-all duration-300">
                    <div class="h-56 overflow-hidden bg-slate-50 relative">
                        @if($project->cover_image)
                            <img src="{{ asset('storage/' . $project->cover_image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover object-top hover:scale-105 transition-transform duration-700" loading="lazy">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-slate-300">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M14 8h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        @endif
                    </div>
                    <div class="p-8 flex flex-col flex-grow">
                        <h3 class="text-xl font-bold text-blue-950 mb-3">{{ $project->title }}</h3>
                        <p class="text-slate-500 text-sm leading-relaxed mb-8 flex-grow font-medium">{{ $project->short_description }}</p>
                        <a href="{{ $project->project_url ?: route('project.show', $project->slug) }}" {{ $project->project_url ? 'target=_blank rel=noopener' : '' }} class="inline-flex w-fit items-center text-sm font-bold text-blue-600 hover:text-blue-800 transition-colors mt-auto group/link">
                            {{ $project->project_url ? 'Kunjungi Website' : 'Lihat Detail' }}
                            <svg class="w-4 h-4 ml-1.5 group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>
                @endforeach

            </div>
        @endif

        <div class="mt-12 flex justify-center" data-aos="fade-up">
            <a href="/proyek" class="px-10 py-4 bg-blue-50/50 backdrop-blur-md border border-blue-200 text-blue-600 rounded-2xl font-bold hover:bg-blue-600 hover:text-white hover:border-blue-600 transition-all duration-300 shadow-sm hover:shadow-xl hover:shadow-blue-600/20 flex items-center group focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                Lihat Semua Project
                <span class="w-8 h-8 rounded-full bg-white text-blue-600 group-hover:text-blue-600 flex items-center justify-center ml-3 transition-colors shadow-sm">
                    <svg class="w-4 h-4 group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </span>
            </a>
        </div>
    </section>

    <!-- ================= 5. SERTIFIKASI & PELATIHAN ================= -->
    <section data-aos="fade-up">
        <div class="mb-10 text-center lg:text-left">
            <h2 class="text-3xl font-black text-blue-950 tracking-tight">Sertifikasi & <span class="text-blue-600">Pelatihan</span></h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm hover:shadow-lg transition-shadow flex gap-5">
                <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                </div>
                <div>
                    <h4 class="font-bold text-blue-950 text-lg">Cybersecurity Risk Management</h4>
                    <p class="text-sm font-medium text-slate-500 mb-2">ITSNU Pekalongan</p>
                    <span class="text-xs font-bold text-blue-600 bg-blue-50 px-3 py-1 rounded-lg">Okt 2025</span>
                </div>
            </div>

            <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm hover:shadow-lg transition-shadow flex gap-5">
                <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <div>
                    <h4 class="font-bold text-blue-950 text-lg">Belajar Dasar AI</h4>
                    <p class="text-sm font-medium text-slate-500 mb-2">Dicoding Indonesia</p>
                    <span class="text-xs font-bold text-blue-600 bg-blue-50 px-3 py-1 rounded-lg">Sep 2025 - Sep 2028</span>
                </div>
            </div>

            <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm hover:shadow-lg transition-shadow flex gap-5">
                <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                </div>
                <div>
                    <h4 class="font-bold text-blue-950 text-lg">Workshop HTML & CSS</h4>
                    <p class="text-sm font-medium text-slate-500 mb-2">HIMATIF ITSNU Pekalongan</p>
                    <span class="text-xs font-bold text-blue-600 bg-blue-50 px-3 py-1 rounded-lg">Mei 2025</span>
                </div>
            </div>

            <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm hover:shadow-lg transition-shadow flex gap-5">
                <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <div>
                    <h4 class="font-bold text-blue-950 text-lg">Pembuatan Desain Grafis</h4>
                    <p class="text-sm font-medium text-slate-500 mb-2">BLKK PC GP Ansor</p>
                    <span class="text-xs font-bold text-blue-600 bg-blue-50 px-3 py-1 rounded-lg">Agt - Sep 2023</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= 6. KEAHLIAN / SKILL ================= -->
    <section data-aos="fade-up">
        <div class="mb-10 text-center lg:text-left">
            <h2 class="text-3xl font-black text-blue-950 tracking-tight">Keahlian <span class="text-blue-600">Teknis</span></h2>
        </div>

        <div class="bg-white rounded-[2rem] p-8 lg:p-12 border border-slate-100 shadow-[0_4px_30px_rgb(0,0,0,0.02)]">
            <div class="flex flex-wrap gap-4 justify-center lg:justify-start">
                <span class="px-6 py-3 bg-white border border-blue-100 text-blue-900 font-bold rounded-2xl shadow-sm cursor-default">Laravel</span>
                <span class="px-6 py-3 bg-white border border-blue-100 text-blue-900 font-bold rounded-2xl shadow-sm cursor-default">PHP</span>
                <span class="px-6 py-3 bg-white border border-blue-100 text-blue-900 font-bold rounded-2xl shadow-sm cursor-default">MySQL</span>
                <span class="px-6 py-3 bg-white border border-blue-100 text-blue-900 font-bold rounded-2xl shadow-sm cursor-default">HTML & CSS</span>
                <span class="px-6 py-3 bg-white border border-blue-100 text-blue-900 font-bold rounded-2xl shadow-sm cursor-default">Web Technologies</span>
                <span class="px-6 py-3 bg-white border border-blue-100 text-blue-900 font-bold rounded-2xl shadow-sm cursor-default">System Administration</span>
                <span class="px-6 py-3 bg-white border border-blue-100 text-blue-900 font-bold rounded-2xl shadow-sm cursor-default">Github</span>
                <span class="px-6 py-3 bg-white border border-blue-100 text-blue-900 font-bold rounded-2xl shadow-sm cursor-default">Mobile App Dev</span>
                <span class="px-6 py-3 bg-white border border-blue-100 text-blue-900 font-bold rounded-2xl shadow-sm cursor-default">Team Management</span>
            </div>
        </div>
    </section>

</div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Carousel hanya aktif di mobile (<768px). Di layar lebih besar
        // ketiga project sudah tampil sekaligus lewat grid statis di HTML,
        // jadi Swiper sengaja TIDAK dijalankan di sana — itulah yang
        // menghilangkan bug kosong/arah-kebalik yang muncul di desktop.
        let projectSwiper = null;
        const mobileQuery = window.matchMedia('(max-width: 767px)');

        function initProjectSwiper() {
            if (projectSwiper) return;
            projectSwiper = new Swiper('.project-swiper', {
                slidesPerView: 1,
                effect: 'fade',
                fadeEffect: { crossFade: true },
                speed: 550,
                rewind: true,
                grabCursor: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true,
                },
                navigation: {
                    nextEl: '.swiper-btn-next',
                    prevEl: '.swiper-btn-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });
        }

        function destroyProjectSwiper() {
            if (projectSwiper) {
                projectSwiper.destroy(true, true);
                projectSwiper = null;
            }
        }

        function handleBreakpoint(e) {
            if (e.matches) {
                initProjectSwiper();
            } else {
                destroyProjectSwiper();
            }
        }

        handleBreakpoint(mobileQuery);
        mobileQuery.addEventListener('change', handleBreakpoint);
    });
</script>
@endpush