<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MusicVideo extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'artist_name', 'album_name', 'category', 'language', 'icons','type','url','status'];
}
