<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class FileController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'filenames' => 'required',
            'filenames.*' =>'mimes:jpeg,jpg,png|max:2048'
        ]);

        if ($request->hasfile('filenames')) {
            foreach ($request->file('filenames') as $image) {
                $name = time() . rand(1, 100) . '.' . $image->extension();
                $image->move(public_path('images'), $name);
                $image = new Image();
                $image->name = $name;
                $image->user_id = auth()->user()->id;
                $image->post_id = session()->get('post_id');
                $image->save();
            }
        }

        return redirect('home')->with('success', 'Les images ont bien étés envoyées !');
    }
}
