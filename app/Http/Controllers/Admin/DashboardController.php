<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Experience;
use App\Models\Skill;

class DashboardController extends Controller
{
    public function index()
    {
        // --- Statistik utama ---
        $stats = [
            'total_projects'     => Project::count(),
            'published_projects' => Project::where('is_published', true)->count(),
            'draft_projects'     => Project::where('is_published', false)->count(),
            'total_experiences'  => Experience::count(),
            'active_experiences' => Experience::where('is_active', true)->count(),
            'total_skills'       => Skill::count(),
            'avg_skill_level'    => (int) round(Skill::avg('proficiency_percentage') ?? 0),
        ];

        // --- Distribusi skill per kategori (untuk bar chart sederhana) ---
        $skillsByCategory = Skill::selectRaw('category, COUNT(*) as total, ROUND(AVG(proficiency_percentage)) as avg_level')
            ->groupBy('category')
            ->orderByDesc('total')
            ->get();

        $maxSkillCategoryTotal = $skillsByCategory->max('total') ?: 1;

        // --- 5 proyek terbaru ---
        $recentProjects = Project::latest()
            ->take(5)
            ->get(['id', 'title', 'category', 'is_published', 'created_at']);

        // --- Pengalaman kerja terbaru/berjalan ---
        $recentExperiences = Experience::orderByDesc('is_active')
            ->orderByDesc('start_date')
            ->take(4)
            ->get();

        return view('admin.dashboard.index', compact(
            'stats',
            'skillsByCategory',
            'maxSkillCategoryTotal',
            'recentProjects',
            'recentExperiences'
        ));
    }
}
