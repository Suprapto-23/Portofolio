<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'short_description' => 'required|string',
            'content_detail' => 'required|string',
            'client_name' => 'nullable|string|max:255',
            'project_url' => 'nullable|url|max:255',
            'repository_url' => 'nullable|url|max:255',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_published' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($request->title);

        if (Project::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $validated['slug'] . '-' . time();
        }

        // Upload ke Cloudinary, hasilnya berupa URL lengkap
        if ($request->hasFile('cover_image')) {
            $uploaded = $request->file('cover_image')->storePublicly('projects', 'cloudinary');
            $validated['cover_image'] = Storage::disk('cloudinary')->url($uploaded);
        }

        $validated['is_published'] = $request->has('is_published');

        Project::create($validated);

        return redirect()->route('admin.projects.index')
                         ->with('success', 'Proyek berhasil ditambahkan.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'short_description' => 'required|string',
            'content_detail' => 'required|string',
            'client_name' => 'nullable|string|max:255',
            'project_url' => 'nullable|url|max:255',
            'repository_url' => 'nullable|url|max:255',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $newSlug = Str::slug($request->title);
        if ($project->slug !== $newSlug) {
            if (Project::where('slug', $newSlug)->where('id', '!=', $project->id)->exists()) {
                $validated['slug'] = $newSlug . '-' . time();
            } else {
                $validated['slug'] = $newSlug;
            }
        }

        if ($request->hasFile('cover_image')) {
            $uploaded = $request->file('cover_image')->storePublicly('projects', 'cloudinary');
            $validated['cover_image'] = Storage::disk('cloudinary')->url($uploaded);
        }

        $validated['is_published'] = $request->has('is_published');

        $project->update($validated);

        return redirect()->route('admin.projects.index')
                         ->with('success', 'Proyek berhasil diperbarui.');
    }

    public function togglePublish(Project $project)
    {
        $project->update(['is_published' => ! $project->is_published]);

        $status = $project->is_published ? 'dipublikasikan' : 'dijadikan draft';

        return redirect()->route('admin.projects.index')
                         ->with('success', "Proyek \"{$project->title}\" berhasil {$status}.");
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')
                         ->with('success', 'Proyek berhasil dihapus beserta asetnya.');
    }
}