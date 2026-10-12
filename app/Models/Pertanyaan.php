<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = 'pertanyaan';
    protected $primaryKey = 'pertanyaan_id';

    protected $fillable = [
        'nama',
        'email',
        'subjek',
        'pertanyaan',
        'status',
    ];
}
