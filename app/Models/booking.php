<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;
   protected $primaryKey = 'booking_id';
    protected $fillable = [
        'user_id',
        'movie_id',
        'seat_num',
        'booking_date',
        'booking_time'
    ];

      public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id'); 
    }
    // Optional: Relationship to Movie
    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id', 'movie_id');
    }
}

    
