<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class MedHistory extends Model
{
    use HasFactory;

    protected $table = 'med_history';

    protected $fillable = [
        'user_id',
        'medicine_name',
        'tablet_amount',
        'remaining_tablets',
        'time',
        'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
