<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movie extends Model
{
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
}
