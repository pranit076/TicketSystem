<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shows extends Model
{
    use HasFactory;
    protected $fillable = [
        'movie_id',
        'hall_id',
        'time' ,
        'date',
        'day',
    ];
}
