<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;
    protected $fillable = [
    'seats',
    'movie_id',
    'hall_id',
    'show_id',
    'user_id',
    'qr_code',
    ];

}
