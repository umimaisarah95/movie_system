<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'booking_id',
        'user_id',
        'movie_id',
        'seat_num',
        'booking_date',
        'booking_time',
    ];

}
