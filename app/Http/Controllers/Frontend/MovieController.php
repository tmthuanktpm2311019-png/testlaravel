<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
class MovieController extends Controller
{
public function showBooking($slug) {
    $movie = \App\Models\Movie::where('slug', $slug)->firstOrFail();
    return view('frontend.dat-ve', compact('movie'));
}
}
