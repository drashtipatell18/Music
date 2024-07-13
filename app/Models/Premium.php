<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premium extends Model
{
    use HasFactory;
    protected $fillable = [
        'premium_name',
        'price',
        'time_perid_days',
        'status',
        'description'
    ];
}
