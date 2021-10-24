<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Faction;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required', 'string', 'min:5', 'max:255',
            'titre' => 'required', 'string', 'min:5', 'max:255',
        ]);

        $user = Auth::user();
         $insert = Post::create([
            'content' => $request->input('content'),
            'user_id' => $user->id,
            'faction_id' => $request->input('faction'),
            'titre' => $request->input('titre'),
            
            
        ]);
        session() -> put('post_id' , $insert->id);
        
        

        return view('create')->with('message', 'Post créer avec succès, ajouter votre image');
    }

    
/** 
     * Display a listing of the resource.
     *
     * @param  \app\http\Controller\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function showFaction()
    {
        $posts = Post::all()->sortByDesc('created_at');
        $posts->load('images');
        $factions = Faction::all();
        return view('faction', ['posts' => $posts, 'factions' => $factions] );
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.modifpost', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required', 'string', 'min:5', 'max:255',
            'titre' => 'required', 'string', 'min:5', 'max:255',
        ]);

        $post->content = $request->input('content');
        $post->image = $request->input('image');
        $post->titre = $request->input('titre');
        $post->save();

        return redirect()->route('home')->with('message', 'Post modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('home')->with('message', 'Post supprimer avec succès');
    }
    
    /** 
     * Remove the specified resource from storage for ADMIN session.
     *
     * @param  \app\http\Controller\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroypost(Post $post)
    {
        $post->delete();
        return redirect()->route('adminpost')->with('message', 'Post supprimée avec succès');
    }

    /** 
     * Display a listing of the resource.
     *
     * @param  \app\http\Controller\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function post(Post $post)
    {
        $post = Post::all();
        return view('admin.adminpost', compact('post'));
    }

    /** 
    * Display a listing of the resource.
    *
    * @param  \app\http\Controller\Post  $post
    * @return \Illuminate\Http\Response
    */
    public function show($faction_id)
    {
        $posts = Post::where( 'faction_id', $faction_id)->latest()->paginate(10);
        $posts->load('images','faction');
        return view('faction', ['posts' => $posts] );
    }
}