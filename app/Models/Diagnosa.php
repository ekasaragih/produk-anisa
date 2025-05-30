<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    use HasFactory;

    protected $table = 'diagnosas';

    protected $fillable = [
        'user_id',
        'diagnose_result',
        'symptom_checks',
    ];

    protected $casts = [
        'symptom_checks' => 'array',
    ];
}
