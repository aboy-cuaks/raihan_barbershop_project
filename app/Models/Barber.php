<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barber extends Model
{
    protected $table = 'barber';
    protected $primaryKey = 'barber_id';

    protected $fillable = [
        'nama',
        'email',
        'no_telepon',
        'spesialisasi',
        'status',
    ];
}
