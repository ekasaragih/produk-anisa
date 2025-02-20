<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alarm extends Model
{
    use HasFactory;

    protected $table = 'alarms';
    
    protected $fillable = [
        'user_id',
        'tanggal', 
        'nama_alarm',
        'jam', 
        'hari', 
        'deskripsi', 
        'snooze', 
        'max_snooze', 
        'aktif'
    ];
}
