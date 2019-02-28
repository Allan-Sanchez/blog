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

        $photo = request()->file('photo')->store('public'); 

        // $photoUrl = $photo->store('public'); para guardarla la imagen el la carpeta store 

        $photoUrl = Storage::url($photo);//generamos la url que vamos a guardar en la base de datos

        Photo::create([
            'post_id' => $post->id,
            'url' => $photoUrl,
            ]);

    }

    public function destroy(Photo $photo)
    {
        $photo->delete();

        $photoPath = str_replace('storage','public',$photo->url);//str_replace busca y reemplaza una cadena de caracteres

        Storage::delete($photoPath);

        return back()->with('flash','Foto eliminada');
        
    }
}
