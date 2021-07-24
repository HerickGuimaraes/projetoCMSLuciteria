<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function imageupload(Request $request){
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg'
        ]);
        
        $imageName = time().'.'.$request->file->extension();

        $request->file->move(public_path('midia/image'), $imageName);

        return[
            'location' => asset('midia/image/'.$imageName)
        ];
    }
}
