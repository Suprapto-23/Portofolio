<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'proficiency_percentage',
        'icon_path',
    ];

    protected $casts = [
        'proficiency_percentage' => 'integer',
    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_skill');
    }

    public function getIconUrlAttribute(): ?string
    {
        return $this->icon_path ? asset('storage/' . $this->icon_path) : null;
    }
}
