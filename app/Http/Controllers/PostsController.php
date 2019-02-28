<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    //
    public function show(Post $post)
    {
        # code...
        // $post = Post::findOrfail($id);
        return View('posts.show',compact('post'));
    }
}
