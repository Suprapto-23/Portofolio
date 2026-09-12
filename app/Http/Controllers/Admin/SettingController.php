<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function edit(): View
    {
        $setting = Setting::first() ?? new Setting();

        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'site_title'     => ['required', 'string', 'max:255'],
            'hero_title'     => ['nullable', 'string', 'max:255'],
            'hero_subtitle'  => ['nullable', 'string'],
            'about_summary'  => ['nullable', 'string'],
            'about_detail'   => ['nullable', 'string'],
            'email_contact'  => ['nullable', 'email', 'max:255'],
            'github_url'     => ['nullable', 'url', 'max:255'],
            'linkedin_url'   => ['nullable', 'url', 'max:255'],
            'resume_link'    => ['nullable', 'url', 'max:255'],
            'resume'         => ['nullable', 'file', 'mimes:pdf', 'max:5120'],
        ]);

        $setting = Setting::first() ?? new Setting();

        // Upload file PDF baru menggantikan resume_link (baik link lama berupa
        // URL maupun path storage lama akan ditimpa oleh path file baru).
        if ($request->hasFile('resume')) {
            if ($setting->resume_link && ! filter_var($setting->resume_link, FILTER_VALIDATE_URL)) {
                Storage::disk('public')->delete($setting->resume_link);
            }
            $validated['resume_link'] = $request->file('resume')->store('resumes', 'public');
        }

        unset($validated['resume']);

        $setting->fill($validated);
        $setting->save();

        return redirect()
            ->route('admin.settings.edit')
            ->with('success', 'Pengaturan website berhasil disimpan.');
    }
}
