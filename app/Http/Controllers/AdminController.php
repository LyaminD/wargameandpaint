<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Commentaire;
use App\Models\Post;
use App\Models\User;

class AdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('admin');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('admin.index');
    }
    
    public function commentaire()
    {
        $comment = Commentaire::all;
        return view('admin.comment'->compact('commentaire'));
    }

    public function post()
    {
        $post = Post::all;
        return view('admin.post');
    }

    public function user()
    {
        $user = User::all;
        return view('admin.user');
    }  
}
