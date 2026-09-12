<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ExperienceController extends Controller
{
    public function index(): View
    {
        $experiences = Experience::orderByDesc('start_date')->paginate(10);

        return view('admin.experiences.index', compact('experiences'));
    }

    public function create(): View
    {
        return view('admin.experiences.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validated($request);
        $validated['is_active'] = $request->boolean('is_active');

        Experience::create($validated);

        return redirect()
            ->route('admin.experiences.index')
            ->with('success', 'Pengalaman baru berhasil ditambahkan.');
    }

    /**
     * Resource route menyertakan show(), tapi admin tidak butuh halaman detail
     * terpisah — arahkan saja ke form edit.
     */
    public function show(Experience $experience): RedirectResponse
    {
        return redirect()->route('admin.experiences.edit', $experience);
    }

    public function edit(Experience $experience): View
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience): RedirectResponse
    {
        $validated = $this->validated($request);
        $validated['is_active'] = $request->boolean('is_active');

        $experience->update($validated);

        return redirect()
            ->route('admin.experiences.index')
            ->with('success', 'Data pengalaman berhasil diperbarui.');
    }

    public function destroy(Experience $experience): RedirectResponse
    {
        $experience->delete();

        return redirect()
            ->route('admin.experiences.index')
            ->with('success', 'Data pengalaman berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'company_name'        => ['required', 'string', 'max:255'],
            'role'                => ['required', 'string', 'max:255'],
            'start_date'          => ['required', 'date'],
            'end_date'            => ['nullable', 'date', 'after_or_equal:start_date'],
            'summary'             => ['required', 'string'],
            'description_detail'  => ['nullable', 'string'],
        ]);
    }
}
