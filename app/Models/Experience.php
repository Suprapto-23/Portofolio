<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'role',
        'start_date',
        'end_date',
        'summary',
        'description_detail',
        'is_active',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date'   => 'date',
        'is_active'  => 'boolean',
    ];

    /**
     * Label periode kerja yang siap tampil, misal "Jan 2023 - Sekarang".
     */
    public function getPeriodLabelAttribute(): string
    {
        $start = $this->start_date?->translatedFormat('M Y');
        $end   = $this->end_date?->translatedFormat('M Y') ?? 'Sekarang';

        return "{$start} - {$end}";
    }
}
