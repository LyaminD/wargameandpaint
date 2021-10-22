<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Faction;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        $posts->load('images');
        $factions = Faction::all();
        return view('home', ['posts' => $posts, 'factions' => $factions] );
    }
}