<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Layanan extends Model
{
    protected $table = 'layanan';

    protected $primaryKey = 'layanan_id';

    protected $fillable = [
        'kategori_id',
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

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(
            KategoriLayanan::class,
            'kategori_id',
            'kategori_id'
        );
    }
}
