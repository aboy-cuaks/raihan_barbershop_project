<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = 'layanan';
    protected $primaryKey = 'layanan_id';

    protected $fillable = [
        'nama_layanan',
        'deskripsi',
        'durasi_menit',
        'harga',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'durasi_menit' => 'integer',
            'harga' => 'decimal:2',
        ];
    }
}
