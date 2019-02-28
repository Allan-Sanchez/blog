<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class categoriasController extends Controller
{
    //
    public function show(Category $category)
    {   $categoria = $category;
        $posts = $category->posts()->paginate(5);
        return view('welcome',compact('posts','categoria'));
    }
}
