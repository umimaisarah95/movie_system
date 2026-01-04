<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id',
        'show_date',
        'show_time',
    ];

    // Relationship: Showtime belongs to Movie
    public function movie()
    {
        return $this->belongsTo(movie::class);
    }
}
