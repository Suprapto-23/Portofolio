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
        // Menampilkan proyek terbaru dengan pagination agar query tidak berat
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
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Batas 2MB, format modern
            'is_published' => 'boolean',
        ]);

        // Generate slug dari title
        $validated['slug'] = Str::slug($request->title);

        // Cek keunikan slug (kasus ekstrem jika nama project sama)
        if (Project::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $validated['slug'] . '-' . time();
        }

        // Handle File Upload
        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('projects', 'public');
            $validated['cover_image'] = $path;
        }

        // Checkbox penanganan default (jika tidak dicentang, nilainya false)
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

        // Cek update slug manual jika judul berubah
        $newSlug = Str::slug($request->title);
        if ($project->slug !== $newSlug) {
            if (Project::where('slug', $newSlug)->where('id', '!=', $project->id)->exists()) {
                $validated['slug'] = $newSlug . '-' . time();
            } else {
                $validated['slug'] = $newSlug;
            }
        }

        // Handle penggantian gambar dan hapus gambar lama dari disk
        if ($request->hasFile('cover_image')) {
            if ($project->cover_image && Storage::disk('public')->exists($project->cover_image)) {
                Storage::disk('public')->delete($project->cover_image);
            }
            $validated['cover_image'] = $request->file('cover_image')->store('projects', 'public');
        }

        $validated['is_published'] = $request->has('is_published');

        $project->update($validated);

        return redirect()->route('admin.projects.index')
                         ->with('success', 'Proyek berhasil diperbarui.');
    }

    /**
     * Aktifkan/nonaktifkan publikasi proyek langsung dari daftar,
     * tanpa perlu membuka halaman edit.
     */
    public function togglePublish(Project $project)
    {
        $project->update(['is_published' => ! $project->is_published]);

        $status = $project->is_published ? 'dipublikasikan' : 'dijadikan draft';

        return redirect()->route('admin.projects.index')
                         ->with('success', "Proyek \"{$project->title}\" berhasil {$status}.");
    }

    public function destroy(Project $project)
    {
        // Hapus file fisik sebelum menghapus data database
        if ($project->cover_image && Storage::disk('public')->exists($project->cover_image)) {
            Storage::disk('public')->delete($project->cover_image);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')
                         ->with('success', 'Proyek berhasil dihapus beserta asetnya.');
    }
}