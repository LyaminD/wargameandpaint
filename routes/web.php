<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*------------------------ MODIFICATION DES INFOS DU COMPTE  ---------------------------- */
Route::get('/editaccount', [App\Http\Controllers\UserController::class, 'edit'])->name('editaccount');
Route::post('/editaccount', [App\Http\Controllers\UserController::class, 'update'])->name('updateaccount');

/*------------------------ MODIFICATION DU MOT DE PASSE------------------------------------- */
Route::get('/editpassword', [App\Http\Controllers\UserController::class, 'editpassword'])->name('editpassword');
Route::post('/editpassword', [App\Http\Controllers\UserController::class, 'updatepassword'])->name('updatepassword');

/*------------------------ PUBLICATION ET MODIF DES POSTS -------------------------------------------------------- */
Route::resource('/posts', App\Http\Controllers\PostController::class)->except('index');
Route::get('users/{user}', [App\Http\Controllers\UserController::class,'profil'])->name('profil');

/*------------------------ PUBLICATION ET MODIF DES COMMENTAIRES -------------------------------------------------------- */
Route::resource('/commentaires', App\Http\Controllers\CommentaireController::class)->except('index');

/*------------------------ PUBLICATION DE LA RECHERCHE -------------------------------------------------------- */
Route::get('/search', [App\Http\Controllers\UserController::class, 'search'])->name('search');

/*--------------------------------------- UPLOAD IMAGES ---------------------------------------------- */
Route::post('image-upload', [App\Http\Controllers\ImageUploadController::class, 'imageUploadPost' ])->name('image.upload.post');
Route::get('image', [FileController::class, 'create'])->name('image'); 
Route::post('imageUpload', [FileController::class, 'store'])->name('imageUpload');

/*--------------------------------------- FACTIONS ---------------------------------------------- */
Route::resource('/posts', App\Http\Controllers\PostController::class)->except('index');

/*--------------------------------------- FOLLOWS ---------------------------------------------- */
Route::post('/profil/{user}/follow', [App\Http\Controllers\FollowsController::class, 'store'])->name('follow');

/*---------------------------------------TRI PAR FACTIONS ---------------------------------------------- */
Route::get('/posts/{faction}/show', [App\Http\Controllers\PostController::class, 'show'])->name('posts.showFaction');

/*---------------------------------------ADMINISTRATION ---------------------------------------------- */
Route::get('/admin/index', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/post', [App\Http\Controllers\AdminController::class, 'post'])->name('adminpost');
Route::get('/admin/user', [App\Http\Controllers\AdminController::class, 'user'])->name('adminuser');
Route::get('/admin/comment', [App\Http\Controllers\AdminController::class, 'commentaire'])->name('admincomment');
Route::delete('/user/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('adminuserdestroy');