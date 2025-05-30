<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KuesionerPretest extends Model
{
    use HasFactory;

    protected $table = 'kuesioner_pretest';

    protected $fillable = [
        'user_id',
        'score',
        'answers',
    ];

    // Cast the 'answers' attribute to array
    protected $casts = [
        'answers' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
