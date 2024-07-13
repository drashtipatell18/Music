<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PremiumController extends Controller
{
    public function premiums()
    {
        return view('premiums.view_premium');
    }
}
