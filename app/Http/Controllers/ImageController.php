<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    function imageshow()
    {
        if (session('status')==2){ 
        return view('admin.images');
        }
    }
    function imageupload(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,png,pdf,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        /* Store $imageName name in DATABASE from HERE */

        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);


    }
}
