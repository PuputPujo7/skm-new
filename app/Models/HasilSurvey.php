<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HasilSurvey extends Model
{
    use HasFactory;

    protected $fillable = [
        'pemohon_id',
        'survey_id',
        'amount',
    ];

    public function pemohon(): BelongsTo {
        return $this->belongsTo(Pemohon::class, 'pemohon_id');
    }
    public function survey(): BelongsTo {
        return $this->belongsTo(Survey::class, 'survey_id');
    }
}
