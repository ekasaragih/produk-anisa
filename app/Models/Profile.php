<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';

    protected $fillable = [
        'user_id', 
        'nama', 
        'usia', 
        'pendidikan', 
        'pekerjaan', 
        'hamil_ke',
        'hpht', 
        'bb_sebelum_hamil', 
        'bb_sekarang', 
        'kadar_hb', 
        'masalah_kehamilan'
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Set usia otomatis berdasarkan DOB user
    public static function calculateAge($dob)
    {
        return Carbon::parse($dob)->age;
    }
}
