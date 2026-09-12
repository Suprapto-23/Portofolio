<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'site_title',
        'hero_title',
        'hero_subtitle',
        'about_summary',
        'about_detail',
        'email_contact',
        'github_url',
        'linkedin_url',
        'resume_link',
    ];

    public function getResumeUrlAttribute(): ?string
    {
        if (! $this->resume_link) {
            return null;
        }

        // Jika sudah berupa link eksternal penuh, pakai apa adanya.
        if (filter_var($this->resume_link, FILTER_VALIDATE_URL)) {
            return $this->resume_link;
        }

        // Kalau bukan URL, anggap path file di storage lokal.
        return asset('storage/' . $this->resume_link);
    }
}
