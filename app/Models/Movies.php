<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'poster',
        'genre',
        'description',
        'release_date',
        'end_date',
        'duration',
        'status'
    ];
}
