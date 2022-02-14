<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\DaaiTV;
use App\Models\Pengumuman;
use App\Models\Marquee;
use App\Models\RekapAbsen;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', [
            'title'         => "Home",
            'article'       => Article::with(['category', 'user'])
                ->latest()
                ->take(5)
                ->get(),
            'pengumuman'    => Pengumuman::with('user')
                ->latest()
                ->take(4)
                ->get(),
            'marquee'       => Pengumuman::latest()
                ->take(3)
                ->where('pengumuman_category', 1)
                ->get(),
            'absen'         => RekapAbsen::latest()
                ->take(11)
                ->get(),
            'daai'          => DaaiTV::latest()
                ->latest()
                ->take(1)
                ->get(),
            'iklan'         => Advertisement::latest()
                ->take(3)
                ->get()
        ]);
    }
}
