<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    // Relasi: 1 Proyek memiliki Banyak Gambar
    public function images(): HasMany
    {
        return $this->hasMany(ProjectImage::class)->orderBy('sort_order', 'asc');
    }

    // Relasi: Banyak Proyek menggunakan Banyak Skill (Tabel Pivot)
    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class, 'project_skill');
    }
}