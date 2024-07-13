<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;

class ArtistController extends Controller
{
    public function artist(){
        return view('artist.view_artist');
    }

    public function storeArtist(){

    }

    public function ArtistUpdate(){

    }
}
