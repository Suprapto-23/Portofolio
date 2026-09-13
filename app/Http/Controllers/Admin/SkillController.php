<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SkillController extends Controller
{
    public function index(): View
    {
        $skills = Skill::orderBy('category')
            ->orderByDesc('proficiency_percentage')
            ->get()
            ->groupBy('category');

        return view('admin.skills.index', compact('skills'));
    }

    public function create(): View
    {
        return view('admin.skills.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validated($request);

        if ($request->hasFile('icon')) {
            $uploaded = $request->file('icon')->storePublicly('skills', 'cloudinary');
            $validated['icon_path'] = Storage::disk('cloudinary')->url($uploaded);
        }

        Skill::create($validated);

        return redirect()
            ->route('admin.skills.index')
            ->with('success', 'Skill baru berhasil ditambahkan.');
    }

    public function show(Skill $skill): RedirectResponse
    {
        return redirect()->route('admin.skills.edit', $skill);
    }

    public function edit(Skill $skill): View
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill): RedirectResponse
    {
        $validated = $this->validated($request);

        if ($request->hasFile('icon')) {
            $uploaded = $request->file('icon')->storePublicly('skills', 'cloudinary');
            $validated['icon_path'] = Storage::disk('cloudinary')->url($uploaded);
        }

        $skill->update($validated);

        return redirect()
            ->route('admin.skills.index')
            ->with('success', 'Data skill berhasil diperbarui.');
    }

    public function destroy(Skill $skill): RedirectResponse
    {
        $skill->delete();

        return redirect()
            ->route('admin.skills.index')
            ->with('success', 'Skill berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'name'                    => ['required', 'string', 'max:255'],
            'category'                => ['required', 'in:Frontend,Backend,Database,Tools,Lainnya'],
            'proficiency_percentage'  => ['nullable', 'integer', 'min:0', 'max:100'],
            'icon'                    => ['nullable', 'image', 'max:1024'],
        ]);
    }
}