<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanDocumentation extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'kegiatan_id',
        'image_path',
    ];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}
