<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Photo;

class PhotosController extends Controller
{
    //
    public function store(Post $post)
    {
        # code...
        $this->validate(request(),[
            'photo'=>'required|image|max:2048',
        ]);

        $post->photos()->create([
            'url'=>Storage::url(request()->file('photo')->store('public')),
        ]);

    }

    public function destroy(Photo $photo)
    {
        $photo->delete();

        return back()->with('flash','Foto eliminada');
        
    }
}
