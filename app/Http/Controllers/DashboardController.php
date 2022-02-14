<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Pengumuman;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backend.components.dashboard', [
            'title'         => "Admin Dashboard",
            'article'       => Article::latest()
                ->take(5)
                ->get(),
            'pengumuman'    => Pengumuman::latest()
                ->take(5)
                ->get(),
            'no'        => 1
        ]);
    }
}
