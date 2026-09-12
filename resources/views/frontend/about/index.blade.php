@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-20 pb-32">
    
    <div class="text-center mb-16" data-aos="fade-down">
        <div class="inline-flex items-center px-4 py-2 rounded-full bg-blue-50/50 backdrop-blur-sm shadow-sm text-xs font-bold text-blue-600 mb-4">
            Mengenal Lebih Dekat
        </div>
        <h1 class="text-4xl md:text-5xl font-black text-blue-950 tracking-tight">Profil & <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-blue-400">Visi</span></h1>
    </div>

    <div class="bg-white/80 backdrop-blur-2xl rounded-[3rem] border border-blue-50 shadow-xl shadow-blue-900/5 overflow-hidden" data-aos="fade-up">
        <div class="flex flex-col md:flex-row">
            <!-- Foto Kiri -->
            <div class="md:w-2/5 bg-blue-50 relative p-8 flex items-center justify-center">
                <div class="absolute inset-0 bg-[radial-gradient(#bfdbfe_1px,transparent_1px)] [background-size:20px_20px] opacity-50"></div>
                <div class="relative w-64 h-64 md:w-full md:h-96 rounded-3xl overflow-hidden shadow-2xl border-4 border-white">
                    <img src="{{ asset('img/profil.png') }}" alt="Suprapto" class="w-full h-full object-cover object-top">
                </div>
            </div>
            
            <!-- Teks Kanan -->
            <div class="md:w-3/5 p-8 md:p-12 lg:p-16 flex flex-col justify-center">
                <h2 class="text-2xl font-black text-blue-950 mb-4">Suprapto</h2>
                <p class="text-blue-600 font-bold mb-6 tracking-wide uppercase text-sm">Full-Stack Web Developer</p>
                
                <div class="space-y-4 text-slate-600 leading-relaxed font-medium">
                    <p>
                        Saya adalah Fresh Graduate S1 Teknologi Informasi dari ITSNU Pekalongan dengan IPK 3.76[cite: 7]. Saya memiliki ketertarikan mendalam pada rekayasa arsitektur perangkat lunak, baik di sisi backend maupun antarmuka pengguna (frontend)[cite: 7].
                    </p>
                    <p>
                        Sepanjang perjalanan akademis dan profesional, saya telah terbiasa membangun fitur dari tahap analisis kebutuhan hingga pengujian[cite: 7]. Fokus saya bukan hanya membuat kode yang berfungsi, tetapi memastikan kode tersebut bersih, aman, dan dapat digunakan dalam transaksi nyata[cite: 7].
                    </p>
                    <p>
                        Tujuan karir saya adalah terus berkembang sebagai Full Stack Developer di lingkungan kerja yang dinamis, profesional, dan menantang[cite: 7].
                    </p>
                </div>

                <div class="mt-10 pt-8 border-t border-slate-100 flex flex-wrap gap-4">
                    <a href="mailto:ssuprapto351@gmail.com" class="px-6 py-3 bg-blue-600 text-white rounded-xl font-bold hover:bg-blue-700 transition-all shadow-md">Hubungi Email</a>
                    <a href="https://wa.me/6281229952175" target="_blank" class="px-6 py-3 bg-blue-50 text-blue-600 border border-blue-100 rounded-xl font-bold hover:bg-blue-100 transition-all shadow-sm">WhatsApp</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection