<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Premium extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'premium_name',
        'price',
        'time_perid_days',
        'status',
        'description'
    ];
}
