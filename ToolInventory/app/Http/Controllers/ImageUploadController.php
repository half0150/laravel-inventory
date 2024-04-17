<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5012',
        ]);

        $imageName = time() . '.' . $request->image->extension();

        $request->image->storeAs('images', $imageName);

        return back()
            ->with('success', 'You have successfully upload image.')
            ->with('image', $imageName);
    }
}
