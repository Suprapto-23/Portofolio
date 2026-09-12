<?php

use Illuminate\Support\Facades\Route;

// Frontend Controllers
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ExperienceController as FrontendExperienceController;
use App\Http\Controllers\Frontend\ProjectController as FrontendProjectController;

// Auth Controller
use App\Http\Controllers\Auth\AuthController;

// Admin Controllers
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\ExperienceController as AdminExperienceController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\SettingController;

/*
|--------------------------------------------------------------------------
| FRONTEND ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang', [AboutController::class, 'index'])->name('about.index');
Route::get('/pengalaman', [FrontendExperienceController::class, 'index'])->name('experience.index');
Route::get('/proyek', [FrontendProjectController::class, 'index'])->name('project.index');
Route::get('/proyek/{slug}', [FrontendProjectController::class, 'show'])->name('project.show');

/*
|--------------------------------------------------------------------------
| AUTHENTICATION ROUTES (Login Kustom)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

/*
|--------------------------------------------------------------------------
| ADMIN KONTROL PANEL (Terproteksi)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::patch('projects/{project}/toggle-publish', [AdminProjectController::class, 'togglePublish'])
        ->name('projects.toggle-publish');
    Route::resource('projects', AdminProjectController::class);
    Route::resource('experiences', AdminExperienceController::class);
    Route::resource('skills', SkillController::class);
    Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
});