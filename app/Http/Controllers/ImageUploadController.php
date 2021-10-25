<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{

    public function imageUpload()

    {
        return view('imageUpload');
    }

    public function imageUploadPost(Request $request)

    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        if ($request->post) {
            $post_id = session()->get('post_id');
            $this->store($imageName, $post_id);
            return redirect()->route('home')
                ->with('success', 'Image envoyée !')
                ->with('image', $imageName);
        } else {
            $this->store($imageName);
            return redirect()->back()
                ->with('success', 'Image envoyée !')
                ->with('image', $imageName);
        }
    }

    public function store($imageName, $post_id = null)
    {
        if ($post_id !== null) {
            Image::create([
                'name' => $imageName,
                'user_id' => auth()->user()->id,
                'post_id' => $post_id,
            ]);
        } else {
            Image::create([
                'name' => $imageName,
                'user_id' => auth()->user()->id,
            ]);
        }
    }

    public function create()
    {
        return view('create');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeMultipleImg(Request $request)
    {
        $this->validate($request, [
            'filenames' => 'required',
            'filenames.*' => 'mimes:jpeg,jpg,png'
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
