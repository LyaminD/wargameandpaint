<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    public function store (User $user) {
        Auth::user()->toggleFollow($user);

        return back();
    }
}