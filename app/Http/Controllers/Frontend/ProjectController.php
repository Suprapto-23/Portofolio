<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('is_published', true)
            ->latest()
            ->paginate(9);

        return view('frontend.projects.index', compact('projects'));
    }

    public function show(string $slug)
    {
        $project = Project::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        return view('frontend.projects.show', compact('project'));
    }
}