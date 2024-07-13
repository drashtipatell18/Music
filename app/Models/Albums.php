<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Albums extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'artist_name',
        'albums_name',
        'status',
        'image',
    ];
}
