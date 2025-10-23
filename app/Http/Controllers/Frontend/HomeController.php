<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $slides = [
            ['image' => 'assets/img/khe-uoc-co-dau/khe-uoc-co-dau-bg.jpg', 'title' => 'Khe Ước Cô Dâu'],
            ['image' => 'assets/img/lam-giau-voi-ma/lam-giau-voi-ma-bg.jpg', 'title' => 'Làm Giàu Với Ma'],
            // Thêm slide khác nếu muốn
        ];
        $nowShowingMovies = \App\Models\Movie::where('status', 'now_showing')->get();
        $comingSoonMovies = \App\Models\Movie::where('status', 'coming_soon')->get();
        return view('frontend.home', compact('slides', 'nowShowingMovies', 'comingSoonMovies'));
    }
}