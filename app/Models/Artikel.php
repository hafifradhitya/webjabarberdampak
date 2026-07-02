<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'kategori',
        'penulis',
        'tanggal_publish',
        'konten',
        'gambar',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_publish' => 'date',
        ];
    }
}
