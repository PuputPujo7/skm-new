<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemohon extends Model
{
    use HasFactory;
    protected $fillable = [

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
}
