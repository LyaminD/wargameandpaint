<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Faction;
use Auth;
use Illuminate\Support\Facades\DB;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        session() -> put('post_id' , $insert->id) ;

        return view('create')->with('message', 'Post créer avec succès, ajouter votre image');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }



    public function showFaction()
    {
        $posts = Post::all()->sortByDesc('created_at');
        $posts->load('images');
        $factions = Faction::all();
        return view('home', ['posts' => $posts, 'factions' => $factions] );
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

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required', 'string', 'max:20'
        ]);

        $recherche = $request->input('search');

        $posts = DB::table('posts')
            ->where('posts.content', 'like', "%$recherche%")
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*','users.imageprofil', 'users.postname')
            ->get();


        return view('search', compact('posts'));
    }
}
