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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
        $this->store($imageName);
        return back()
            ->with('success','Image envoyée !')
            ->with('image',$imageName); 
    }

    public function store($imageName){
        $id = Image::create([
            'name' => $imageName,
            'user_id' => auth()->user()->id
        ])->id;
        session(['lastInsertId' => $id]);
    }
}