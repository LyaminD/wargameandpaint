<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;
use Auth;

class CommentaireController extends Controller
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
        ]);

        $user_id = Auth::user()->id;
        $commentaire = new Commentaire;
        $commentaire->user_id = $user_id;
        $commentaire->post_id = $request->input('post_id');
        $commentaire->content = $request->input('content');
        $commentaire->image = $request->input('image');
        $commentaire->save();

        return redirect()->route('home')->with('message', 'Commentaire poster avec succès');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Commentaire $commentaire)
    {
        return view('commentaire.modifcommentaire', compact('commentaire'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commentaire $commentaire)
    {
        $request->validate([
            'content' => 'required', 'string', 'min:5', 'max:255',

        ]);
        $commentaire->content = $request->input('content');
        $commentaire->image = $request->input('image');
        $commentaire->save();

        return redirect()->route('home')->with('message', 'Commentaire modifié avec succès');
    }

    /** 
     * Remove the specified resource from storage for user.
     *
     * @param  \app\http\Controller\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();
        return redirect()->route('home')->with('message', 'Commentaire supprimer avec succès');
    }

   /** 
     * Remove the specified resource from storage in ADMIN session.
     *
     * @param  \app\http\Controller\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function destroycomment(Commentaire $commentaire)
    {
        $commentaire->delete();
        return redirect()->route('admincomment')->with('message', 'Commentaire supprimée avec succès');
    }

     /** 
     * Display a listing of the resource.
     *
     * @param  \app\http\Controller\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function commentaire(Commentaire $commentaire)
    {
        $commentaire = Commentaire::all();
        return view('admin.admincomment',compact('commentaire'));
    }
}
