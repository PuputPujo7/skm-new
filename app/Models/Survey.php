<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $casts = [
        'answer_options' => 'array'
    ];

    protected $fillable = [
        'question',
        'pertanyaan_id',
        'answer_options'
    ];

    public function pertanyaan() {
        return $this->belongsTo(Pertanyaans::class);
    }
}
