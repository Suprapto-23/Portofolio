<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Section "Project Saya" di beranda menampilkan 3 proyek published
        // paling baru, langsung dari data yang dikelola admin.
        // Skill & Experience masih menyusul di iterasi berikutnya.
        $projects = Project::where('is_published', true)
            ->latest()
            ->take(3)
            ->get();

        return view('frontend.home.index', compact('projects'));
    }
}