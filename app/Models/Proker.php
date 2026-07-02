<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proker extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_proker',
        'tanggal_mulai',
        'tanggal_selesai',
        'penanggung_jawab',
        'deskripsi',
        'anggaran',
        'status',
        'gambar',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_mulai' => 'date',
            'tanggal_selesai' => 'date',
            'anggaran' => 'decimal:2',
        ];
    }
}
