<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectImage extends Model
{
    protected $guarded = ['id'];

    // Relasi: 1 Gambar hanya milik 1 Proyek
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}