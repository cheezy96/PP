<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);

        $imageModel = new Image();
        $imageModel->name = $imageName;
        $imageModel->path = 'images/' . $imageName;
        $imageModel->save();

        return response()->json(['success' => 'Image uploaded successfully']);
    }
    
    public function index()
    {
        $images = Image::all();
        return response()->json($images); 
    }
    
}

