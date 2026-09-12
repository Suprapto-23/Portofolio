<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Otorisasi Admin - Suprapto Workspace</title>
    @vite('resources/css/app.css')
</head>
<body class="font-sans antialiased text-slate-700 bg-[#f8fafc] min-h-screen flex items-center justify-center relative overflow-hidden">

    <!-- Efek Ambient Latar Belakang -->
    <div class="fixed inset-0 -z-10 h-full w-full bg-white">
        <div class="absolute inset-0 bg-[radial-gradient(#e2e8f0_1px,transparent_1px)] [background-size:40px_40px] opacity-50"></div>
        <div class="absolute top-[-10%] left-[-10%] w-[60%] h-[60%] rounded-full bg-blue-100/50 blur-[120px]"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[50%] h-[50%] rounded-full bg-indigo-50/50 blur-[120px]"></div>
    </div>

    <!-- Kotak Login -->
    <div class="w-full max-w-md px-6 relative z-10">
        
        <!-- Logo / Judul -->
        <div class="text-center mb-10">
            <a href="/" class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-blue-600 text-white shadow-lg shadow-blue-500/30 mb-6 hover:scale-105 transition-transform">
                <span class="text-3xl font-black">S</span>
            </a>
            <h1 class="text-2xl font-black text-blue-950 tracking-tight mb-2">Workspace Admin</h1>
            <p class="text-sm font-medium text-slate-500">Silakan masuk untuk mengelola portofolio.</p>
        </div>

        <!-- Form Autentikasi -->
        <div class="bg-white/80 backdrop-blur-xl rounded-[2rem] p-8 sm:p-10 border border-blue-50 shadow-[0_10px_40px_rgb(0,0,0,0.03)]">
            
            <!-- Flash Message / Session Status -->
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600 bg-green-50 p-3 rounded-xl border border-green-200">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Input Email -->
                <div>
                    <label for="email" class="block text-sm font-bold text-blue-950 mb-2">Alamat Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                        </div>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                            class="block w-full pl-11 pr-4 py-3 bg-slate-50/50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('email') border-red-500 ring-red-100 @enderror"
                            placeholder="suprapto@gmail.com">
                    </div>
                    @error('email')
                        <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Input Password -->
                <div>
                    <label for="password" class="block text-sm font-bold text-blue-950 mb-2">Kata Sandi</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                        <input id="password" type="password" name="password" required
                            class="block w-full pl-11 pr-4 py-3 bg-slate-50/50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('password') border-red-500 ring-red-100 @enderror"
                            placeholder="••••••••">
                    </div>
                    @error('password')
                        <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="flex items-center cursor-pointer">
                        <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-sm font-medium text-slate-600">Ingat saya</span>
                    </label>
                    
                    @if (Route::has('password.request'))
                        <a class="text-sm font-bold text-blue-600 hover:text-blue-800 transition-colors" href="{{ route('password.request') }}">
                            Lupa sandi?
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 hover:shadow-lg hover:shadow-blue-600/30 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Masuk ke Dasbor
                </button>
            </form>
        </div>

        <div class="mt-8 text-center text-sm font-medium text-slate-400">
            &copy; {{ date('Y') }} Keamanan Sistem Terenkripsi.
        </div>
    </div>

</body>
</html>