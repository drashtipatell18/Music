<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MusicVideo extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "music_videos";
    protected $fillable = ['name', 'album_id', 'artist_id', 'category_id', 'language_id', 'icons','type','url','status'];
}
