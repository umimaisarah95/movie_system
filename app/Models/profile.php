<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class profile extends Model
{
    // Primary key
    protected $primaryKey = 'profile_id';

    protected $fillable = [
        'user_id',
        'fullname',
        'phone',
        'email',
        'gender',
        'birthdate',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
