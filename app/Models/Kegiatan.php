<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Kegiatan extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'nama_kegiatan',
        'slug',
        'tanggal_kegiatan',
        'lokasi',
        'deskripsi',
        'status',
        'thumbnail',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_kegiatan' => 'date',
        ];
    }

    public function documentations()
    {
        return $this->hasMany(KegiatanDocumentation::class);
    }
}
