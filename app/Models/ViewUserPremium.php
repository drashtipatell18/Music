<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewUserPremium extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_name',
        'email',
        'phone',
        'purchase_date',
        'expire_date'

    ];
}
