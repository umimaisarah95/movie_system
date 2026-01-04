<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movie extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'movie_id';
    }

    protected $primaryKey = 'movie_id';
    protected $fillable = [
        'image_path',
        'movie_title',
        'director',
        'cast',
        'description',
        'duration',
        'promotion_start_date',
        'promotion_end_date',
    ];

    public function showtimes()
    {
        return $this->hasMany(Showtime::class);
    }

}


