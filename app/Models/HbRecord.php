<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class HbRecord extends Model
{
    use HasFactory;

    protected $table = 'hb_records';

    protected $fillable = [
        'user_id',
        'kadar_hb',
        'tanggal_cek',
        'tempat_lokasi',
        'indicated_anemia',
    ];
}
