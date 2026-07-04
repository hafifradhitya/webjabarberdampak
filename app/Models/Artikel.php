<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Artikel extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'judul',
        'slug',
        'kategori',
        'penulis',
        'tanggal_publish',
        'konten',
        'gambar',
        'status',
        'is_headline',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_publish' => 'date',
        ];
    }
}
