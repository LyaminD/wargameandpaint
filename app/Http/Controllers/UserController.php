<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('user.profil', ['user' => $user]);
    }

     /**
     * Display a listing of the resource.
     *
     * @param  \app\http\Controller\User  $user
     * @return \Illuminate\Http\Response
     */
    public function profil(User $user)
    {
        $user->load('posts.images','images');
        return view('user.profil', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        return view('user.editaccount', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editpassword()
    {
        $user = Auth::user();
        return view('user.editpassword', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate( [
            'pseudo' => ['required', 'string', 'max:255'],     
            'email' => ['required', 'string', 'email', 'max:255'],
            'jeux' => ['required', 'string', 'max:255'],
            'armées' => ['required', 'string', 'max:255'],
            'liens' => ['required', 'string', 'max:255'],
            ]);

        $user = Auth::user();
        $user->update($request->all());

        return redirect()->back()->with('message', 'Informations modifiées !');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatepassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed', Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols(),],
        ]);
        $newpassword = 'password';
        $utilisateur = Auth::user();
        $oldpassword = $utilisateur->password;

        if (Hash::check($newpassword, $oldpassword)) {
            $newpassword = $oldpassword;
            return redirect()->route('editpassword')->withErrors(['password_error','ancien et nouveau mot de passe identique !']);
        } else {

            $utilisateur->password = Hash::make(request('password'));
            $utilisateur->save();
            return redirect()->route('profil')->with('message', 'Mot de passe modifié !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     *@param  \app\http\Controller\User  $user
     *@return \Illuminate\Http\Response
     */
    public function destroyUser(User $user)
    {
        $user->delete();
        return redirect()->route('adminuser')->with('message', 'Utilisateur supprimer avec succès');
    }

     /**
     * Remove the specified resource from storage.
     *
     *@param  \app\http\Controller\User  $user
     *@return \Illuminate\Http\Response
     */
    public function deleteUser(User $user)
    {
        $user->delete();
        Auth::logout();
        session()->flush();
        return redirect()->route('login')->with('message', 'Compte supprimer avec succès');;
    }

    /**
     * Display a listing of the resource.
     *@param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required', 'string', 'max:20'
        ]);

        $recherche = $request->input('search');

        $users = DB::table('users')
            ->where('pseudo', 'like', "%$recherche%")
            ->get();

        return view('search', compact('users'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function user()
    {
        $user = User::all();
        return view('admin.adminuser', compact('user'));
    }  
}