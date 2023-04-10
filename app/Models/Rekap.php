<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rekap extends Model
{
    use HasFactory;
    protected $casts = [
        'answer_options' => 'array'
    ];

    protected $table ='pemohons';
    protected $fillable = [
        'question',
        'pertanyaan_id',
        'answer_options',
        'no_tiket',
        'nama',
        'alamat',
        'no_hp',
        'jenis_kelamin',
        'pendidikan',
        'usia',
        'jenis_layanan',
        'review',
        'review_star',
        'date',
    ];

    // public function pertanyaan() {
    //     return $this->belongsTo(Pertanyaans::class);
    // }
    public function pemohon() {
        return $this->belongsTo(Pemohon::class);
    }
    public function survey(): BelongsTo {
        return $this->belongsTo(Survey::class, 'survey_id');
    }
    public function pertanyaan(): BelongsTo {
        return $this->belongsTo(Pertanyaans::class, 'pertanyaan_id');
    }
}
